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

// Check if subject_id is set in the URL
if (!isset($_GET['subject_id'])) {
    die("Error: subject_id is not specified.");
}

$subject_id = $_GET['subject_id'];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $student_id = $_POST["student_id"];

    // Insert data into the database
    $sql = "INSERT INTO student_subject (student_id, subject_id) VALUES ('$student_id', '$subject_id')";

    $subject_name_query = "SELECT subject_name FROM subjects WHERE subject_id = $subject_id";
    $subject_result = $connection->query($subject_name_query);

    // Check if the query was successful
    if ($subject_result) {
        // Fetch the result
        $row = $subject_result->fetch_assoc();
        // Get the subject name
        $subject_name = $row['subject_name'];
    } else {
        // Handle the error
        echo "Error: " . $connection->error;
    }

    $student_name_query = "SELECT first_name, last_name FROM students WHERE student_id = $student_id";
    $student_result = $connection->query($student_name_query);

    // Check if the query was successful
    if ($student_result) {
        // Fetch the result
        $row = $student_result->fetch_assoc();
        // Get the student name
        $student_name = $row['first_name'] . " " . $row['last_name'];
    } else {
        // Handle the error
        echo "Error: " . $connection->error;
    }

    if ($connection->query($sql) === TRUE) {
        echo "<p>$student_name successfully added to $subject_name!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Query to retrieve students enrolled in the subject
$query = "SELECT students.student_id, first_name, last_name, birthday 
FROM students 
JOIN student_subject ON students.student_id = student_subject.student_id 
WHERE subject_id = $subject_id";

$currentStudents = $connection->query($query);

// Query to retrieve students not enrolled in the subject
$query = "SELECT DISTINCT students.student_id, first_name, last_name, birthday 
FROM students 
LEFT OUTER JOIN student_subject ON students.student_id = student_subject.student_id 
WHERE students.student_id NOT IN (
    SELECT student_id FROM student_subject WHERE subject_id = $subject_id
)";

$possibleStudents = $connection->query($query);

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
            if ($currentStudents && $currentStudents->num_rows > 0) {
                while ($row = $currentStudents->fetch_assoc()) {
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

<br>
<div class="form-border">
    <h4>Add Existing Student</h4>
    <form action='view_students.php?subject_id=<?php echo $subject_id; ?>' method='post'>
        <select name='student_id' required>
            <?php
            while ($studentRow = $possibleStudents->fetch_assoc()) :
            ?>
                <option value='<?php echo $studentRow['student_id']; ?>'>
                    <?php echo htmlspecialchars($studentRow['first_name'] . ' ' . $studentRow['last_name']); ?>
                </option>
            <?php endwhile; ?>
        </select>
        <input type='submit' value='Add' class='btn'>
    </form>
</div>
<br>
<a class='btn' href='add_student.php?subject_id=<?php echo $subject_id; ?>'>Add New Student</a>

<?php include "footer.php"; ?>
