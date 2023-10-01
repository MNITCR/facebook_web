
$(document).ready(function () {
    $('#test').click(function (e) {
        e.preventDefault();

        $.ajax({
            type: 'GET',
            url: '../../php/test.php',
            data: $(this).serialize(),
            success: function (response) {
                if (response.status === 'success') {
                    console.log(response.message);
                    // Display the OTP using response.otp if needed
                } else {
                    console.log(response.message);
                }
            },
            error: function () {
                alert('An error occurred while processing your request.');
            }
        });
    });
});
