<?php 
    $title = "Home";
    include "header.php";


    // Check if the user is logged in
    if (!isset($_SESSION["LoggedIn"]) || $_SESSION["LoggedIn"] !== TRUE) {
        include "home_logged_out.php";
    }
    else {
        include "home_logged_in.php";
    }

 include "footer.php"; ?>