    <?php 
    session_start();
        $title = "Teacher Login";
        include "header.php"; 
    ?>


     <div class="login-container">
        <div class="form-container">
            <h1>Login</h1>

            <form method="post" action="process_login.php" class="login-form">
                <div class="form-border">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" required>
                    </div>

                   

                   

                    <div class="button-group">
                        <button type="submit">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php include "footer.php"; ?>






