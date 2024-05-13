<?php 
$title = "Sign-Up Response";
include "header.php"; 
?>

<div class="response-container">
    <h2>Sign-Up Response</h2>
    <?php
    $UserName = isset($_POST['username']) ? $_POST['username'] : '';
    setcookie('UserName', $UserName);
    $_SESSION["LoggedIn"] = TRUE;
    echo "Hello, $UserName!";
    
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


// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $school_name = $_POST["SchoolName"];
    $usertype = "teacher";
    $subject_name = $_POST['subject'];
    $grade_level = $_POST['age'];
    $email = $_POST['email'];
    
    $query = "SELECT MAX(users_id) AS max_id FROM teachers";
    $user_id_result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($user_id_result);
    $users_id = $row['max_id'] + 1;
    
    // Query to retrieve subject_id based on subject_name
    $query_subject_id = "SELECT subject_id FROM subjects WHERE subject_name = '$subject_name'";

    // Execute the query to retrieve subject_id
    $subject_id_result = mysqli_query($connection, $query_subject_id);
    
    if ($subject_id_result) {
        // Fetch the subject_id from the result
        $subject_id_row = mysqli_fetch_assoc($subject_id_result);
        $subject_id = $subject_id_row['subject_id'];

        // Insert data into the authorizedusers table
        $insert_authorized_users_sql = "INSERT INTO authorizedusers (username, password, user_type) VALUES "
                . "('$username', '$password', '$usertype')";
        
        if ($connection->query($insert_authorized_users_sql) === TRUE) {
            // Query to retrieve au_id based on username
            $query_au_id = "SELECT au_id FROM authorizedusers WHERE username = '$username'";
            $au_id_result = mysqli_query($connection, $query_au_id);

            if ($au_id_result) {
                // Fetch the au_id from the result
                $au_id_row = mysqli_fetch_assoc($au_id_result);
                $au_id = $au_id_row['au_id'];

                // Insert data into the teachers table
                $insert_teachers_sql=  "INSERT INTO teachers (users_id, au_id, email, username, school_name, subject_id, grade_level) VALUES "
                        . "('$users_id', '$au_id', '$email', '$username', '$school_name', '$subject_id', '$grade_level')";

                if ($connection->query($insert_teachers_sql) === TRUE) {
                    echo "<p>Teacher added successfully!</p>";
                } else {
                    echo "Error: " . $connection->error;
                }
            } else {
                echo "Error: Unable to fetch au id";
            }
        } else {
            echo "Error: Unable to insert authorized user";
        }
        
        // Close au id query result and subject id query result 
        mysqli_free_result($au_id_result);
        mysqli_free_result($subject_id_result);
        mysqli_free_result($user_id_result);

      } else{
          echo"Error: Unable to fetch subject id";
      }
}

// Close the database connection
$connection->close();

$loggedin =  'home_logged_in.php';  
echo"<meta http-equiv='refresh' content=0;url='{$loggedin}'>";

include"footer.php"; ?>
