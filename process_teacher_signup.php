    <?php 
        $title = "Sign-Up Response";
        include "header.php"; 
    ?>


    <div class="response-container">
        <h2>Sign-Up Response</h2>
<p>ERROR! THIS SHOULD BE SAVED TO THE DATABASE!</p>
        <?php
        $UserName = isset($_POST['username']) ? $_POST['username'] : '';
        setcookie('UserName', $UserName);
        $_SESSION["LoggedIn"] = TRUE;
        echo "Hello, $UserName!";
        ?>
    </div>

    <?php include "footer.php"; ?>



