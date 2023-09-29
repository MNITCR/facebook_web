$(document).ready(function() {
    $('a#NotYou').click(function() {
        $('#staticBackdrop').modal('show');
        $('#ResetYourPassword').modal('hide');
    });

    $('#EnterResetYourPassword').click(function() {
        // Show the Bootstrap toast
        $('.toast').toast('show');
        $('#ResetYourPassword').modal('hide');
    });
});
