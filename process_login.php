//login response

    <?php
    
    $UserNameArray = ['e.shapiro', 's.israel', 'professor'];
    $PasswordArray = ['xxx', '1234', 'iloveteaching'];
   
   
    $postedUsername = isset($_POST['username']) ? $_POST['username'] : '';

// Check if the posted username is in the array
    if (in_array($postedUsername, $usernamesArray)) {
         /*
    * 2) response page - checks username and password against arrays of 
    * valid usernames and passwords (normally this is done against a database - we'll change it later)

If valid - saves username to a cookie, and sets session variable LoggedIn to TRUE. If not, sets the session variable to FALSE.

Displays link to "content page" (the page you're protecting).

3) content page - checks session variable - if the user is logged in (session variable is true),
    *  says Hello "XXXX" where XXXX is the username from the cookie.

    */
    }
    else {
     /*   If not logged in, displays an error message and link it back to the login page. 
    * (If you want, you can have it redirect automatically after a certain number of seconds using a meta refresh tag.)
    */
    }
  
    
    ?>

