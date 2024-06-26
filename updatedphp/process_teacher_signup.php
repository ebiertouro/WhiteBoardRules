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
        $username = mysqli_real_escape_string($connection, $_POST["username"]);
        $password = mysqli_real_escape_string($connection, $_POST["password"]);
        $school_name = mysqli_real_escape_string($connection, $_POST["SchoolName"]);
        $usertype = "teacher";
        $subject_name = mysqli_real_escape_string($connection, $_POST['subject']);
        $grade_level = mysqli_real_escape_string($connection, $_POST['age']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        

            // Insert data into the authorizedusers table
            $insert_authorized_users_sql = "INSERT INTO authorizedusers (username, password, user_type) VALUES "
                    . "('$username', '$password', '$usertype')";
            
            if ($connection->query($insert_authorized_users_sql) === TRUE) {
                // Get the auto-generated au_id
                $au_id = $connection->insert_id;

                // Insert data into the teachers table
                $insert_teachers_sql = "INSERT INTO teachers (au_id, email, username, school_name, grade_level) VALUES "
                        . "('$au_id', '$email', '$username', '$school_name', '$grade_level')";

                if ($connection->query($insert_teachers_sql) === TRUE) {
                    echo "<p>Teacher added successfully!</p>";
                } else {
                    echo "Error inserting into teachers table: " . $connection->error;
                }
            } else {
                echo "Error inserting into authorizedusers table: " . $connection->error;
            }
            
        } else {
            echo "Error: Subject not found or query failed.";
        }
    }

    // Close the database connection
    $connection->close();

    $loggedin =  'home_logged_in.php';  
    echo "<meta http-equiv='refresh' content=0;url='{$loggedin}'>";

    include "footer.php";
?>
