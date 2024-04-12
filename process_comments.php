<?php

$title = "Review Comment";
include "header.php";
// Connect to the database
$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = '';
$dbname = 'white_board_rules';
$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Retrieve form data
$student_id = $_POST['student_id']; 
$grade = $_POST['grade']; 
$snark = $_POST['snark'];
$subject_name = $_POST['subject'];

$subject_id_query = "SELECT subjects.subject_id FROM subjects WHERE subjects.subject_name='$subject_name'";
$result_subject_id = mysqli_query($connection, $subject_id_query);

if ($row_subject_id = mysqli_fetch_assoc($result_subject_id)) {
    $subject_id = $row_subject_id['subject_id'];

    // Fetch student name from the database
    $sql_student = "SELECT first_name, last_name FROM students WHERE student_id='$student_id'";
    $result_student = mysqli_query($connection, $sql_student);

    if ($row_student = mysqli_fetch_assoc($result_student)) {
        $student_name = $row_student['first_name'] . ' ' . $row_student['last_name'];

        // Fetch letter grade
        $letter_grade = '';
        if ($grade >= 93 && $grade <= 100) {
            $letter_grade = 'A';
        } elseif ($grade >= 83 && $grade <= 92) {
            $letter_grade = 'B';
        } elseif ($grade >= 73 && $grade <= 82) {
            $letter_grade = 'C';
        } elseif ($grade >= 65 && $grade <= 72) {
            $letter_grade = 'D';
        } else {
            $letter_grade = 'F';
        }

        // Output student name and letter grade
        echo "Student: $student_name<br>";
        echo "Letter Grade: $letter_grade<br>";

        // Fetch a generic comment from the database based on letter grade and subject id
        $sql_comment = "SELECT comment FROM generic_comment WHERE grade='$letter_grade'  "
                . "AND subject_id ='$subject_id' AND snark_level='$snark' LIMIT 1";
        $result_comment = mysqli_query($connection, $sql_comment);

        if ($row_comment = mysqli_fetch_assoc($result_comment)) {
            $comment = $row_comment['comment'];
            echo "Generated Comment: $comment";
        } else {
            echo "No comment available for the selected criteria.";
        }
    } else {
        echo "Student not found.";
    }
} else {
    echo "Subject not found.";
}

mysqli_close($connection);
include "footer.php";
?>
