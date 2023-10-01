$(document).ready(function() {
    $('a#NotYou').click(function() {
        $('#staticBackdrop').modal('show');
        $('#ResetYourPassword').modal('hide');
    });

    $('a#NotYou').click(function() {
        $('.toast').toast('hide');
        $('#staticBackdrop').modal('hide');
    });

    $('#CancelEnterSecurityCode').click(function() {
        $('#EnterSecurityCode').modal('hide');
    });


    $('#EnterResetYourPassword').click(function() {
        // Show the Bootstrap toast
        $('.toast').toast('show');
        $('#ResetYourPassword').modal('hide');
    });



});
