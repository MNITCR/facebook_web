// Handle the "Sent SMS Again" button click event
document.getElementById('sentAgain').addEventListener('click', function() {
    // Trigger the PHP script to send a new OTP via the Telegram bot
    // You can use AJAX or fetch to call the PHP script here
    // Example using fetch:
    fetch('send_sms_otp.php')
        .then(response => {
            if (response.ok) {
                alert('SMS sent successfully');
            } else {
                alert('Failed to send SMS');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
});

// Handle the "Continue" button click event
document.getElementById('Continue').addEventListener('click', function() {
    var enteredOTP = document.getElementById('verify_code').value;

    // Validate the OTP entered by the user
    // You can compare it with the OTP generated in your PHP script
    // If it matches, proceed with the verification process
    // Otherwise, show an error message
});
