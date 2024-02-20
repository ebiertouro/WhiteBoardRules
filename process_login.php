    <?php 
        $title = "Login Response";
        include "header.php"; 
    ?>

    <h1>Login Response</h1>

    <?php
    // Print submitted values
    echo "<p>Username: " . htmlspecialchars($_POST['username']) . "</p>";
    echo "<p>Password: " . htmlspecialchars($_POST['password']) . "</p>";
    echo "<p>Subject: " . htmlspecialchars($_POST['subject']) . "</p>";
    echo "<p>Teaching Method: " . htmlspecialchars($_POST['teaching_method']) . "</p>";
    echo "<p>Preferences: " . htmlspecialchars($_POST['preferences']) . "</p>";

    if (isset($_POST['experience'])) {
        echo "<p>Experience: " . htmlspecialchars($_POST['experience']) . "</p>";
    }

    if (isset($_POST['certified'])) {
        echo "<p>Certified: " . htmlspecialchars($_POST['certified']) . "</p>";
    }
    ?>

<?php include "footer.php"; ?>
