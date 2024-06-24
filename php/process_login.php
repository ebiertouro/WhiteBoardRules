    <?php 
        $title = "Sign-Up Response";
        include "header.php"; 
        
    ?>
    <?php
        // get users input
        $postedUsername = isset($_POST['username']) ? $_POST['username'] : '';
        $postedPassword = isset($_POST['password']) ? $_POST['password'] : '';

        // connect to DB
        $dbhost = '127.0.0.1';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'white_board_rules';
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
         
        // check connection
        if($mysqli->connect_errno ) {
            printf("Connect failed: %s<br />", $mysqli -> connect_error);
            exit();
        }

        // check if server is alive
        if (!($mysqli->ping())) {
            printf ("Error: %s\n", $mysqli->error);
            exit();
        }

       
         
        // Run Query
        $sql = "SELECT `username`, `password` FROM `authorizedusers` WHERE `username` = '" 
                . $postedUsername . "' AND `password`= '" . $postedPassword . "'";
        $result = $mysqli->query($sql);
           
        if ($result->num_rows == 1) {
            setcookie('UserName', $postedUsername);
            $_SESSION["LoggedIn"] = TRUE;
        } else {
            $_SESSION["LoggedIn"] = FALSE;
        }

        // Close DB
        mysqli_free_result($result);
        $mysqli->close();

        // Output the meta refresh tag with the specified delay and redirect URL
        $seconds = .5;
        $process = 'login_response.php';
        echo "<meta http-equiv='refresh' content='{$seconds};url={$process}'>";

    include "footer.php"; ?>
