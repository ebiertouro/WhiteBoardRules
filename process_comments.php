<?php
// Assuming you have a database connection
$conn = mysqli_connect("your_host", "your_user", "your_password", "your_database");

// Retrieve form data
$subject = $_POST['subject'];
$grade = $_POST['grade'];

// Fetch a generic comment from the database (You need to modify this query based on your schema)
$sql = "SELECT comment FROM GenericComments WHERE subject='$subject' AND grade='$grade' ORDER BY RAND() LIMIT 1";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    $comment = $row['comment'];
    echo "Generated Comment: $comment";
} else {
    echo "No comment available for the selected criteria.";
}

mysqli_close($conn);
?>
