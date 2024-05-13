<?php 
$title = "Students";
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

// Initialize $teacher_id to a default value
$teacher_id = 1;

// Check if au_id is stored in session
if(isset($_SESSION['au_id'])) {
    $au_id = $_SESSION['au_id'];
    // Run a query to search for teacher_id using au_id
    $query = "SELECT teacher_id FROM teachers WHERE au_id = $au_id";
    $result = $connection->query($query);

    // Check if the query was successful
    if($result && $result->num_rows == 1) {
        // Fetch the teacher_id
        $row = $result->fetch_assoc();
        $teacher_id = $row['teacher_id'];
    }
}   

// Retrieve class names from the database for the teacher
$result = $connection->query("SELECT class_id FROM classes WHERE teacher_id = $teacher_id");

echo "<form action='students.php' method='post'>";
echo "<label for='class_id'>Class:</label>";
echo "<select name='class_id' id='class_id' required>";

while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['class_id']}'>{$row['class_id']}</option>";
}

echo "</select><br>";
echo "<input type='submit' class='btn' value='Submit'>";
echo "</form>";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate and sanitize form data
    $class_id = mysqli_real_escape_string($connection, $_POST["class_id"]);

    // Query to retrieve students for the selected class
    $query = "SELECT students.student_id, students.first_name, students.last_name
              FROM students 
              INNER JOIN student_classes ON students.student_id = student_classes.student_id 
              WHERE student_classes.class_id = $class_id";
    
    $result = $connection->query($query);
    
    if ($result && $result->num_rows > 0) { 
       
        while ($row = $result->fetch_assoc()) {
            echo "<br>".$row['first_name'].' '.$row['last_name']."<br>";
        }
        echo "<br>";
    } else { 
        echo "<p>No students found for this class.</p>";
    }
}

echo "<a class='btn' href='add_student.php'>Create New Student</a>";

include "footer.php";
?>
