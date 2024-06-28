<?php

$title = "View Assignments";
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

// Handle form submission
if (isset($_GET['subject_id'])) {
    $subject_id = $_GET['subject_id'];
}

// Insert data into the database
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $assignment_name = $_POST["assignment_name"];

    $sql = "INSERT INTO assignments (assignment_name, subject_id) VALUES ('$assignment_name', '$subject_id')";
    
    if ($connection->query($sql) === TRUE) {
        echo "<p>Assignment added to subject id $subject_id successfully!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Query to retrieve assignments from the database
$query = "SELECT assignment_id, assignment_name FROM assignments WHERE subject_id = $subject_id";
$assignments = $connection->query($query);

// Query to retrieve the subject name
$subject_name_query = "SELECT subject_name FROM subjects WHERE subject_id = $subject_id";
$subject_name_result = $connection->query($subject_name_query);

$row = $subject_name_result->fetch_assoc();
$subject_name = $row['subject_name'];

// Close the database connection
$connection->close();

?>

<!-- HTML starts here -->
<h2>Assignment List for <?php echo $subject_name; ?></h2>
<div class="form-border">
    <table class="student-table">
        <thead>
            <tr>
                <th class="student-table-header">ID</th>
                <th class="student-table-header">Assignment Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($assignments && $assignments->num_rows > 0) {
                while ($row = $assignments->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='student-table-data'>" . htmlspecialchars($row['assignment_id']) . "</td>";
                    echo "<td class='student-table-data'>" . htmlspecialchars($row['assignment_name']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No assignments found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<br>
<div class="form-border">
    <h4>Add Assignment</h4>
    <form action='view_assignments.php?subject_id=<?php echo $subject_id; ?>' method='post'>
        <label for='assignment_name'>Name:</label>
        <input type='text' name='assignment_name' required>
        <input type='submit' value='Add' class='btn'>
    </form>
</div>
<br>
<?php include "footer.php"; ?>
