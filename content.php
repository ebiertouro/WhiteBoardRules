
    <?php $title = "Content";
    include "header.php"; 


    // Start the session
    session_start();

    // If not logged in, redirect to the login page
    $seconds = .5;

    // Set the URL of the login page
    $homePage = 'index.php';

    // Output the meta refresh tag with the specified delay and redirect URL
    echo "<meta http-equiv='refresh' content='{$seconds};url={$homePage}'>";

    // Check if the user is logged in
    if (!isset($_SESSION["LoggedIn"]) || $_SESSION["LoggedIn"] !== TRUE) {
        

        // Display a message to inform the user about the redirection
        echo "<a>Invalid Login! You will be redirected to the login page in {$seconds} seconds. 
            Otherwise, <a href='{$homePage}'>click here</a>.";

        // Terminate the script to prevent further execution
        exit;
        
    }
    else{
        // Display a message to inform the user about the redirection
        $name = $_COOKIE['UserName'];
        echo "<a>Welcome $name! You will be redirected to the home page in {$seconds} seconds. 
            Otherwise, <a href='{$homePage}'>click here</a>.";
    
    }


  include "footer.php"; ?>