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

// Initialize variables
$id = $firstName = $lastName = $birthday = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate and sanitize form data
    $id = mysqli_real_escape_string($connection, $_POST["id"]);
    $firstName = mysqli_real_escape_string($connection, $_POST["firstName"]);
    $lastName = mysqli_real_escape_string($connection, $_POST["lastName"]);
    $birthday = mysqli_real_escape_string($connection, $_POST["birthday"]);

    // Check if the student with the same ID already exists
    $checkExistence = $connection->query("SELECT * FROM students WHERE student_id = '$id'");

    if ($checkExistence->num_rows > 0) {
        echo "<p>Student with ID $id already exists. Please choose a different ID.</p>";
        echo "<p><a href='students.php'>Back to Students Page</a></p>";
    } else {
        // Insert data into the database
        $sql = "INSERT INTO students (student_id, first_name, last_name, birthday) VALUES ('$id', '$firstName', '$lastName', '$birthday')";

        if ($connection->query($sql) === TRUE) {
            echo "<p>$firstName $lastName added successfully!</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    }
}

// Close the database connection
$connection->close();

include "footer.php";
?>
