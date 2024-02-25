
    <?php $title = "Content";
    include "header.php"; 


    // Start the session
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION["LoggedIn"]) || $_SESSION["LoggedIn"] !== TRUE) {
        // If not logged in, redirect to the login page
       $seconds = 5;

    // Set the URL of the login page
    $loginPage = 'login.php';

    // Output the meta refresh tag with the specified delay and redirect URL
    echo "<meta http-equiv='refresh' content='{$seconds};url={$loginPage}'>";

    // Display a message to inform the user about the redirection
    echo "<a>Invalid Login! You will be redirected to the login page in {$seconds} seconds. 
          Otherwise, <a href='{$loginPage}'>click here</a>.";

    // Terminate the script to prevent further execution
    exit;
        
    }
    else{

        $name = $_COOKIE['UserName'];
        echo "Hello, $name!";
    
    }


  include "footer.php"; ?>