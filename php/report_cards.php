<?php
$title = "Report Cards";
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
$result = $connection->query("SELECT student_id, first_name, last_name FROM students");

echo "<div class='form-border'>";
echo "<form method='post' action=''>";
echo "<label for='student_id'>Select Student:</label>";
echo "<select name='student_id' id='student_id' required>";

while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['student_id']}'>{$row['first_name']} {$row['last_name']}</option>";
}

echo "</select><br>";

// Retrieve subjects from the database
$subjects_result = $connection->query("SELECT subject_id, subject_name FROM subjects");
echo "<label for='subject_id'>Select Subject:</label>";
echo "<select name='subject_id' id='subject_id' required>";
while ($row = $subjects_result->fetch_assoc()) {
    echo "<option value='{$row['subject_id']}'>{$row['subject_name']}</option>";
}
echo "</select><br>";

echo "<input type='submit' name='submit' class='btn' value='Calculate Average'>";
echo "</form>";

// PHP code to calculate and display average grades for the selected student and subject
if(isset($_POST['submit'])) {
    $student_id = $_POST['student_id'];
    $subject_id = $_POST['subject_id'];

    $sql = "SELECT AVG(g.grade) AS average_grade
            FROM student_assignments g
            INNER JOIN assignments a ON g.assignment_id = a.assignment_id
            WHERE g.student_id = $student_id
            AND a.subject_id = $subject_id";
    
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Average Grade for Selected Student and Subject:</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<p>Average Grade: {$row['average_grade']}</p>";
        }
    } else {
        echo "No grades found for the selected student and subject.";
    }
}

echo "<form method='post' action='generate_comments.php'>";
echo "<input type='submit' class='btn' value='Generate Comments'>";
echo "</form>";

// Button to download PDF
echo "<button onclick='downloadPDF()' class='btn'>Download PDF</button>";
echo "</div>";

// Close the database connection
$connection->close();

// Include the footer
include "footer.php"; 
?>
<script src="script.js"></script>