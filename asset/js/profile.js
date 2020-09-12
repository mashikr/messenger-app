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
            console.log(response);
           if (response == 'invalid') {
            $('.update-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><strong>Failed!</strong> Invalid file</div>');
           } else if (response == 'wrong') {
            $('.update-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><strong>Failed!</strong> Upload failed</div>');
           }
           response = JSON.parse(response);
           if (response.status == 1) {
            $('.user-image').attr('src', 'asset/img/' + response.image);
            $('.custom-file-label').html('Choose file');
            $('.custom-file-input').val('');
           } else {
            $('.update-msg').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><strong>Failed!</strong> Something went wrong</div>');
           }

           $('.alert-dismissable').fadeOut(5000);
        }
    });

    //// search user //////

    $('#search-box').keyup(function() {
        var key = $(this).val().trim();
        if (key == '') {
            $('.search-result').slideUp().html('');
        } else { 
            (async function search() {
                var response = await $.post('ajax/search.php',{ key: key });
                if (response == 'false') {
                    $('.search-result').slideUp().html('');
                } else {
                    response = JSON.parse(response);
                    $('.search-result').slideDown().html('');
                    response.forEach(user => {
                        var markup = `
                        <a href="profile?id=${user.id}" class="result d-flex align-items-center btn btn-light rounded p-1 mt-1 pointer" data-id = ${user.id}>
                        <div class="search-img-overlay mr-2"><img class="search-img" src="asset/img/${user.image ? user.image : 'user.png'}" alt="${user.name}"></div><small class="search-name">${user.name}</small>
                        </a>
                        `;
                        $('.search-result').append(markup);
                   });
                }
            })()
            
        }
    });

    ////// send text message /////

    $('#text-msg').keyup(function(e) {
        if (e.keyCode == 13) {
            var msg = $(this).val().trim();
            const params = new URLSearchParams(window.location.search);
            var receiver = params.get('id');
            if (msg != '') {
                $.post('ajax/sendMessage.php',{ msg: msg, receiver: receiver}, function(response) {

                    if (response == 1) {
                        $('#text-msg').val('');
                        sendMessages();
                    }
                });
            }

            
        }
    });

    function sendMessages() {
        const params = new URLSearchParams(window.location.search);
        var receiver = params.get('id');

        if (receiver) {
            $.post('ajax/fetchMessages.php',{ rec: receiver }, function(response) {
                if (response) {
                    $('#msg-body').html('').html(response); 
                    msgAnimate();  
                }             
            });
        }
    }

    ////// send image /////////
    var image_reg = /(?=.*\d+)([^?]*)/;
    $('#send-image').change(async function() {
        var response = await $.ajax({
            type: 'POST',
            url: 'ajax/sendMessage.php',
            data: new FormData ($('#image-form')[0]),
            contentType: false,
            processData: false
        });
        if (response == 1){
            sendMessages();
        } else if (response == 'invalid') {
            $('#msg-msg').append('<div class="alert alert-danger alert-dismissable msg-div"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><strong>Failed!</strong> This is not an image file.</div>');
            $('#msg-msg .alert-dismissable').fadeOut(5000);
        } else if (image_reg.test(response)) {
            $('#msg-msg').append('<div class="alert alert-danger alert-dismissable msg-div"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><strong>Failed!</strong> File size limit exceed.</div>');
            $('#msg-msg .alert-dismissable').fadeOut(5000);
        } else {
            $('#msg-msg').append('<div class="alert alert-danger alert-dismissable msg-div"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><strong>Failed!</strong> Connection failed.</div>');
            $('#msg-msg .alert-dismissable').fadeOut(5000);
        }
        $('#send-image').val('');
    });

    ////// send file /////////
    $('#send-file').change(async function() {
        var response = await $.ajax({
            type: 'POST',
            url: 'ajax/sendMessage.php',
            data: new FormData ($('#file-form')[0]),
            contentType: false,
            processData: false
        });

        if (response == 1){
            sendMessages();
        } else if (response == 'invalid') {
            $('#msg-msg').append('<div class="alert alert-danger alert-dismissable msg-div"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><strong>Failed!</strong> Invalid file.</div>');
            $('#msg-msg .alert-dismissable').fadeOut(5000);
        } else if (image_reg.test(response)) {
            $('#msg-msg').append('<div class="alert alert-danger alert-dismissable msg-div"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><strong>Failed!</strong> File size limit exceed.</div>');
            $('#msg-msg .alert-dismissable').fadeOut(5000);
        } else {
            $('#msg-msg').append('<div class="alert alert-danger alert-dismissable msg-div"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><strong>Failed!</strong> Connection failed.</div>');
            $('#msg-msg .alert-dismissable').fadeOut(5000);
        }
        $('#send-file').val('');
    });

    ////// send emoji ///////
    $('.emojis .emoji').click(function() {
        const params = new URLSearchParams(window.location.search);
        var receiver = params.get('id');

        if (receiver) {
            $.post('ajax/sendMessage.php',{ emoji: $(this).attr('src'), receiver: receiver }, function(response) {
                if (response == 1) {
                    sendMessages();  
                } else {
                    $('#msg-msg').append('<div class="alert alert-danger alert-dismissable msg-div"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button><strong>Failed!</strong> Connection failed.</div>');
                    $('#msg-msg .alert-dismissable').fadeOut(5000);
                }             
            });
        }
    });



    ///// refreash message body /////////

    setInterval(fetchMessages, 3000);

    function fetchMessages() {
        const params = new URLSearchParams(window.location.search);
        var receiver = params.get('id');

        if (receiver) {
            $.post('ajax/fetchMessages.php',{ receiver: receiver }, function(response) {
                if (response) {
                    $('#msg-body').html('').html(response);  
                    msgAnimate(); 
                }             
            });
        }
    };

    ///// refreash chat holder body /////////

    setInterval(fetchChats, 3000);

    function fetchChats() {
        const params = new URLSearchParams(window.location.search);
        var receiver = params.get('id');
        $.post('ajax/fetchMessages.php',{ chat: receiver }, function(response) {
            if (response) {
                $('.chat-holder').html('').html(response);
            }             
        });
    }

    ///// animate chat body ///////
    function msgAnimate() {
        $('#msg-body').animate({scrollTop: $('#msg-body')[0].scrollHeight});
    }
    msgAnimate();

    //////// view chat image /////////
    $('.chat-img').click(function() {
        $('#imageModal').modal('show');
        $('#modalImage').attr('src', $(this).attr('src'));
    });

});