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