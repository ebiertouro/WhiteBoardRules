    <?php 
        $title = "Sign-Up Response";
        include "header.php"; 
        session_start();
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

        printf('Connected successfully.<br />');
         
        // Run Query
        $sql = "SELECT `username`, `password` FROM `authorizedusers` WHERE `username` = '" . $postedUsername . "' AND `password`= '" . $postedPassword . "'";
        $result = $mysqli->query($sql);
           
        if ($result->num_rows == 1) {
            setcookie('UserName', $postedUsername);
            $_SESSION["LoggedIn"] = TRUE;
            printf('Logged in.<br />');
        } else {
            $_SESSION["LoggedIn"] = FALSE;
            printf('Not logged in.<br />');
        }

        // Close DB
        mysqli_free_result($result);
        $mysqli->close();

        $ContentPage = 'content.php';
        echo "<a href='{$ContentPage}'> Click here to view your students, record grades, and generate report cards</a>.";

    include "footer.php"; ?>

