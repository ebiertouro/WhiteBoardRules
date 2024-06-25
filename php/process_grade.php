<?php
// Connect to the database
$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = '';
$dbname = 'white_board_rules';
$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Retrieve form data
$student_id = $_POST['student_id'];
$assignment_id = $_POST['assignment_id'];
$grade = $_POST['grade'];

// Validate and save to the database
$sql = "INSERT INTO student_assignments (student_id, assignment_id, Grade) VALUES ('$student_id', '$assignment_id', '$grade')";
mysqli_query($connection, $sql);

mysqli_close($connection);

// Redirect to confirmation page
header("Location: grade_saved.php");
?>
