$(document).ready(function() {
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
});