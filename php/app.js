const express = require('express');
var app = express();
var nodemailer = require('nodemailer');
var mysql = require('mysql');
const bodyParser = require('body-parser');

const port = 3000;

// Middleware
app.use(bodyParser.urlencoded({ extended: false }));
app.set('view engine', 'pug');
app.use(express.static(__dirname + '/public'));

/**
 * Send them to home page
 */
app.get(['/', '/home'], (req, res) => {
    res.render('home', {
        title: 'Home'
    });
});

/**
 * Send them to student listing page
 */
app.get('/view_students', (req, res) => {
    try {
        var allStudents = [];
        getStudents(allStudents, res);
    } catch (error) {
        console.log('Error with database:', error);
    }
});

/**
 * Get form to add a student
 */
app.get('/add_student', (req, res) => {
    try {
        var allClassNames = [];
        getClassNames(allClassNames, res);
    } catch (error) {
        console.log('Error with database:', error);
    }
});

/**
 * Add the student to database
 */
app.post('/add_student', (req, res) => {
    addStudent(req, res);
});

/**
 * 404 page
 */
app.use(function (req, res, next) {
    res.status(404).send("Sorry can't find that!");
});

/**
 * Run app
 */
const server = app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

/**
 * 
 * Database Commands
 * 
 */

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

// SQL Requests
function getStudents(students, res) {
    const query = 'SELECT * FROM students';
    db.query(query, (err, result) => {
        if (err) {
            console.error('Error fetching students:', err);
            return;
        }
        res.render('view_students', { students: result });
    });
}

function getClassNames(names, res) {
    const classQuery = 'SELECT class_id FROM classes';
    db.query(classQuery, (err, classResult) => {
        if (err) {
            console.error('Error fetching class names:', err);
            return;
        }
        res.render('add_student', { classes: classResult });
    });
}

function addStudent(req, res) {
    const { id, firstName, lastName, birthday, classID } = req.body;
    const studentQuery = `INSERT INTO students (student_id, first_name, last_name, birthday) VALUES ('${id}', '${firstName}', '${lastName}', '${birthday}')`;
    const studentClassQuery = `INSERT INTO student_classes (student_id, class_id) VALUES ('${id}', '${classID}')`;

    db.query(studentQuery, (err, result) => {
        if (err) {
            console.error('Error inserting student:', err);
            return;
        }
        db.query(studentClassQuery, (err, result) => {
            if (err) {
                console.error('Error inserting student class:', err);
                return;
            }
            res.redirect('/view_students');
        });
    });
}
