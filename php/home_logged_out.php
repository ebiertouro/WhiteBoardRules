
<?php
$title = "Log in";
?>
<div class="flexContent notLoggedIn">
<div class="leftContent">
    <h1>Welcome!</h1>
    <p>Streamline the process of report card making with our platform.<br/>You can create these too:</p>
    <ul class="rslides">
        <li><img src="Samples/1.JPG" alt=""></li>
        <li><img src="Samples/2.JPG" alt=""></li>
        <li><img src="Samples/3.JPG" alt=""></li>
        <li><img src="Samples/4.JPG" alt=""></li>
    </ul>
</div>

<div class="rightContent" >
    <div class="login">
        <div class="login-container">
            <div class="form-container">
                <form method="post" action="process_login.php" class="login-form">
                    <div class="form-border">
                        <h1>Login</h1>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" autocomplete="yes"/>
                        </div>


                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" />

                        </div>
                        <div class="button-group">
                            <button type="submit" class="btn">Login</button>
                        </div>
                        <p style="text-align:center">Not Registered? <a href="sign_up.php">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="signUp">
    </div>
</div>
</div>

<script>
  $(function() {
    $(".rslides").responsiveSlides({
        auto: true,             // Boolean: Animate automatically, true or false
        speed: 500,            // Integer: Speed of the transition, in milliseconds
        timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
    })
  });
</script>
