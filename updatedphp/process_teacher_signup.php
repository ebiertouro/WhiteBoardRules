<?php 
$title = "Sign-Up Response";
include "header.php"; 
?>

<div class="response-container">
    <h2>Sign-Up Response</h2>
    <?php
    // Set cookie and session
    $UserName = isset($_POST['username']) ? $_POST['username'] : '';
    setcookie('UserName', $UserName);
    $_SESSION["LoggedIn"] = TRUE;
    echo "Hello, $UserName!";
    
    // Database connection details
    $dbhost = '127.0.0.1';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'white_board_rules';
    
    // Connect to the database
    $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    // Check the connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Retrieve and sanitize form data
        $username = mysqli_real_escape_string($connection, $_POST["username"]);
        $password = mysqli_real_escape_string($connection, $_POST["password"]);
        $school_name = mysqli_real_escape_string($connection, $_POST["SchoolName"]);
        $usertype = "teacher";
        $grade_level = mysqli_real_escape_string($connection, $_POST['age']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        
        // Insert data into authorizedusers table
        $insert_authorized_users_sql = "INSERT INTO authorizedusers (username, password, user_type) VALUES ('$username', '$password', '$usertype')";
        
        if ($connection->query($insert_authorized_users_sql) === TRUE) {
            // Get the auto-generated au_id
            $au_id = $connection->insert_id;

            // Insert data into teachers table
            $insert_teachers_sql = "INSERT INTO teachers (au_id, email, username, school_name, grade_level) VALUES ('$au_id', '$email', '$username', '$school_name', '$grade_level')";

            if ($connection->query($insert_teachers_sql) === TRUE) {
                echo "<p>Teacher added successfully!</p>";
            } else {
                echo "Error inserting into teachers table: " . $connection->error;
            }
        } else {
            echo "Error inserting into authorizedusers table: " . $connection->error;
        }
    }

    // Close the database connection
    $connection->close();

    // Redirect to the logged-in home page
    $loggedin = 'home_logged_in.php';  
    echo "<meta http-equiv='refresh' content=5;url={$loggedin}'>";

    include "footer.php";
?>
