<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Grade</title>

    <?php include "header.php"; ?>
    <h1>Add Grade</h1>
    
    <form method="post" action="process_grade.php">
        <label for="student_id">Student:</label>
        <select name="student_id">
            <?php
            // Assuming you have a database connection
            $conn = mysqli_connect("your_host", "your_user", "your_password", "grade_database");
            $result = mysqli_query($conn, "SELECT id, first_name, last_name FROM Students");

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['id']}'>{$row['first_name']} {$row['last_name']}</option>";
            }

            mysqli_close($conn);
            ?>
        </select>

        <label for="assignment_id">Assignment:</label>
        <select name="assignment_id">
            <?php
            // Fetch assignments from the database
            $conn = mysqli_connect("your_host", "your_user", "your_password", "grade_database");
            $result = mysqli_query($conn, "SELECT id, assignment_name FROM Assignments");

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['id']}'>{$row['assignment_name']}</option>";
            }

            mysqli_close($conn);
            ?>
        </select>

        <label for="grade">Grade:</label>
        <input type="text" name="grade" required>

        <button type="submit">Submit</button>
    </form>
    <?php include "footer.php"; ?>



