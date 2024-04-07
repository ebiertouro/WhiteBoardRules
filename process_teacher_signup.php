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
//it uses username, password, and user_type should automatically be teacher
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $usertype = "teacher";

    // Insert data into the database
    $sql = "INSERT INTO authorizedusers (username, password, user_type) VALUES "
            . "('$username', '$password', '$usertype')";

    if ($connection->query($sql) === TRUE) {
        echo "<p>Teacher added successfully!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Close the database connection
$connection->close();

  $loggedin = "home_logged_in.php";  
        echo"<meta http-equiv='refresh' content=0;url='{$loggedin}'>";
        ?>
    </div>

    <?php include "footer.php"; ?>



