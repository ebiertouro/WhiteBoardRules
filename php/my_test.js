//running on http://localhost:8080/

const express = require('express');
const nodemailer = require('nodemailer');
const app = express();
const port = 8080;

// Middleware to parse URL-encoded bodies (as sent by HTML forms)
app.use(express.urlencoded({ extended: false }));

// Route for serving the HTML form
app.get('/', (req, res) => {
    res.send(`
        <form action="/submit" method="get">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required><br><br>
            <input type="submit" value="Submit">
        </form>
    `);
});

// Route for handling form submissions
app.get('/submit', (req, res) => {
    const name = req.query.name;
    const age = req.query.age;

    // Sending email with submitted data
    const transporter = nodemailer.createTransport({
        service: 'gmail',
        auth: {
            user: 'white.board.rules.24@gmail.com',
            pass: 'rwbo hcqr autj hbin'
        }
    });

    const mailOptions = {
        from: 'white.board.rules.24@gmail.com',
        to: 'estherbier6@gmail.com',
        subject: 'Form Submission',
        text: `You have submitted: Name=${name}, Age=${age}`
    };

    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            console.log(`Error sending email: ${error}`);
            console.log(`SMTP response code: ${error.responseCode}`);
            console.log(`SMTP response: ${error.response}`);
            console.log(`SMTP envelope: ${error.envelope}`);
            console.log(`SMTP messageId: ${error.messageId}`);
            res.status(500).send('Error sending email');
        } else {
            console.log(`Email sent: ${info.response}`);
            res.send(`You have submitted: Name=${name}, Age=${age}`);
        }
    });
});

// Start the server
app.listen(port, () => {
    console.log(`Server is running at http://localhost:${port}`);
});