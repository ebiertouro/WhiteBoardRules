<?php 
        $title = "Sign-Up Response";
        include "header.php"; 
       
    ?>


<?php

    setcookie('UserName', "", time()-3600);
    $_SESSION["LoggedIn"] = FALSE;

    $seconds = 5;
    $homePage = 'index.php';

    // Output the meta refresh tag with the specified delay and redirect URL
    echo "<meta http-equiv='refresh' content='{$seconds};url={$homePage}'>";

    // Display a message to inform the user about the redirection
    echo "<a>Logging out... You will be redirected to the login page in {$seconds} seconds. 
    Otherwise, <a href='{$homePage}'>click here</a>.";

include "footer.php"; ?>
