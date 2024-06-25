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
}
// Fetch student name from the database
$student_query = "SELECT first_name, last_name FROM students WHERE student_id='$student_id'";
$result_student_name = mysqli_query($connection, $student_query);

if ($row_student_name = mysqli_fetch_assoc($result_student_name)) {
    $student_name = $row_student_name['first_name'] . ' ' . $row_student_name['last_name'];
    
    echo "Student: $student_name<br>";
    
    } else {
    echo "Student not found.<br>";
}
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


    echo "Letter Grade: $letter_grade<br>";

 
    $sql_comment = "SELECT comment FROM generic_comment WHERE grade='$letter_grade'  "
            . "and subject_id ='$subject_id' and snark_level='$snark' LIMIT 1";
    $result_comment = mysqli_query($connection, $sql_comment);

    if ($row_comment = mysqli_fetch_assoc($result_comment)) {
        $comment = $row_comment['comment'];
        echo "Generated Comment: $comment";
    } else {
        echo "No comment available for the selected criteria.";
    }


mysqli_close($connection);
include "footer.php";
?>