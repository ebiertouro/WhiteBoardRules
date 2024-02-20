<!-- signup_response.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up Response</title>
</head>
<body>
    <?php include "header.php"; ?>

    <div class="response-container">
        <h1>Sign-Up Response</h1>

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
</body>
</html>


