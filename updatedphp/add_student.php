<?php
$title = "Add Student";
include "header.php";

// Connect to the database
$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = '';
$dbname = 'white_board_rules';
$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $id = $_POST["id"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $birthday = $_POST["birthday"];

    // Check if the student with the same ID already exists
    $checkExistence = $connection->query("SELECT * FROM students WHERE student_id = '$id'");

    if ($checkExistence->num_rows > 0) {
        echo "<p>Student with ID $id already exists. Please choose a different ID.</p>";
        echo "<p><a href='students.php'>Back to Students Page</a></p>";
    } else {
        // Insert data into the database
        $sql = "INSERT INTO students (student_id, first_name, last_name, birthday) VALUES ('$id', '$firstName', '$lastName', '$birthday')";

        if ($connection->query($sql) === TRUE) {
            echo "<p>Student added to database successfully!</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }

        // Insert data into the database
        $sql = "INSERT INTO student_subject (student_id, subject_id) VALUES ('$id', '" . $_GET['subject_id'] . "')";

        if ($connection->query($sql) === TRUE) {
            echo "<p>Student added to subject id " . $_GET['subject_id'] . " successfully!</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    }
}


// Close the database connection
$connection->close();


echo "<h2>Add Student</h2>";

echo "<div class='form-border'>";
echo "<form action='add_student.php?subject_id=" . $_GET['subject_id'] . "' method='post'>";
echo "<label for='id'>ID:</label>";
echo "<input type='text' name='id' required><br>";

echo "<label for='firstName'>First Name:</label>";
echo "<input type='text' name='firstName' required><br>";

echo "<label for='lastName'>Last Name:</label>";
echo "<input type='text' name='lastName' required><br>";

echo "<label for='birthday'>Birthday:</label>";
echo "<input type='date' name='birthday' required><br>";

echo "</select><br>";

echo "<input type='submit' class='btn' value='Add Student'>";
echo "</form>";
echo "</div>";

include "footer.php";
