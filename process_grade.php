<?php
// Assuming you have a database connection
$conn = mysqli_connect("your_host", "your_user", "your_password", "your_database");

// Retrieve form data
$student_id = $_POST['student_id'];
$assignment_id = $_POST['assignment_id'];
$grade = $_POST['grade'];

// Validate and save to the database
$sql = "INSERT INTO Grades (student_id, assignment_id, grade) VALUES ('$student_id', '$assignment_id', '$grade')";
mysqli_query($conn, $sql);

mysqli_close($conn);

// Redirect to confirmation page
header("Location: confirmation.php");
?>
