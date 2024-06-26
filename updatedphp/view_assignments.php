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
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Retrieve form data
    $assignment_name = $_GET["assignment_name"];
    $subject_id = $_GET['subject_id'];

    // Insert data into the database
    $sql = "INSERT INTO assignments (assignment_name,subject_id) VALUES ('$assignment_name', '$subject_id')";

    if ($connection->query($sql) === TRUE) {
        echo "<p>Assignment added to subject id " . $_GET['subject_id'] . " successfully!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Query to retrieve students from the database
$query = "SELECT assignment_id, assignment_name from assignments  WHERE subject_id =" . $_GET['subject_id'];

$assignments = $connection->query($query);

// Close the database connection
$connection->close();

?>

<!-- HTML starts here -->
<h2>Assignment List for <?php echo $_GET['name'] ?></h2>
<div class="form-border">
    <table class="student-table">
        <thead>
            <tr>
                <th class="student-table-header">ID</th>
                <th class="student-table-header">Assignment Name</th>
                <th class="student-table-header">Average Grade</th>
                <th class="student-table-header">Add Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($assignments && $assignments->num_rows > 0) {
                while ($row = $assignments->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='student-table-data'>" . htmlspecialchars($row['assignment_id']) . "</td>";
                    echo "<td class='student-table-data'>" . htmlspecialchars($row['assignment_name']) . "</td>";
                    //echo "<td class='student-table-data'>" . htmlspecialchars($row['average_grade']) . "</td>";
                    echo "<td class='student-table-data' </td>";
                    echo "<td class='student-table-data' </td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No students found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</br>
<div class="form-border">
    <h4>Add Assignment</h4>
    <form action='view_assignments.php' method='get'>
        <label for='assignment_name'>Name:</label>
        <input type='text' name='assignment_name' required>
        <input type='hidden' name='subject_id' value='<?php echo $_GET['subject_id']; ?>' required>
        <input type='hidden' name='name' value='<?php echo $_GET['name']; ?>' required>
        
        <input type='submit' value='Add' class='btn'>
    </form>
</div>
</br>
<?php include "footer.php"; ?>