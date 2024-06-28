<?php
$title = "Add Grade";
include "header.php";

$subject_id = $_GET['subject_id'];

echo "<h2>Add Grade</h2>";

// HTML and PHP Form Starts Here
echo "<div class='form-border'>";


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
$studentResult = $connection->query("SELECT s.student_id, s.first_name, s.last_name 
                                    FROM students s
                                    JOIN student_subject ss ON s.student_id = ss.student_id
                                    WHERE ss.subject_id = $subject_id");

if ($studentResult->num_rows > 0) {
    echo "<form action='process_grade.php' method='post' id='gradeForm'>
        <label for='student_id'>Student Name:</label>
    
    
    <select name='student_id' required>";
    while ($studentRow = $studentResult->fetch_assoc()) {
        echo "<option value='" . $studentRow['student_id'] . "'>" . $studentRow['first_name'] . ' ' . $studentRow['last_name'] . "</option>";
    }
    echo "</select><br>
        <label for='assignment'>Assignment:</label>
        <select name='assignment_id' id='assignmentSelect' required>
            <option value=''>Select an assignment</option>";

    // Retrieve assignments from the database
    $assignmentResult = $connection->query("SELECT assignment_id, assignment_name 
                                            FROM assignments 
                                            WHERE subject_id = $subject_id");

    while ($assignmentRow = $assignmentResult->fetch_assoc()) {
        echo "<option value='" . $assignmentRow['assignment_id'] . "'>" . $assignmentRow['assignment_name'] . "</option>";
    }

    echo "</select><br>
        <label for='grade'>Grade:</label>
        <input type='number' name='grade' required><br>
        <input type='hidden' name='subject_id' value='" . $subject_id . "'>
        <input type='submit' class='btn' value='Submit'>
    </form>
    </div>";
} else {
    echo "<p>No students are enrolled for this subject.</p>";
    
}

// Close the database connection
$connection->close();

include "footer.php";
?>
