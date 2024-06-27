<?php
$title = "Log Out";
include "header.php"; 

$name = isset($_COOKIE['UserName']) ? $_COOKIE['UserName'] : '';
echo "You are currently logged in as $name.";
echo "<br></br>";

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

// Query to retrieve students from the database
$query = "SELECT subject_id, subject_name FROM subjects";

$subjects = $connection->query($query);

// Close the database connection
$connection->close();

?>

<!-- HTML starts here -->
<h2>Subject List</h2>
<div class="form-border">
    <table class="student-table">
        <thead>
            <tr>
                <th class="student-table-header">ID</th>
                <th class="student-table-header">Subject</th>
                <th class="student-table-header">Students</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($subjects && $subjects->num_rows > 0) {
                while ($row = $subjects->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='student-table-data'>" . htmlspecialchars($row['subject_id']) . "</td>";
                    echo "<td class='student-table-data'>" . htmlspecialchars($row['subject_name']) . "</td>";
                    echo "<td class='student-table-data'><a class='btn' href='view_students.php?subject_id=". $row['subject_id'] ."&name=". $row['subject_name'] ."'>View Students</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No subjects found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>


<?php
include 'footer.php';
?>
