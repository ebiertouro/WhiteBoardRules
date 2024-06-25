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

    // Insert data into the database
    $sql = "INSERT INTO students (student_id, first_name, last_name, birthday) VALUES ('$id', '$firstName', '$lastName', '$birthday')";

    if ($connection->query($sql) === TRUE && $connection->query($sql2) === TRUE) {
        echo "<p>Student added successfully!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}


// Close the database connection
$connection->close();


echo "<h2>Add Student</h2>";

echo "<div class='form-border'>";
echo "<form action='add_student.php' method='post'>";
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
?>
