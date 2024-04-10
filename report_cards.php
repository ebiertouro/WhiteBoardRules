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

    // PHP code to calculate and display average grades for each subject
    if(isset($_POST['submit'])) {
        $student_id = $_POST['student_id']; // Updated to 'student_id'
        $sql = "SELECT c.class_subject, AVG(g.Grade) AS average_grade
                FROM student_assignments g
                INNER JOIN Assignments a ON g.assignment_id = a.assignment_id
                INNER JOIN Classes c ON a.class_id = c.class_id
                WHERE g.student_id = $student_id
                GROUP BY c.class_subject";
        $result = $connection->query($sql);
        
        if ($result->num_rows > 0) {
            echo "<h2>Average Grades for Selected Student:</h2>";
            echo "<ul>";
            
            while ($row = $result->fetch_assoc()) {
                echo "<li>".$row['class_subject'].": ".$row['average_grade']."</li>";
                echo "<input type='hidden' name='grades[]' value='{$row['average_grade']}'>";
            }
            
            echo "</ul>";
        } else {
            echo "No grades found for the selected student.";
        }
    }
    
    echo "<input type='submit' name='submit' class='btn' value='Get Grades'>";
    echo "</form>";

    // Button to generate comments
    echo "<form action='generate_comments.php'>";
    echo "<input type='submit' class='btn' value='Generate Comments'>";
    echo "</form>";

    $connection->close();
    
    include "footer.php"; 
?>
