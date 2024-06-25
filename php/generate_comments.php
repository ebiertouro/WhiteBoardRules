<?php 
$title = "Comment Generator";
include "header.php"; 

// Check if student_id is set
$student_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';

$au_id = isset($_SESSION['au_id']) ? $_SESSION['au_id'] : '';

// Connect to the database
$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = '';
$dbname = 'white_board_rules'; // Update with your database name
$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch subject name based on au_id
$sql = "SELECT s.subject_name
        FROM subjects s
        JOIN teachers t ON s.subject_id = t.subject_id
        JOIN authorizedusers au ON t.username = au.username
        WHERE au.au_id = '$au_id'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $subject_name = $row['subject_name'];
} else {
    $subject_name = "Unknown Subject"; // Default value if subject not found
}

// Close the database connection
$connection->close();
?>

<form method="post" action="process_comments.php">
    <input type="hidden" name="grade" value="95"> 


    <label for="snark">Snark Lever:</label>
    <select name="snark">
        <option value="Neutral">Neutral</option>
        <option value="Gushing">Gushing</option>
        <option value="Sweet">Sweet</option>
        <option value="Snarky">Snarky</option>
        <option value="Acidic">Acidic</option>
    </select>
    <br><br>

    <button type="submit" class="btn">Generate Comment</button>
</form>

<?php include "footer.php"; ?>
