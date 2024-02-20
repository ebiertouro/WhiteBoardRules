<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Comments</title>
<?php include "header.php"; ?>
    <h1>Generate Report Card Comments</h1>

    <form method="post" action="process_comments.php">
        <label for="subject">Select Subject:</label>
        <select name="subject">
            <option value="math">Math</option>
            <option value="english">English</option>
            <option value="chem">Chemistry</option>
            <option value="global">Global History</option>
            <option value="US_history">American History</option>
            <option value="bio">Biology</option>
            <option value="geometry">Geometry</option>
            <option value="trig">Trigonometry</option>
            <option value="home_ec">Home Economics</option>
        </select>

        <label for="grade">Select Grade:</label>
        <select name="grade">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="F">F</option>
        </select>

        <button type="submit">Generate Comment</button>
    </form>
    <?php include "footer.php"; ?>


