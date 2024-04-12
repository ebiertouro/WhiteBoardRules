<?php
$title = "Assignments";
include "header.php";

// Connect to the database
$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = '';
$dbname = 'white_board_rules';
$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Retrieve student names from the database
$result = $connection->query("SELECT student_id, first_name, last_name FROM students");

echo "<h2>Student Grades Form</h2>";

echo "<form action='process_grade.php' method='post'>";
echo "<label for='studentName'>Student Name:</label>";
echo "<select name='studentName' required>";
while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['student_id']}'>{$row['first_name']} {$row['last_name']}</option>";
}

echo "</select><br>";

echo "<label for='grade'>Grade:</label>";
echo "<input type='number' name='grade' required><br>";

echo "<label for='comment'>Additional Comments:</label>";
echo "<textarea name='comment' rows='4' cols='50'></textarea><br>";

echo "<label for='optionalField'>Modified:</label>";
echo "<input type='checkbox' name='optionalField'><br>";

echo "<input type='submit' class='btn' value='Submit'>";
echo "</form>";

$connection->close();

include "footer.php";
?>
