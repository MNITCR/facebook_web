$(document).ready(function() {
    // Add an event listener to the input element emailOrPhone
    var emailOrPhone = document.getElementById('emailOrPhone');
    emailOrPhone.addEventListener('input', function() {
        validateEmailOrPhone(this);
    });


    // Function to validate the "Password" input
    function validateEmailOrPhone(input) {
        var ERP = input.value;

        // Check if the input is empty
        if (ERP.trim() === '') {
            input.classList.remove('is-valid', 'is-invalid');
            return;
        }

        // Remove any spaces and non-numeric characters from the input
        var numericValue = ERP.replace(/\D/g, '');
        var phoneRegex = /^[0-9]+$/;
        console.log(numericValue.length);
        if (numericValue.length >= 10 && numericValue.length <= 12 && phoneRegex.test(input.value)) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
        } else if (ERP.includes('@gmail.com')) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
        } else {
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
        }
    }


    // Add an event listener to the input element password
    var PasswordInput = document.getElementById('PasswordLogin');
    PasswordInput.addEventListener('input', function() {
        validatePassword(this);
    });


    // Function to validate the "Password" input
    function validatePassword(input) {
        var password = input.value;

        // Check if the input is empty
        if (password.trim() === '') {
            input.classList.remove('is-valid', 'is-invalid');
            return;
        }

        var specialCharacterRegex = /[!@#$%^&*()_+|'`:<>\?/\\]/;

        if (password.length > 6 && specialCharacterRegex.test(password)) {
            input.classList.add('is-valid');
            input.classList.remove('is-invalid');
        } else {
            input.classList.remove('is-valid');
            input.classList.add('is-invalid'); // Apply is-invalid class

        }
    }
    // hide and show password
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('PasswordLogin');
        const eyeIcon = this.querySelector('i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        }
    });


    // Form submission handler
    document.getElementById('loginButton').addEventListener('click', function (e) {
        // Perform client-side validation before submitting the form
        // var verify_OTPCheck = document.getElementById('verify_OTP');
        var emailOrPhoneCheck = document.getElementById('emailOrPhone');
        var PasswordCheck = document.getElementById('PasswordLogin');

        // validateVerifyOTP(verify_OTPCheck);
        validateEmailOrPhone(emailOrPhoneCheck);
        validatePassword(PasswordCheck);

        if (
            PasswordCheck.classList.contains('is-invalid') ||
            emailOrPhoneCheck.classList.contains('is-invalid')
        ) {
            // Prevent form submission if validation fails
            alert('Validation failed. Please check your inputs.');
            e.preventDefault();
        } else {
            // alert('Validation successful. Form will be submitted.');
        }
    });
});
