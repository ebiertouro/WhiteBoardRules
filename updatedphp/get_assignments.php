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

// Retrieve subject_id from GET parameters
$subjectId = $_GET['subject_id'];

// Prepare and execute query to fetch assignments based on subject_id
$query = "SELECT assignment_id, assignment_name FROM assignments WHERE subject_id = '$subjectId'";
$result = $connection->query($query);

$assignments = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $assignments[] = [
            'assignment_id' => $row['assignment_id'],
            'assignment_name' => $row['assignment_name']
        ];
    }
}

// Return assignments as JSON
echo json_encode($assignments);

$connection->close();
?>