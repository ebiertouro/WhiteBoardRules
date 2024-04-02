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

// Retrieve class names from the database
$result = $connection->query("SELECT class_id, class_subject FROM classes WHERE teacher_id = 1");



echo "<form action='students.php' method='post'>";
echo "<label for='classID'>Class:</label>";
echo "<select name='classID' id='classID' required>";
echo "<option value='notSelected'>Select A Class</option>";

while ($row = $result->fetch_assoc()) {
    echo "<option value='{$row['class_id']}' ";
    if($row['class_id'] == 1){
        echo "selected";
    }
    echo ">{$row['class_subject']}</option>";
}

echo "</select><br>";
echo "<input type='submit' class='btn' value='Submit'>";
echo "</form>";


// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate and sanitize form data
    $id = mysqli_real_escape_string($connection, $_POST["classID"]);
    
    $result = $connection->query("SELECT students.student_id, first_name, last_name, student_classes.class_id FROM students INNER JOIN student_classes ON STUDENTS.student_id = student_classes.student_id WHERE class_id = 1");
    if (mysqli_num_rows($result) > 0) { 
        echo "<table> <tr> <th>First Name</th><th>Last Name</th><th>Average (coming)</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row['first_name']."</td><td>".$row['last_name']."</td><td>100</td></tr>";
        }
        echo "</table>";
    } else { 
        echo "<p> No students added yet for this course.</p>";
        

    }
}

echo"<a class='' href='add_student.php'>Add Student</a>"

?>


<?php include "footer.php"; ?>