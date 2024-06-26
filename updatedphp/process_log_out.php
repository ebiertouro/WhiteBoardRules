<?php 
        $title = "Sign-Up Response";
        include "header.php"; 
       
    ?>


<?php

    setcookie('UserName', "", time()-3600);
    $_SESSION["LoggedIn"] = FALSE;
    $_SESSION['au_id'] = '';
    unset($_SESSION['au_id']);

    $seconds = 5;
    $homePage = 'index.php';

    // Output the meta refresh tag with the specified delay and redirect URL
    echo "<meta http-equiv='refresh' content='{$seconds};url={$homePage}'>";

    // Display a message to inform the user about the redirection
    echo "<p>Logging out... You will be redirected to the login page in {$seconds} seconds. 
    Otherwise, <a href='{$homePage}'>click here.</p>";

include "footer.php"; ?>
