$(document).ready(function() {
    $('.navbar-toggler').click(function() {
        $('#sidebar').animate({left: '0'});
    });
    $('.close').click(function(){
        $('#sidebar').animate({left: '-50%'});
    });

    $('.custom-file-input').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });

    //////// edit name and password ///////
    var name_reg = /^[a-z A-Z]+$/;
    var password_reg = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])([a-zA-Z0-9_#$&-.!@]+){6,}$/;

    $('#edit-name').click(async function() {
        var name = $('#input-name').val().trim();
       if (validateName(name)) {
        var response = await $.post('ajax/updateprofile.php', { name:  name});
        if (response == 1) {
            $('.user-name').text(name);
            $('#input-name').val('');
            $('#collapseName').collapse('hide');
        } else {
            $('.name-error').text('Connection error!');
        }
       }
    });

    $('#input-name').focus(function() {
        $('.name-error').text('');
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

    $('#edit-pass').click(async function() {
        var password = $('#current-pass').val().trim();
        var new_password = $('#new-pass').val().trim();
        if (validatePassword(password) && validateNewPassword(new_password)) {
            var response = await $.post('ajax/updateprofile.php', { password:  password, new_password: new_password});
            if (response == 1) {
                $('.update-msg').html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><strong>Success!</strong> Password changes</div>');
                $('.alert-dismissable').fadeOut(5000);
                $('#collapsePassword').collapse('hide');
                $('#current-pass').val('');
                $('#new-pass').val('');
            } else if (response == 'invalid') {
                $('.pass-error').text('Cuurent password wrong!');
            } else {
                $('.new-pass-error').text('Something went wrong');
            }
        }
    });

    $('#current-pass').focus(function() {
        $('.pass-error').text('');
    });
    $('#new-pass').focus(function() {
        $('.new-pass-error').text('');
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
            $('.pass-error').text(password_error);
            return false;
        } else {
            $('.pass-error').text('');
            return true;
        }
    }

    function validateNewPassword(password) {
        var password_error;
        if (password == '') {
            password_error = 'Password cann\'t be empty';
        } else if (password.length < 6) {
            password_error = 'At least 6 character need';
        } else if (!password_reg.test(password)) {
            password_error = 'Need capital, small letter and digit';
        }

        if (password_error) {
            $('.new-pass-error').text(password_error);
            return false;
        } else {
            $('.new-pass-error').text('');
            return true;
        }
    }

    //// update image ////

    $('#Upload').click(async function() {
        if ($('.custom-file-input').val() != '') {
            var response = await $.ajax({
                type: 'POST',
                url: 'ajax/updateprofile.php',
                data: new FormData ($('#user-image')[0]),
                contentType: false,
                processData: false
            });
            
           if (response == 'invalid') {
            $('.update-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><strong>Failed!</strong> Invalid file</div>');
           } else if (response == 'wrong') {
            $('.update-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><strong>Failed!</strong> Upload failed</div>');
           }
           response = JSON.parse(response);
           if (response.status == 1) {
            $('.user-image').attr('src', 'asset/img/' + response.image);
           } else {
            $('.update-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><strong>Failed!</strong> Something went wrong</div>');
           }

           $('.alert-dismissable').fadeOut(5000);
        }
    });
});