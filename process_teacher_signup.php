    <?php 
        $title = "Sign-Up Response";
        include "header.php"; 
    ?>


    <div class="response-container">
        <h1>Sign-Up Response</h1>
<h1>ERROR! THIS SHOULD BE SAVED TO THE DATABASE!</h1>
        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Print out each submitted value
            foreach ($_POST as $key => $value) {
                echo "<p><strong>{$key}:</strong> {$value}</p>";
            }
        } else {
            echo "<p>No data submitted.</p>";
        }
        ?>
    </div>

    <?php include "footer.php"; ?>



