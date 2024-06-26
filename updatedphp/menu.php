<div id="header">
    <div class="logo-container">
        <a href="index.php">
            <img src="images/LogoImage.png" width="80" id="logo" />
            <img src="images/LogoSlogan.png" id="slogan" />
        </a>
    </div>
    <ul id="navigation" class="slimmenu">
        <li class="navItem"></li>
        <?php 
            // Check if session is not started, then start it
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
    
            // Check if user is logged in and session variable is set
            if (isset($_SESSION["LoggedIn"]) && $_SESSION["LoggedIn"] == TRUE) {
                echo '<li class="navItem"><a class="nav ';
                if ($title == "Students") {
                    echo 'active';
                }
                echo '" href="./students.php">Students</a></li>';
                echo '<li class="navItem"><a class="nav ';
                if ($title == "Assignments") {
                    echo 'active';
                }
                echo '" href="./assignments.php">Assignments</a></li>';
                
                echo '<li class="navItem"><a class="nav ';
                if ($title == "Report Cards") {
                    echo 'active';
                }
                echo '" href="./select_student.php">Report Cards</a></li>';
                
                echo '<li class="navItem"><a class="nav ';
                if ($title == "Log Out") {
                    echo 'active';
                }
                echo '" href="process_log_out.php">Log Out</a></li>';
            }
            else{
                if($title != "Home" & $title != "ContactUs" & $title != "Teacher Sign-Up" & $title != "Sign-Up Response"   ){
                    header('Location: index.php');
                }
            }
        ?>
    </ul>
</div>
