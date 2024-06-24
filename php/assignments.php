<?php
$title = "Assignments";
include "header.php";

// Connect to the database
$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = '';
$dbname = 'white_board_rules';
$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check for connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve student names from the database
$studentResult = $connection->query("SELECT student_id, first_name, last_name FROM students");

// Retrieve assignment names from the database
$assignmentResult = $connection->query("SELECT assignment_id, assignment_name FROM assignments");

echo "<form action='process_grade.php' method='post'>";
echo "    <label for='student_id'>Student Name:</label>";
echo "    <select name='student_id' required>";
while ($studentRow = $studentResult->fetch_assoc()) {
    echo "        <option value='" . $studentRow['student_id'] . "'>";
    echo $studentRow['first_name'] . ' ' . $studentRow['last_name'];
    echo "</option>";
}
echo "    </select><br>";

echo "    <label for='assignment_id'>Assignment:</label>";
echo "    <select name='assignment_id' required>";
$assignmentResult->data_seek(0); // reset the pointer
while ($assignmentRow = $assignmentResult->fetch_assoc()) {
    echo "        <option value='" . $assignmentRow['assignment_id'] . "'>";
    echo $assignmentRow['assignment_name'];
    echo "</option>";
}
echo "    </select><br>";

echo "    <label for='grade'>Grade:</label>";
echo "    <input type='number' name='grade' required><br>";

echo "    <label for='optionalField'>Modified:</label>";
echo "    <input type='checkbox' name='optionalField'><br>";

echo "    <input type='submit' class='btn' value='Submit'>";
echo "</form>";

$connection->close();
include "footer.php";
?>
