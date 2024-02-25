   <?php 
        $title = "Sign-Up Response";
        include "header.php"; 
    session_start();
    
    $UserNameArray = ['e.shapiro', 's.israel', 'professor'];
    $PasswordArray = ['xxx', '1234', 'iloveteaching'];
   
   
    $postedUsername = isset($_POST['username']) ? $_POST['username'] : '';
    $postedPassword = isset($_POST['password']) ? $_POST['password'] : '';

// Check if the posted username is in the array
    if (in_array($postedUsername, $UserNameArray) && in_array($postedPassword, $PasswordArray)) {
              setcookie('UserName', $postedUsername);
              //set the session status to logged in
          $_SESSION["LoggedIn"] = TRUE;
          //direct the user to the content page
          
    }
    else {
        
        $_SESSION["LoggedIn"] = FALSE;
            // Set the number of seconds to wait before redirecting
    
    }
    $ContentPage = 'content.php';
    echo "<a href='{$ContentPage}'> Click here to view your students, record grades, and generate report cards</a>.";

    include "footer.php"; ?>

