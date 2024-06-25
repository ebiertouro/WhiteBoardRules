const express = require('express');
const nodemailer = require('nodemailer');
const mysql = require('mysql');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

// Middleware
app.use(bodyParser.urlencoded({ extended: false }));
app.set('view engine', 'pug');
app.use(express.static(__dirname + '/public'));

// Database connection
function connectToDB() {
    const db = mysql.createConnection({
        host: '127.0.0.1',
        user: 'root',
        password: '',
        database: 'white_board_rules'
    });

    db.connect(function (err) {
        if (err) {
            console.error('Error connecting to database:', err);
            return;
        }
        console.log('Connected to database');
    });

    return db;
}

const db = connectToDB();

// Route for home page
app.get('/', (req, res) => {
    res.render('home', {
        title: 'Home'
    });
});

// Route to render student listing page
app.get('/view_students', (req, res) => {
    try {
        getStudents(res);
    } catch (error) {
        console.log('Error with database:', error);
        res.status(500).send('Error fetching students');
    }
});

// Get all students from the database
function getStudents(res) {
    const query = 'SELECT * FROM students';
    db.query(query, (err, result) => {
        if (err) {
            console.error('Error fetching students:', err);
            res.status(500).send('Error fetching students');
            return;
        }
        res.render('view_students', { students: result });
    });
}

// Route to render the email form with student records
app.get('/email_records', (req, res) => {
    try {
        getStudentsForEmail(res);
    } catch (error) {
        console.log('Error with database:', error);
        res.status(500).send('Error fetching students for email');
    }
});

// Get all students for emailing
function getStudentsForEmail(res) {
    const query = 'SELECT * FROM students';
    db.query(query, (err, result) => {
        if (err) {
            console.error('Error fetching students for email:', err);
            res.status(500).send('Error fetching students for email');
            return;
        }
        res.render('email_records', { students: result });
    });
}

// Route to render form to add a student
app.get('/add_student', (req, res) => {
    try {
        var allClassNames = [];
        getClassNames(allClassNames, res);
    } catch (error) {
        console.log('Error with database:', error);
        res.status(500).send('Error fetching class names for adding student');
    }
});

// Get all class names for adding a student
function getClassNames(names, res) {
    const classQuery = 'SELECT class_id FROM classes';
    db.query(classQuery, (err, classResult) => {
        if (err) {
            console.error('Error fetching class names:', err);
            res.status(500).send('Error fetching class names');
            return;
        }
        res.render('add_student', { classes: classResult });
    });
}

// Handle form submission to add a student
app.post('/add_student', (req, res) => {
    addStudent(req, res);
});

// Add the student to the database
function addStudent(req, res) {
    const { id, firstName, lastName, birthday, classID } = req.body;
    const studentQuery = `INSERT INTO students (student_id, first_name, last_name, birthday) VALUES ('${id}', '${firstName}', '${lastName}', '${birthday}')`;
    const studentClassQuery = `INSERT INTO student_classes (student_id, class_id) VALUES ('${id}', '${classID}')`;

    db.query(studentQuery, (err, result) => {
        if (err) {
            console.error('Error inserting student:', err);
            res.status(500).send('Error inserting student');
            return;
        }
        db.query(studentClassQuery, (err, result) => {
            if (err) {
                console.error('Error inserting student class:', err);
                res.status(500).send('Error inserting student class');
                return;
            }
            res.redirect('/view_students');
        });
    });
}

// Route for handling form submission and sending email with selected student records
// Handle form submission to send email with selected student records
app.post('/email_records', (req, res) => {
    const { email, selectedStudents } = req.body;

    // Convert selectedStudents to an array if only one student is selected
    const selectedStudentIds = Array.isArray(selectedStudents) ? selectedStudents : [selectedStudents];

    // Fetch student details based on selected ids
    const query = `SELECT * FROM students WHERE student_id IN (${selectedStudentIds.join(',')})`;

    db.query(query, (err, result) => {
        if (err) {
            console.error('Error fetching selected students:', err);
            res.status(500).send('Error fetching selected students');
            return;
        }

        // Sending email with student records
        const transporter = nodemailer.createTransport({
            service: 'gmail',
            auth: {
                user: 'white.board.rules.24@gmail.com',
                pass: 'rwbo hcqr autj hbin'
            }
        });

        const mailOptions = {
            from: 'white.board.rules.24@gmail.com',
            to: email,
            subject: 'Student Records',
            html: `
                <h2>Student Records</h2>
                <table border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Birthday</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${result.map(student => `
                            <tr>
                                <td>${student.student_id}</td>
                                <td>${student.first_name}</td>
                                <td>${student.last_name}</td>
                                <td>${student.birthday}</td>
                            </tr>
                        `).join('')}
                    </tbody>
                </table>
            `
        };

        transporter.sendMail(mailOptions, (error, info) => {
            if (error) {
                console.log(`Error sending email: ${error}`);
                res.status(500).send('Error sending email');
            } else {
                console.log(`Email sent: ${info.response}`);
                res.render('confirmation', { confirmationMessage: 'Student records sent successfully!' });
            }
        });
    });
});

// 404 page
app.use(function (req, res, next) {
    res.status(404).send("Sorry can't find that!");
});

// Start the server
const server = app.listen(port, () => {
    console.log(`Server is running at http://localhost:${port}`);
});
