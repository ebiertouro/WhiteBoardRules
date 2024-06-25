
    <?php $title = "Content";
    include "header.php"; 


   
    // If not logged in, redirect to the login page
    $seconds = 5;

    // Set the URL of the login page
    $homePage = 'index.php';

    // Output the meta refresh tag with the specified delay and redirect URL
    echo "<meta http-equiv='refresh' content='{$seconds};url={$homePage}'>";

    // Check if the user is logged in
    if (!isset($_SESSION["LoggedIn"]) || $_SESSION["LoggedIn"] !== TRUE) {
        

        // Display a message to inform the user about the redirection
        echo "<p>Invalid Login! You will be redirected to the login page in {$seconds} seconds. 
            Otherwise, <a href='{$homePage}'>click here</p>";

        // Terminate the script to prevent further execution
        exit;
        
    }
    else{
        // Display a message to inform the user about the redirection
        $loggedin = "home_logged_in.php";  
        echo"<meta http-equiv='refresh' content=0;url='{$loggedin}'>";
    }


  include "footer.php"; ?>