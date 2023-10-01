//======================ContinueEnterSecurityCode======================
$(document).ready(function() {
    // Create new password
    var newPasswordInput = $('#newPassword');
    var specialCharacterDiv1 = $('#CheckSpecialCharacter1');

    newPasswordInput.on('input', function() {
      validatePassword(newPasswordInput, specialCharacterDiv1);
    });

    // Toggle password visibility
    // $('#togglePasswordRegister1').click(function() {
    //   togglePasswordVisibility(newPasswordInput);
    // });

    // Confirm password
    var ConfirmNewPassword = $('#ConfirmNewPassword');
    var specialCharacterDiv2 = $('#CheckSpecialCharacter2');

    ConfirmNewPassword.on('input', function() {
      validatePassword(ConfirmNewPassword, specialCharacterDiv2);
    });

    // Toggle confirm password visibility
    // $('#togglePasswordRegister2').click(function() {
    //   togglePasswordVisibility(ConfirmNewPassword);
    // });

    // Update Password Submit
    $('#UpdatePasswordSubmit').click(function(e) {
      var newPassword1 = newPasswordInput.val();
      var confirmNewPassword1 = ConfirmNewPassword.val();

      // Validate passwords
      validatePassword(newPasswordInput, specialCharacterDiv1);
      validatePassword(ConfirmNewPassword, specialCharacterDiv2);

      // Check if passwords match
      if (newPassword1 !== confirmNewPassword1) {
        alert('Passwords do not match');
        e.preventDefault();
      }else if(newPassword1 == "" || confirmNewPassword1 == ""){
        alert('Passwords input a password');
        e.preventDefault();
      }
      // Check for invalid inputs
      else if (newPasswordInput.hasClass('is-invalid') || ConfirmNewPassword.hasClass('is-invalid')) {
        alert('Validation failed. Please check your inputs.');
        e.preventDefault();
      } else {
        // alert('Validation successful. Form will be submitted.');
      }
    });

    // Function to validate the "Password" input
    function validatePassword(input, specialCharacterDiv) {
      var password = input.val();

      // Check if the input is empty
      if (password.trim() === '') {
        input.removeClass('is-valid is-invalid');
        specialCharacterDiv.text('');
        return;
      }

      var specialCharacterRegex = /[!@#$%^&*()_+|'`:<>\?/\\]/;
      var specialCharacterCount = 0;

      for (var i = 0; i < password.length; i++) {
        if (specialCharacterRegex.test(password[i])) {
          specialCharacterCount++;
        }
      }

      if (password.length > 6 && specialCharacterCount > 2) {
        input.addClass('is-valid');
        input.removeClass('is-invalid');
        specialCharacterDiv.text('High Password');
        specialCharacterDiv.removeClass('text-danger text-primary');
        specialCharacterDiv.addClass('text-success');
      } else if (password.length > 6 && specialCharacterCount === 2) {
        input.addClass('is-valid');
        input.removeClass('is-invalid');
        specialCharacterDiv.text('Medium Password');
        specialCharacterDiv.removeClass('text-success text-danger');
        specialCharacterDiv.addClass('text-primary');
      } else {
        input.removeClass('is-valid');
        input.addClass('is-invalid');
        specialCharacterDiv.text('Low Password');
        specialCharacterDiv.removeClass('text-success');
        specialCharacterDiv.addClass('text-danger');
      }
    }

    // Function to toggle password visibility
    // function togglePasswordVisibility(input) {
    //   const eyeIcon = input.next('button').find('i');

    //   if (input.prop('type') === 'password') {
    //     input.prop('type', 'text');
    //     eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
    //   } else {
    //     input.prop('type', 'password');
    //     eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
    //   }
    // }
  });
