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

// Retrieve subjects from the database
$subjects_result = $connection->query("SELECT subject_id, subject_name FROM subjects");

?>

<h2>Assignments</h2>

<form id="assignmentForm">
    <label for="subject_id">Select Subject:</label>
    <select name="subject_id" id="subject_id" required>
        <option value="">Select a Subject</option>
        <?php
        // Display options for subjects retrieved from database
        while ($row = $subjects_result->fetch_assoc()) {
            echo "<option value='{$row['subject_id']}'>{$row['subject_name']}</option>";
        }
        ?>
    </select><br>
    <input type="button" onclick="viewAssignments()" value="View Assignments" class="btn">
    <input type="button" onclick="addGrade()" value="Enter a Grade" class="btn">
</form>

<?php
// Close the database connection
$connection->close();

include "footer.php";
?>

<script>
    function viewAssignments() {
        var subjectId = document.getElementById('subject_id').value;
        if (subjectId !== '') {
            window.location.href = 'view_assignments.php?subject_id=' + subjectId;
        }
    }

    function addGrade() {
        var subjectId = document.getElementById('subject_id').value;
        if (subjectId !== '') {
            window.location.href = 'add_grade.php?subject_id=' + subjectId;
        }
    }
</script>
