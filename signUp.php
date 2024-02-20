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
        <div class="form-container">
            <h1>Teacher Sign-Up</h1>

            <form method="post" action="process_teacher_login.php" class="login-form">
                <div class="form-border">
                    <h2>Account Information</h2>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" required>
                    </div>

                    <h2>Subject and Age Group</h2>
                    <div class="form-group">
                        <label for="subject">Select Subject:</label>
                        <select name="subject">
                            <option value="math">Math</option>
                            <option value="english">English</option>
                            <!-- Add more subjects as needed -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="age">Age Group:</label>
                        <div class="radio-group">
                            <label><input type="radio" name="age" value="elementary"> Elementary School</label>
                            <label><input type="radio" name="age" value="middle"> Middle School</label>
                            <label><input type="radio" name="age" value="high"> High School</label>
                            <label><input type="radio" name="age" value="undergrad"> Undergraduate</label>
                            <label><input type="radio" name="age" value="graduate"> Graduate</label>
                        </div>
                    </div>

                    <h2>School Information</h2>
                    <div class="form-group">
                        <label for="school-name">School Name:</label>
                        <textarea name="school-name" rows="4"></textarea>
                    </div>

                    <h2>Certifications</h2>
                    <div class="form-group">
                        <div class="checkbox-group">
                            <label><input type="checkbox" name="mult" value="mult"> Multiple Subject Teaching Credential</label>
                            <label><input type="checkbox" name="single" value="single"> Single Subject Credential</label>
                            <label><input type="checkbox" name="board" value="board"> National Board Certification</label>
                        </div>
                    </div>

                    <div class="button-group">
                        <button type="submit">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php include "footer.php"; ?>
</body>
</html>
