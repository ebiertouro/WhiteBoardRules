<?php
    $title = "Report Cards";
    include "header.php"; 

    // Connect to the database
    $dbhost = '127.0.0.1';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'white_board_rules';
    $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    // Retrieve student names from the database
    $result = $connection->query("SELECT student_id, first_name, last_name FROM students");

    echo "<form method='post' action='generate_comments.php'>";
    echo "<label for='student_id'>Select Student:</label>";
    echo "<select name='student_id' id='student_id' required>";

    while ($row = $result->fetch_assoc()) {
        echo "<option value='{$row['student_id']}'>{$row['first_name']} {$row['last_name']}</option>";
    }
    
    echo "</select><br>";

    echo "<input type='submit' name='submit' class='btn' value='Get Grades'>";
    echo "</form>";

    // Button to generate comments
    echo "<form method='post' action='generate_comments.php'>";
    echo "<input type='submit' class='btn' value='Generate Comments'>";
    echo "</form>";

    $connection->close();
    
    include "footer.php"; 
?>
