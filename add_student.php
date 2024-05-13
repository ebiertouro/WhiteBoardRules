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
    $class_id = $_POST["classID"];

    // Insert data into the database
    $sql = "INSERT INTO students (student_id, first_name, last_name, birthday) VALUES ('$id', '$firstName', '$lastName', '$birthday')";
    $sql2 = "INSERT INTO student_classes (student_id, class_id) VALUES ('$id', '$class_id')";

    if ($connection->query($sql) === TRUE && $connection->query($sql2) === TRUE) {
        echo "<p>Student added successfully!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Fetch class IDs from the database
$classQuery = "SELECT class_id FROM classes";
$classResult = $connection->query($classQuery);
$classOptions = "";
if ($classResult->num_rows > 0) {
    while ($row = $classResult->fetch_assoc()) {
        $classOptions .= "<option value='" . $row["class_id"] . "'>" . $row["class_id"] . "</option>";
    }
} else {
    $classOptions .= "<option value=''>No classes available</option>";
}

// Close the database connection
$connection->close();


echo "<h2>Add Student</h2>";

echo "<form action='add_student.php' method='post'>";
echo "<label for='id'>ID:</label>";
echo "<input type='text' name='id' required><br>";

echo "<label for='firstName'>First Name:</label>";
echo "<input type='text' name='firstName' required><br>";

echo "<label for='lastName'>Last Name:</label>";
echo "<input type='text' name='lastName' required><br>";

echo "<label for='birthday'>Birthday:</label>";
echo "<input type='date' name='birthday' required><br>";

echo "<label for='classID'>Class ID:</label>";
echo "<select name='classID' required>";
echo $classOptions;
echo "</select><br>";

echo "<input type='submit' class='btn' value='Add Student'>";
echo "</form>";

include "footer.php";
?>
