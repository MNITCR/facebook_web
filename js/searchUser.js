$(document).ready(function() {
    // Variable to store the selected user details
    var selectedUser = {};
    var userData;

    // Add click event for the "Search" button
    $('#searchUser').click(function(e) {
        e.preventDefault();
        var searchQuery = $('#userSearch').val();

        if(searchQuery === '') {
            $('#staticBackdrop').modal('hide');
            alert('Please input your data');
        } else {
            // Make an AJAX request to fetch user data
            $.ajax({
                url: '../../php/search_users.php',
                type: 'POST',
                data: { searchQuery: searchQuery },
                success: function(response) {
                    userData = JSON.parse(response); // Assign to the userData variable
                    var userResultsContainer = $('#userResults');
                    userResultsContainer.empty();

                    if (userData && userData.length > 0) {
                        $('#staticBackdrop').modal('show');
                        userData.forEach(function(user) {
                            var userEntry = `
                                <div class="d-flex mb-3 align-items-center" style="width: 100%;">
                                    <img src="../userImg/logoUser.png" alt="logoUser" style="width: 50px;">
                                    <div class="d-flex justify-content-between align-items-center" style="width: 100%;">
                                        <div class="d-flex flex-column ms-3">
                                            <span>${user.first_name} ${user.surname}</span>
                                            <span style="font-size: 14px;">Facebook user</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <button type="button" class="btn btn-secondary view-user" data-id="${user.user_id}">This is my account</button>
                                        </div>
                                    </div>
                                </div>
                            `;
                            userResultsContainer.append(userEntry);
                        });
                    } else {
                        $('#staticBackdrop').modal('show');
                        userResultsContainer.html('<p style="text-align: center;width: 100%;">No accounts found.</p>');
                    }
                },
                error: function() {
                    alert('Error fetching user data.');
                }
            });
        }
    });

    // Add click event for the ".view-user" buttons
    $(document).on('click', '.view-user', function() {
        // Get the user details based on the data-id attribute
        var userId = $(this).data('id');
        selectedUser = userData.find(user => user.user_id == userId);

        // Populate the modal with user information
        $('#fullName').text(`${selectedUser.first_name} ${selectedUser.surname}`);
        $('#ToastsInputEmailGetPass').val(selectedUser.password);
        $('#EmailOrPhonenumberUpdatePassword').val(selectedUser.mobileOrEmail);

        // Check if the selectedUser.mobileOrEmail is a phone number
        if (/^\d+$/.test(selectedUser.mobileOrEmail)) {
            // Format the phone number (assuming it's 10 digits)
            var formattedPhone = '********' + selectedUser.mobileOrEmail.slice(-2);
            $('#SendCodeP').text(formattedPhone);
            $('#EnterCodeSecurityP').text(formattedPhone);
            $('#EnterPasswordInput').val(selectedUser.mobileOrEmail);
            $('#ToastsInputEmail').val(selectedUser.mobileOrEmail);
        } else {
            // It's an email, format accordingly
            var emailParts = selectedUser.mobileOrEmail.split('@');
            var formattedEmail = emailParts[0].charAt(0) + '******' + emailParts[0].slice(-1) + '@****.com';
            $('#SendCodeP').text(formattedEmail);
            $('#EnterCodeSecurityP').text(formattedEmail);
            $('#EnterPasswordInput').val(selectedUser.mobileOrEmail);
            $('#ToastsInputEmail').val(selectedUser.mobileOrEmail);
        }

        // Show the modal
        $('#ResetYourPassword').modal('show');
    });

    // Continue button click event
    $('#ContinueResetYourPassword').click(function() {
        // You can use the selectedUser object to perform further actions
        console.log(selectedUser);
        // Add your logic here
    });


    // Continue button click event
    $('#ContinueResetYourPassword').click(function (event) {
        // Prevent the default form submission
        event.preventDefault();

        var selectedRadio = $('input[name=SendCode]:checked').attr('id');

        if (selectedRadio === 'SendCode') {
            // Get the email or phone from the input field
            var emailOrPhone = selectedUser.mobileOrEmail;

            // Check the entered value and send code accordingly
            if (/^[a-zA-Z0-9._-]+@gmail\.com$/.test(emailOrPhone)) {
                // Send code to email using OTPGmail.php
                fetch('../../php/ResetTOPEmail.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'mobileOrEmail=' + encodeURIComponent(emailOrPhone),
                })
                .then(response => {
                    if (response.ok) {
                        return response.text();
                    } else {
                        alert('Failed to send code');
                    }
                })
                .then(responseText => {
                    // Log the received response text
                    // console.log("Received Response Text:", responseText);

                    // Regular expression to extract the OTP code

                    var otpRegex = /\b(\d{6})\b/;

                    // Match the regular expression against the response text
                    var match = otpRegex.exec(responseText);

                    // Log the match to the console
                    // console.log("Match:", match);

                    // Check if there is a match
                    if (match && match[1]) {
                        // Extracted OTP code
                        var otpCode = match[1];
                        // console.log("OTP Code:", otpCode);

                        // Display the OTP code in your UI (replace 'yourElementId' with the actual ID)
                        document.getElementById('OTPFromRestEmail').value = otpCode;

                        // Optionally, store the OTP code in session storage
                        sessionStorage.setItem('OTPFromRestEmail', otpCode);

                        // Show the modal
                        $('#EnterSecurityCode').modal('show');
                    } else {
                        console.log("OTP Code not found in the response text.");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });


            } else if (/^\d{10,12}$/.test(emailOrPhone)) {
                fetch('../../php/ResetTOPPhone.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'mobileOrPhone=' + encodeURIComponent(emailOrPhone),
                })
                .then(response => {
                    if (response.ok) {
                        return response.text();
                    } else {
                        throw new Error('Failed to send code');
                    }
                })
                .then(otpCode => {
                    document.getElementById('OTPFromRestEmail').value = otpCode;
                    sessionStorage.setItem('OTPFromRestEmail', otpCode);
                    $('#EnterSecurityCode').modal('show');
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }

        } else if (selectedRadio === 'EnterPassword') {
            // Redirect to index.php
            window.location.href = '../../index.php';
        }
    });


    // Continue button click event
    $('#DidNotGetACode').click(function (event) {
        // Prevent the default form submission
        event.preventDefault();

        // Get the email or phone from the input field
        var emailOrPhone = selectedUser.mobileOrEmail;

        // Check the entered value and send code accordingly
        if (/^[a-zA-Z0-9._-]+@gmail\.com$/.test(emailOrPhone)) {
            // Send code to email using OTPGmail.php
            fetch('../../php/ResetTOPEmail.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'mobileOrEmail=' + encodeURIComponent(emailOrPhone),
            })
            .then(response => {
                if (response.ok) {
                    return response.text();
                } else {
                    alert('Failed to send code');
                }
            })
            .then(responseText => {
                // Log the received response text
                console.log("Received Response Text:", responseText);

                // Regular expression to extract the OTP code

                var otpRegex = /\b(\d{6})\b/;

                // Match the regular expression against the response text
                var match = otpRegex.exec(responseText);

                // Log the match to the console
                // console.log("Match:", match);

                // Check if there is a match
                if (match && match[1]) {
                    // Extracted OTP code
                    var otpCode = match[1];
                    // console.log("OTP Code:", otpCode);

                    // Display the OTP code in your UI (replace 'yourElementId' with the actual ID)
                    document.getElementById('OTPFromRestEmail').value = otpCode;

                    // Optionally, store the OTP code in session storage
                    sessionStorage.setItem('OTPFromRestEmail', otpCode);

                    // Show the modal
                    $('#EnterSecurityCode').modal('show');
                } else {
                    console.log("OTP Code not found in the response text.");
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

        } else if (/^\d{10,12}$/.test(emailOrPhone)) {
            // Send code to phone using OTPPhone.php
            fetch('../../php/ResetTOPPhone.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'mobileOrPhone=' + encodeURIComponent(emailOrPhone),
            })
            .then(response => {
                if (response.ok) {
                    return response.text();
                } else {
                    alert('Failed to send code');
                }
            })
            .then(responseText => {
                // Log the received response text
                // console.log("Received Response Text:", responseText);

                // Regular expression to extract the OTP code

                var otpRegex = /\b(\d{6})\b/;

                // Match the regular expression against the response text
                var match = otpRegex.exec(responseText);

                // Log the match to the console
                // console.log("Match:", match);

                // Check if there is a match
                if (match && match[1]) {
                    // Extracted OTP code
                    var otpCode = match[1];
                    // console.log("OTP Code:", otpCode);

                    // Display the OTP code in your UI (replace 'yourElementId' with the actual ID)
                    document.getElementById('OTPFromRestEmail').value = otpCode;

                    // Optionally, store the OTP code in session storage
                    sessionStorage.setItem('OTPFromRestEmail', otpCode);

                    // Show the modal
                    $('#EnterSecurityCode').modal('show');
                } else {
                    console.log("OTP Code not found in the response text.");
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    });


    // ToastsButtonLogin
    $('#ToastsButtonLogin').click(function (event) {
        event.preventDefault();
        var ToastsInputEmail = $('#ToastsInputEmail').val();
        var EnterPasswordInput = $('#EnterPasswordInput').val();
        var ToastsInputEmailGetPass = $('#ToastsInputEmailGetPass').val();
        var ToastsInputPassword = $('#ToastsInputPassword').val();

        // console.log(ToastsInputEmail + ' ' + EnterPasswordInput + ' ' + ToastsInputEmailGetPass + ' ' + ToastsInputPassword);
        if(ToastsInputPassword.trim() == '') {
            alert('Please enter a password');
            return;
        }
        else if(ToastsInputEmail == EnterPasswordInput && ToastsInputEmailGetPass == ToastsInputPassword){
            alert('Login successfully!');
            window.location.href = '../home/home.php';
        }else{
            alert('Passwords incorrect!');
            return;
        }
    });



    // ContinueEnterSecurityCode
    $('#ContinueEnterSecurityCode').click(function (event) {
        event.preventDefault();
        var OTPFromRestEmail = $('#OTPFromRestEmail').val();
        var EnterCodeSecurity = $('#EnterCodeSecurity').val();

        // console.log(OTPFromRestEmail + ' ' + EnterCodeSecurity);
        if(EnterCodeSecurity.trim() == '') {
            alert('Please enter a code');
            return;
        }
        else if(OTPFromRestEmail == EnterCodeSecurity){
            $('#UpdatePasswordModal').modal('show');
            $('#EnterSecurityCode').modal('hide');
            $('#ResetYourPassword').modal('hide');
        }else{
            alert('Your code is incorrect!!!!');
            $('#EnterCodeSecurity').val('');
            return;
        }
    });
});
