<?php
$title = "Assignments";
include "header.php";
?>

<h2>Add Grade</h2>

<!-- HTML and PHP Form Starts Here -->
<div class="form-border">
    <form action='process_grade.php' method='post' id='gradeForm'>
        <label for='student_id'>Student Name:</label>
        <select name='student_id' required>
            <?php
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

            while ($studentRow = $studentResult->fetch_assoc()) :
            ?>
                <option value='<?php echo $studentRow['student_id']; ?>'>
                    <?php echo $studentRow['first_name'] . ' ' . $studentRow['last_name']; ?>
                </option>
            <?php endwhile; ?>
        </select><br>

        <label for='subject_id'>Subject:</label>
        <select name='subject_id' id='subjectSelect' required onchange="fetchAssignments(this.value)">
            <option value=''>Select a Subject</option>
            <?php
            // Retrieve subjects from the database
            $subjectResult = $connection->query("SELECT subject_id, subject_name FROM subjects");

            while ($subjectRow = $subjectResult->fetch_assoc()) :
            ?>
                <option value='<?php echo $subjectRow['subject_id']; ?>'>
                    <?php echo $subjectRow['subject_name']; ?>
                </option>
            <?php endwhile; ?>
        </select><br>

        <div id='assignmentDiv' style='display: none;'>
            <label for='assignment_id'>Assignment:</label>
            <select name='assignment_id' id='assignmentSelect' required disabled>
                <option value=''>Select a Subject First</option>
            </select><br>
        </div>

        <label for='grade'>Grade:</label>
        <input type='number' name='grade' required><br>

        <label for='optionalField'>Modified:</label>
        <input type='checkbox' name='optionalField'><br>

        <input type='submit' class='btn' value='Submit'>
    </form>
</div>
<?php
$connection->close();
include "footer.php";
?>

<!-- JavaScript in its own file (ajax.js) -->
<script src="js/ajax.js"></script>