<?php 
$title = "View Students";
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

// Query to retrieve students from the database
$query = "SELECT student_id, first_name, last_name, birthday FROM students";

$result = $connection->query($query);

// Close the database connection
$connection->close();

?>

<!-- HTML starts here -->
<h2>Student List</h2>
<div class="form-border">
<table class="student-table">
    <thead>
        <tr>
            <th class="student-table-header">ID</th>
            <th class="student-table-header">First Name</th>
            <th class="student-table-header">Last Name</th>
            <th class="student-table-header">Birthday</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if ($result && $result->num_rows > 0) { 
            while ($row = $result->fetch_assoc()) {
                // Format birthday as required
                $formattedBirthday = date("Y-m-d", strtotime($row['birthday']));
                echo "<tr>";
                echo "<td class='student-table-data'>" . htmlspecialchars($row['student_id']) . "</td>";
                echo "<td class='student-table-data'>" . htmlspecialchars($row['first_name']) . "</td>";
                echo "<td class='student-table-data'>" . htmlspecialchars($row['last_name']) . "</td>";
                echo "<td class='student-table-data' data-date='{$formattedBirthday}'>" . htmlspecialchars($formattedBirthday) . "</td>";
                echo "</tr>";
            }
        } else { 
            echo "<tr><td colspan='4'>No students found.</td></tr>";
        }
        ?>
    </tbody>
</table>
</div>
<?php include "footer.php"; ?>
