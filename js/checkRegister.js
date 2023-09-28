$(document).ready(function() {
    // Add an event listener to the input element first_name
    var first_name = document.getElementById('first_name');
    first_name.addEventListener('input', function() {
        validateFirst_name(this);
    });
    // Function to validate the "emailOrPhone" input
    function validateFirst_name(input){
        var firstName = input.value;

        console.log(firstName);
        // Check if the input is empty
        if (firstName.trim() === '') {
            input.classList.remove('is-valid', 'is-invalid');
            return;
        }

        var namePattern = /^[A-Z][a-z]*$/;

        if (firstName.length >= 2 && namePattern.test(firstName)) {
            input.classList.add('is-valid');
            input.classList.remove('is-invalid');
        } else {
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
        }
    }


    // Add an event listener to the input element surname
    var Sur_name = document.getElementById('surname');
    Sur_name.addEventListener('input', function() {
        validateSur_name(this);
    });
    // Function to validate the "emailOrPhone" input
    function validateSur_name(input){
        var firstName = input.value;
        // Check if the input is empty
        if (firstName.trim() === '') {
            input.classList.remove('is-valid', 'is-invalid');
            return;
        }

        var namePattern = /^[A-Z][a-z]*$/;

        if (firstName.length >= 2 && namePattern.test(firstName)) {
            input.classList.add('is-valid');
            input.classList.remove('is-invalid');
        } else {
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
        }
    }


    // Add an event listener to the input element emailOrPhone
    var mobileOrEmail_register = document.getElementById('mobileOrEmail_register');
    mobileOrEmail_register.addEventListener('input', function() {
        validateMobileOrEmail_register(this);
    });

    // Function to validate the "mobileOrEmail_register" input
    function validateMobileOrEmail_register(input) {
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
    var PasswordInputRegister = document.getElementById('password_register');
    PasswordInputRegister.addEventListener('input', function() {
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
    document.getElementById('togglePasswordRegister').addEventListener('click', function() {
        const passwordInputRegister = document.getElementById('password_register');
        const eyeIconRegister = this.querySelector('i');

        if (passwordInputRegister.type === 'password') {
            passwordInputRegister.type = 'text';
            eyeIconRegister.classList.remove('fa-eye-slash');
            eyeIconRegister.classList.add('fa-eye');
        } else {
            passwordInputRegister.type = 'password';
            eyeIconRegister.classList.remove('fa-eye');
            eyeIconRegister.classList.add('fa-eye-slash');
        }
    });


    // Form submission handler
    document.getElementById('sing_upBtn').addEventListener('click', function (e) {
        // Perform client-side validation before submitting the form
        var first_name = document.getElementById('first_name');
        var Sur_name = document.getElementById('surname');
        var emailOrPhoneCheckRegister = document.getElementById('mobileOrEmail_register');
        var PasswordCheckRegister = document.getElementById('password_register');

        // check age lass than 15 years old
        var year = document.getElementById('year').value;
        var currentYear = new Date().getFullYear(); // Get the current year

        user_year = parseInt(year);
        age = currentYear - user_year;

        if (age < 15) {
            swal({
                text: "Sorry, you must be at least 15 years old to create an account.",
                icon: "warning",
            });
            e.preventDefault(); // Prevent form submission
        }
        // console.log(age);


        // Check if any of the input fields are empty
        if (
            first_name.value.trim() === '' ||
            Sur_name.value.trim() === '' ||
            emailOrPhoneCheckRegister.value.trim() === '' ||
            PasswordCheckRegister.value.trim() === ''
        ) {
            swal({
                text: "Please fill in all required fields.",
                icon: "warning",
            });
            e.preventDefault(); // Prevent form submission
            return;
        }

        validateFirst_name(first_name);
        validateSur_name(Sur_name);
        validateMobileOrEmail_register(emailOrPhoneCheckRegister);
        validatePassword(PasswordCheckRegister);

        // Check if the gender is selected
        var genderRadios = document.querySelectorAll('[name="gender"]');
        var genderSelected = false;

        genderRadios.forEach(function (radio) {
            if (radio.checked) {
                genderSelected = true;
            }
        });

        if (!genderSelected) {
            swal({
                text: "Please select a gender.",
                icon: "warning",
            });
            e.preventDefault(); // Prevent form submission
        }

        if (
            PasswordCheckRegister.classList.contains('is-invalid') ||
            emailOrPhoneCheckRegister.classList.contains('is-invalid') ||
            first_name.classList.contains('is-invalid') ||
            Sur_name.classList.contains('is-invalid')
        ) {
            // Prevent form submission if validation fails
            alert('Validation failed. Please check your inputs.');
            e.preventDefault();
        } else {
            $('#verifyCodeModal').modal('show');
            $('#signup').modal('hide');
            e.preventDefault();
            // console.log('Verify Code');
            // alert('Validation successful. Form will be submitted.');
        }
    });

    document.getElementById('showModalSignup').addEventListener('click', function(){
        $('#verifyCodeModal').modal('hide');
        $('#signup').modal('show');
    });
});
