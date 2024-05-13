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
    // Button to generate comments
        echo "<option value='{$row['student_id']}'>{$row['first_name']} {$row['last_name']}</option>";
    }
    
    echo "</select><br>";

    echo "<input type='submit' name='submit' class='btn' value='Calculate Average'>";
    echo "</form>";

    echo "<form method='post' action='generate_comments.php'>";
    echo "<input type='submit' class='btn' value='Generate Comments'>";
    echo "</form>";
// PHP code to calculate and display average grades for each subject
    if(isset($_POST['submit'])) {
        $student_id = $_POST['studentName']; // Updated to 'studentName'
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
            }
            
            echo "</ul>";
        } else {
            echo "No grades found for the selected student.";
        }
        // To download pdf
        echo "<button onclick='downloadPDF()'>Download PDF</button>";
    }
?>

<script>
    function downloadPDF(){
        // convert template
        const download = (filename, blob) => {
            let blobUrl = window.URL.createObjectURL(blob);
            let a = document.createElement("a");
            a.download = filename;
            a.href = blobUrl;
            a.click();
        }

        const settings = {
            async: true,
            crossDomain: true,
            url: 'https://apitemplate1.p.rapidapi.com/v2/create-pdf?template_id=b3f77b23493320da&async=0&output_html=0&output_format=pdf&export_type=json&webhook_url=https%3A%2F%2Fyourwebserver.com',
            method: 'POST',
            headers: {
                'content-type': 'application/json',
                'X-API-KEY': '89f6MTg3OTc6MTU4OTY6QW90MFFHQVBnbkduYmpNMw=',
                'X-RapidAPI-Key': '70e0c7656cmsh6e2aa52f1e144b4p1941d6jsn3f007f567435',
                'X-RapidAPI-Host': 'apitemplate1.p.rapidapi.com'
            },
            processData: false,
            data: '{\r\n  "teacherName": "Malka Shin",\r\n  "schoolName": "Toras Emes",\r\n  "student": {\r\n    "firstName": "Shayna",\r\n    "lastName": "Israel",\r\n    "id": "KK812251",\r\n    "grades": [\r\n      {\r\n        "subject": "ENGL",\r\n        "courseNum": "101",\r\n        "title": "English Comp",\r\n        "grade": "88"\r\n      },\r\n      {\r\n        "subject": "MATN",\r\n        "courseNum": "101",\r\n        "title": "Algebra 1",\r\n        "grade": "96"\r\n      }\r\n    ],\r\n    "comments": "Shayna is an excellent student who always comes prepared for class. She is a joy to have in class and is always willing to help out other students."\r\n  }\r\n}'
        };

        $.ajax(settings).done(function (response) {
            console.log(response.download_url);
            window.open(response.download_url);
        });
</script>
<?php 


    $connection->close();
    
    include "footer.php"; 
?>
