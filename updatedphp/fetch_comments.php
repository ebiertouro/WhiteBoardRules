<?php
// fetch_comments.php

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

// Retrieve data from AJAX request
$subject_id = $_POST['subject_id'];
$snark_level = $_POST['snark_level'];
$letter_grade = $_POST['letter_grade'];

// Query to fetch comment
$sql_comment = "SELECT comment FROM comments
                WHERE snark_level = '$snark_level'
                AND grade = '$letter_grade'
                AND subject_id = $subject_id";

$result_comment = $connection->query($sql_comment);

// Prepare response
$response = array();
if ($result_comment && $result_comment->num_rows > 0) {
    $comment_row = $result_comment->fetch_assoc();
    $response['comment'] = $comment_row['comment'];
} else {
    $response['comment'] = "No comment available for this combination";
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);

// Close the database connection
$connection->close();
?>
