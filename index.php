<?php 
    $title = "Home";
    include "header.php";
?>
<?php
    // Start the session
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION["LoggedIn"]) || $_SESSION["LoggedIn"] !== TRUE) {
        include "homeLoggedOut.php";
    }
    else {
        include "homeLoggedIn.php";
    }

?>    
<?php include "footer.php"; ?>


