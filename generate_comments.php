<?php 
    $title = "Comment Generator";
    include "header.php"; 

    // Check if student_id and grade are set
    $student_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';
    $grade = isset($_POST['grade']) ? $_POST['grade'] : '';
?>

<h1>Generate Report Card Comments</h1>

<form method="post" action="process_comments.php">
    <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($student_id); ?>">
  <!-- <input type="hidden" name="grade" value="<?php echo htmlspecialchars($grade); ?>">  -->
    <input type="hidden" name="grade" value="95"> 

    <label for="subject">Select Subject:</label>
    <select name="subject">
        <option value="Math">Math</option>
        <option value="English">English</option>
        <option value="Chemistry">Chemistry</option> 
        <option value="Global History">Global History</option>
        <option value="American History">American History</option>
        <option value="Biology">Biology</option>
        <option value="Geometry">Geometry</option>
        <option value="Trigonometry">Trigonometry</option>
        <option value="Home Economics">Home Economics</option>
    </select>
    <br><br>

    <label for="snark">Snark Lever:</label>
    <select name="snark">
        <option value="Neutral">Neutral</option>
        <option value="Gushing">Gushing</option>
        <option value="Sweet">Sweet</option>
        <option value="Snarky">Snarky</option>
        <option value="Acidic">Acidic</option>
    </select>
    <br><br>

    <button type="submit" class="btn">Generate Comment</button>
</form>

<?php include "footer.php"; ?>
