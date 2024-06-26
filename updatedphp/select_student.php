<?php
// select_student.php

$title = "Select Student";
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

// Query to retrieve all students from the database
$query = "SELECT student_id, first_name, last_name FROM students";
$students = $connection->query($query);

// Close the database connection
$connection->close();
?>

<h2>Select Student</h2>
<div class="form-border">
    <form action='report_cards.php' method='post'>
        <select name='student_id' required>
            <?php
            if ($students && $students->num_rows > 0) {
                while ($studentRow = $students->fetch_assoc()) {
                    echo "<option value='" . htmlspecialchars($studentRow['student_id']) . "'>";
                    echo htmlspecialchars($studentRow['first_name']) . " " . htmlspecialchars($studentRow['last_name']);
                    echo "</option>";
                }
            } else {
                echo "<option value=''>No students found</option>";
            }
            ?>
        </select>
        <input type='submit' value='View Report Card' class='btn'>
    </form>
</div>

<?php include "footer.php"; ?>
