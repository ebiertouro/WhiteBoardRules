    <?php 
        $title = "Teacher Sign-Up";
        include "header.php"; 
    ?>


     <div class="login-container">
        <div class="form-container">
            <h1>Teacher Sign-Up</h1>

            <form method="post" action="process_teacher_login.php" class="login-form">
                <div class="form-border">
                    <h2>Account Information</h2>
                    <div class="form-group">
                        <label for="Username">Username:</label>
                        <input type="text" name="Username" required>
                    </div>

                    <div class="form-group">
                        <label for="Password">Password:</label>
                        <input type="password" name="Password" required>
                    </div>

                    <h2>Subject and Age Group</h2>
                    <div class="form-group">
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
                    </div>

                    <div class="form-group">
                        <label for="age">Age Group:</label>
                        <div class="radio-group">
                            <label><input type="radio" name="Age" value="Elementary School"> Elementary School</label>
                            <label><input type="radio" name="Age" value="Middle School"> Middle School</label>
                            <label><input type="radio" name="Age" value="High School"> High School</label>
                            <label><input type="radio" name="Age" value="Undergraduate"> Undergraduate</label>
                            <label><input type="radio" name="Age" value="Graduate"> Graduate</label>
                        </div>
                    </div>

                    <h2>School Information</h2>
                    <div class="form-group">
                        <label for="School Name">School Name:</label>
                        <textarea name="School Name" rows="2"></textarea>
                    </div>

                    <h2>Certifications</h2>
                    <div class="form-group">
                        <div class="checkbox-group">
                            <label><input type="checkbox" name="Certification" value="Mulitple Subject"> Multiple Subject Teaching Credential</label>
                            <label><input type="checkbox" name="Certification" value="Single Subject"> Single Subject Credential</label>
                            <label><input type="checkbox" name="Certification" value="National Board"> National Board Certification</label>
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

