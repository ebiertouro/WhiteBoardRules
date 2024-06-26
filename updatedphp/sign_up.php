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
                        <label for="subject">Subject</label>
                        <select name="subject" class="subject form-select" id="subject" s>
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
                            <div class="radio form-check">
                                    <input type="radio" name="age" value="other" id="ageOther" /> 
                                    <label for="Other">Other</label>
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

    <script>
        $(document).ready(function () {
            $('#registrationForm').bootstrapValidator({
                // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    username: {
                        message: 'The username is not valid',
                        validators: {
                            notEmpty: {
                                message: 'The username is required and cannot be empty'
                            },
                            stringLength: {
                                min: 6,
                                max: 30,
                                message: 'The username must be more than 6 and less than 30 characters long'
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9]+$/,
                                message: 'The username can only consist of alphabetical and number'
                            },
                            different: {
                                field: 'password',
                                message: 'The username and password cannot be the same as each other'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'The email address is required and cannot be empty'
                            },
                            emailAddress: {
                                message: 'The email address is not a valid'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'The password is required and cannot be empty'
                            },
                            different: {
                                field: 'username',
                                message: 'The password cannot be the same as username'
                            },
                            stringLength: {
                                min: 8,
                                message: 'The password must have at least 8 characters'
                            }
                        }
                    },
                    ConfirmPassword: {
                        validators: {
                            notEmpty: {
                                message: 'The password is required and cannot be empty'
                            },
                            identical: {
                                field: 'password',
                                message: 'The passwords must match'
                            }
                        }
                    },
                    SchoolName: {
                        validators: {
                            notEmpty: {
                                message: 'The School Name is required and cannot be empty'
                            }
                        }
                    },
                    age: {
                        validators: {
                            notEmpty: {
                                message: 'The age is required'
                            }
                        }
                    }
                }
            });
        });

        $(document).ready(function(){
            $('.profile-pic-div').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: true,
                focusOnSelect: true,
                arrows:true,
                dots:true,
                centerMode: true
            });

            $(".slickImg").click(function(){
                $(".slickImg").css("border","1px solid grey");
                $(this).css("border","2px dashed gray");
                $("#profilePic").val($(this).attr('src'));
            });
        });
    </script>


    <?php include "footer.php"; ?>

