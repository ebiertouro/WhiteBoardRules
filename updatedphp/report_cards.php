<?php
// report_cards.php

$title = "Report Cards";
include "header.php";

// Connect to the database (replace with your connection logic)
$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = '';
$dbname = 'white_board_rules';
$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check for connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if a student has been selected
if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];
    
    $student_name = $_POST["student_name"];
    
    
    // Start form for displaying report cards
    echo '<div class="form-border">';
    echo '<form method="post">';
    echo '<table class="student-table" id="report_card_table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th class="student-table-header">Subject</th>';
    echo '<th class="student-table-header">Snark Level</th>';
    echo '<th class="student-table-header">Average Grade</th>';
    echo '<th class="student-table-header">Generated Comment</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Retrieve subjects from the database for the selected student
    $subjects_result = $connection->query("SELECT s.subject_id, s.subject_name
                                            FROM subjects s
                                            JOIN student_subject ss ON s.subject_id = ss.subject_id
                                            WHERE ss.student_id = $student_id");

    // Retrieve snark levels from the database
    $result_snark_levels = $connection->query("SELECT DISTINCT snark_level FROM comments");

    // Loop through each subject to display report card details
    while ($row_subject = $subjects_result->fetch_assoc()) {
        $subject_id = $row_subject['subject_id'];
        $subject_name = $row_subject['subject_name'];

        // Calculate average grade
        $sql_avg_grade = "SELECT AVG(g.grade) AS average_grade
                          FROM student_assignments g
                          INNER JOIN assignments a ON g.assignment_id = a.assignment_id
                          WHERE g.student_id = $student_id
                          AND a.subject_id = $subject_id";

        $result_avg_grade = $connection->query($sql_avg_grade);

        if ($result_avg_grade && $result_avg_grade->num_rows > 0) {
            $average_grade_row = $result_avg_grade->fetch_assoc();
            $average_grade = round($average_grade_row['average_grade']); // Round to whole number

            // Determine letter grade based on average grade
            if ($average_grade > 92) {
                $letter_grade = 'A';
            } else if ($average_grade > 83) {
                $letter_grade = 'B';
            } else if ($average_grade > 74) {
                $letter_grade = 'C';
            } else if ($average_grade > 65) {
                $letter_grade = 'D';
            } else {
                $letter_grade = 'F';
            }
        } else {
            $average_grade = 0;
            $letter_grade = 'N/A';
        }

        echo "<tr class='student-table-row' data-subject-id='$subject_id' data-letter-grade='$letter_grade'>";
        echo "<td class='student-table-data subject_name'>$subject_name</td>";
        echo "<td class='student-table-data snark_level'>";
        echo "<select name='snark_level[$subject_id]' class='snark-level-select' data-subject-id='$subject_id'>";
        echo "<option value=''>Select a snark level...</option>";

        // Populate snark level options
        if ($result_snark_levels && $result_snark_levels->num_rows > 0) {
            $result_snark_levels->data_seek(0); // Reset the result set pointer
            while ($row = $result_snark_levels->fetch_assoc()) {
                $snark_level = htmlspecialchars($row['snark_level']);
                $selected = (isset($_POST['snark_level'][$subject_id]) && $_POST['snark_level'][$subject_id] == $snark_level) ? 'selected' : '';
                echo "<option value='$snark_level' $selected>$snark_level</option>";
            }
        }
        
        echo "</select>";
        echo "</td>";

        echo "<td class='student-table-data average_grade'>$average_grade</td>";

        // Comment cell
        echo "<td class='student-table-data comment-cell' data-subject-id='$subject_id'>";
        if (isset($_POST['snark_level'][$subject_id])) {
            $snark_level = $_POST['snark_level'][$subject_id];
            
            // Construct SQL query
            $sql_comment = "SELECT comment FROM comments
                            WHERE snark_level = '$snark_level'
                            AND grade = '$letter_grade'
                            AND subject_id = $subject_id";

            $result_comment = $connection->query($sql_comment);

            if ($result_comment === false) {
                echo "Error fetching comment: " . $connection->error;
            } else {
                $comment_text = "No comment available for this combination";

                if ($result_comment->num_rows > 0) {
                    $comment_row = $result_comment->fetch_assoc();
                    $comment_text = $comment_row['comment'];
                }

                echo $comment_text;
            }
        } else {
            echo "Please select a snark level to see the comment";
        }
        echo "</td>";

        echo '</tr>';
    }

    // Close table and form
    echo '</tbody>';
    echo '</table>';
    echo '<input type="hidden" name="student_id" value="'.$student_id.'">';
    echo '<input type="hidden" name="student_name" value="'.$student_name.'">';
    echo '<br></br>';
    
    //echo '<button class="btn" type="submit" onClick="downloadPDF()">Generate PDF</button>';
    echo '</form>';
    echo "<button id='downloadBtn' class='btn' onclick='downloadPDF()'>Generate PDF</button>";
    echo '</div>';

}else {
    // If no student_id is set, display a message
    echo "<p>No student selected.</p>";
}

// Close the database connection
$connection->close();

// Output the jQuery and your script before the footer
?>

<?php
echo '<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
echo '<script src="js/load_comment.js"></script>';
echo '<script src="js/api_call.js"></script>';
// Now output the footer
include "footer.php";
?>