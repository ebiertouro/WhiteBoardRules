   <?php 
        $title = "Teacher Sign-Up";
        include "header.php"; 
    ?>

<div class="container login-container">
        <div class="container form-container">

            <form id="registrationForm" method="post" action="process_teacher_signup.php" class="login-form">
                <div class="form-border">
                    <h1>Teacher Sign-Up</h2>
                    <h2>Account Information</h2>

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" autocomplete="yes"/>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" autocomplete="yes"/>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" autocomplete="yes"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="text" class="form-control" name="email" id="email" autocomplete="yes"/>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"/>

                    </div>

                    <div class="form-group">
                        <label for="ConfirmPassword">Confirm Password:</label>
                        <input type="password" class="form-control" name="ConfirmPassword" id="ConfirmPassword"/>
                    </div>

                    <h2>Teaching Specifications</h2>

                    <div class="form-group">
                        <label for="SchoolName">School Name</label>
                        <input type="text" class="form-control" name="SchoolName" id="SchoolName">
                    </div>

                    <div class="form-group">
                        <h6 style="margin-top:10px;">Grade Level</h6>
                        <div>
                            <div class="radio form-check">
                                    <input type="radio" name="age" value="Elementary School" id="eSchool"/> 
                                    <label for="Elementary School">Elementary School</label>
                            </div>
                            <div class="radio form-check">
                                    <input type="radio" name="age" value="Middle School" id="mSchool"/> 
                                    <label for="Middle School">Middle School</label>
                            </div>
                            <div class="radio form-check">
                                    <input type="radio" name="age" value="High School" id="hSchool"/> 
                                    <label for="High School">High School</label>
                            </div>
                            <div class="radio form-check">
                                    <input type="radio" name="age" value="Undergraduate" id="uGraduate"/>
                                    <label for="Under Graduate">Undergraduate</label>
                            </div>
                            <div class="radio form-check">
                                    <input type="radio" name="age" value="Graduate" id="graduate"/> 
                                    <label for="Graduate">Graduate</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group profile-pic-container">
                        <h2>Select Profile Icon</h2>
                        <div class="profile-pic-div">
                            <div><img class="slickImg" src="images/IconImages/art.jpeg" alt="art supplies clip art"></div>
                            <div><img class="slickImg" src="images/IconImages/baking.jpeg" alt="baking supplies clip art"></div>
                            <div><img class="slickImg" src="images/IconImages/calc.jpeg" alt="calculus chalkboard clip art"></div>
                            <div><img class="slickImg" src="images/IconImages/comp.jpeg" alt="computer clip art"></div>
                            <div><img class="slickImg" src="images/IconImages/dog.jpeg" alt="dog clip art"></div>
                            <div><img class="slickImg" src="images/IconImages/eng.jpeg" alt="bookd clip art"></div>
                            <div><img class="slickImg" src="images/IconImages/fitness.jpeg" alt="fitness supplies clip art"></div>
                            <div><img class="slickImg"  src="images/IconImages/gardening.jpeg" alt="gardening supplies clip art"></div>
                            <div><img class="slickImg" src="images/IconImages/history.jpeg" alt="world globe clip art"></div>
                            <div><img class="slickImg" src="images/IconImages/mathSimple.jpeg" alt="math symbols clip art"></div>
                            <div><img class="slickImg" src="images/IconImages/multiFlower.jpeg" alt="flowers clip art"></div>
                            <div><img class="slickImg" src="images/IconImages/musicSymbol.jpeg" alt="music symbols clip art"></div>
                            <div><img class="slickImg" src="images/IconImages/science.jpeg" alt="science clip art"></div>
                        </div>
                        <input type="hidden" id="profilePic" value="none"> 
                    </div>
                    <div class="form-group button-group">
                        <div>
                            <button type="submit" class="btn btn-secondary">Sign up</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="js/sign_up_validation.js"></script>
    


    <?php include "footer.php"; ?>

