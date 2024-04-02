    <?php 
        $title = "Comment Generater";
        include "header.php"; 
    ?>
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
        <br></br>
        <label for="grade">Snark Lever:</label>
        <select name="grade">
            <option value="A">Neutral</option>
            <option value="B">Gushing</option>
            <option value="C">Sweet</option>
            <option value="D">Snarky</option>
            <option value="F">Acidic</option>
        </select>

        <button type="submit" class="btn">Generate Comment</button>
    </form>
    <?php include "footer.php"; ?>


