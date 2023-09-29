var ContinueBtn = document.getElementById('Continue');
var InputEmail = document.getElementById('mobileOrEmail_register');
var verify_code = document.getElementById('verify_code');

// Check if input is null or empty
var inputCode = verify_code.value;
if (inputCode === "") {
    ContinueBtn.disabled = true; // Disable the button
} else {
    ContinueBtn.disabled = false; // Enable the button
}
verify_code.addEventListener('input', function() {
    var input = verify_code.value;

    if (input.trim() === "") {
        ContinueBtn.disabled = true; // Disable the button
    } else {
        ContinueBtn.disabled = false; // Enable the button
    }
});

// Handle the "Sent SMS Again" button click event
document.getElementById('sentAgain').addEventListener('click', function() {
    var inputValue = InputEmail.value;

    if (/^[a-zA-Z0-9._-]+@gmail\.com$/.test(inputValue)) {
        fetch('php/OTPGmail.php')
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

    } else if (/^\d{10,12}$/.test(inputValue)) {
        fetch('php/OTPPhone.php')
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
    } else {
        alert('Invalid input. Please enter a valid email or phone number.');
    }
});

// Handle the "Continue" button click event
document.getElementById('Continue').addEventListener('click', function() {
    var enteredOTP = document.getElementById('verify_code').value;

    // Validate the OTP entered by the user
    // You can compare it with the OTP generated in your PHP script
    // If it matches, proceed with the verification process
    // Otherwise, show an error message
});

