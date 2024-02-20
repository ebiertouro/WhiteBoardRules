<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Sign-Up</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
    <?php include "header.php"; ?>

    <div class="login-container">
        <h1>Teacher Sign-Up</h1>

        <form method="post" action="process_teacher_login.php" class="login-form">
            <div class="form-border">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" required>
                </div>

                <div class="form-group">
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
                </div>

                <div class="form-group">
                    <label>Age Group:</label>
                    <div class="radio-group">
                        <input type="radio" name="age" value="elementry"> Elementry School
                        <input type="radio" name="age" value="middle"> Middle School
                        <input type="radio" name="age" value="high"> High School
                        <input type="radio" name="age" value="undergrad"> Undergraduate
                        <input type="radio" name="age" value="graduate"> Graduate
                    </div>
                </div>

                <div class="school-name">
                    <label for="school-name">School Name:</label>
                    <textarea name="school-name" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label>I possess the following certification:</label>
                    <div class="checkbox-group">
                        <input type="checkbox" name="mult" value="mult"> Multiple Subject Teaching Credential
                        <input type="checkbox" name="single" value="singe"> Single Subject Credential
                        <input type="checkbox" name="board" value="board"> National Board Certification
                    </div>
                </div>

                <button type="submit">Login</button>
            </div>
        </form>
    </div>

    <?php include "footer.php"; ?>
</body>
</html>
