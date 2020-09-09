$(document).ready(function() {

    //////// sign up and sign up div toggle ////////
    $('.sign-in').hide();

    $('#toggler').click(function() {
        if ($(this).text() == 'SIGN IN') {
            $('.sign-up').hide();
            $('.sign-in').show('slow');
            $(this).removeClass('signIn').addClass('signUp').text('SIGN UP');
        } else {
            $('.sign-in').hide();
            $('.sign-up').show('slow');
            $(this).removeClass('signUp').addClass('signIn').text('SIGN IN');
        }
    });

    //////// sign up form validation ////////

    var name_reg = /^[a-z A-Z]+$/;
    var email_reg = /^[a-zA-Z0-9_#$&-.!]+@[a-z]+\.[a-z]+$/;
    var password_reg = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])([a-zA-Z0-9_#$&-.!@]+){6,}$/;

    $('#signup-name').focusout(function() {
        var signup_name = $(this).val();
        validateName(signup_name);
     });

    function validateName(name) {
        var name_error;
        if (name == '') {
            name_error = 'Name cann\'t be empty';
        } else if (!name_reg.test(name)) {
            name_error = 'Only alphabet enter please';
        }

        if (name_error) {
            $('.name-error').text(name_error);
            return false;
        } else {
            $('.name-error').text('');
            return true;
        }
    }

    $('#signup-email').focusout(function() {
        var signup_email = $(this).val();
        validateEmail(signup_email);
    });

    async function validateEmail(email) {
        var email_error;
    
        if (email == '') {
            email_error = 'Email cann\'t be empty';
        } else if (!email_reg.test(email)) {
            email_error = 'Enter a valid email';
        } else {
            var data = await $.ajax({
                type: 'POST',
                url: "ajax/signup.php",
                data:  {    'email': email  }
            });
            if (data == 1) {
                email_error = 'This email already taken';
            }
        }


        if (email_error) {
            $('.email-error').text(email_error);
            return false;
        } else {
            $('.email-error').text('');
            return true;
        }
    
    }

    $('#signup-password').focusout(function() {
        var signup_password = $(this).val();
        validatePassword(signup_password);
    });

    function validatePassword(password) {
        var password_error;
        if (password == '') {
            password_error = 'Password cann\'t be empty';
        } else if (password.length < 6) {
            password_error = 'At least 6 character need';
        } else if (!password_reg.test(password)) {
            password_error = 'Need capital, small letter and digit';
        }

        if (password_error) {
            $('.password-error').text(password_error);
            return false;
        } else {
            $('.password-error').text('');
            return true;
        }
    }

    //////// entry user to database ////////

    $('#signup-btn').click(function() {
        var name = $('#signup-name').val().trim();
        var email = $('#signup-email').val().trim();
        var password = $('#signup-password').val().trim();

        validateEmail(email).then(result => {
            (async function login() {
                if (result && validateName(name) && validatePassword(password)) {
                    var response = await $.get("ajax/signup.php?" + $('#signup-form').serialize());
                    if (response == 1) {
                        $('.part-2').append('<div class="alert alert-success alert-dismissable msg-div"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><strong>Success!</strong> Registration complete!</div>');
                        $('#signup-name').val('');
                        $('#signup-email').val('');
                        $('#signup-password').val('');
                    } else {
                        $('.part-2').append('<div class="alert alert-danger alert-dismissable msg-div"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><strong>Failed!</strong> Something went wrong!</div>');
                    }
                    $('.msg-div').fadeOut(5000);
        
                    $('.name-error').text('');
                    $('.email-error').text('');
                    $('.password-error').text('');
                }
            })()
        });
    });

     //////// sign in form ////////

     $('#signin-email').focusout(function() {
        var signin_email = $(this).val();
        emailExist(signin_email);
    });

    async function emailExist(email) {
        var email_error;

        if (email == '') {
            email_error = "Email cann't be empty";
        } else {
            var data = await $.ajax({
                type: 'POST',
                url: "ajax/signin.php",
                data:  {    'email': email  }
            });

            if (data == 0) {
                email_error = "This email isn't exist";
            }
        }
        
        if (email_error) {
            $('.email-err').text(email_error);
            return false;            
        } else {
            $('.email-err').text('');
            return true;
        }
    }

    $('#signin-password').focusout(function() {
        var signin_password = $(this).val();
        checkPassword(signin_password);
    });

    function checkPassword(password) {
        var password_error;
        if (password == '') {
            password_error = 'Password cann\'t be empty';
        } else if (password.length < 6) {
            password_error = 'At least 6 character need';
        } else if (!password_reg.test(password)) {
            password_error = 'Need capital, small letter and digit';
        }

        if (password_error) {
            $('.password-err').text(password_error);
            return false;
        } else {
            $('.password-err').text('');
            return true;
        }
    }


    $('#signin-btn').click(function() {
        var email = $('#signin-email').val().trim();
        var password = $('#signin-password').val().trim();

        emailExist(email).then(result =>{
            
            if (result && checkPassword(password)) {
                (async function login() {
                    var response = await $.get("ajax/signin.php?" + $('#signin-form').serialize());
                    if (response == 1) {
                        window.location = window.location.href + 'profile';
                    } else {
                        $('.password-err').text('Password wrong!');
                    }
                })()
               }
        
        });
    });


});