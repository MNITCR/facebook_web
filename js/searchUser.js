// $(document).ready(function() {
//     $('#searchUser').click(function() {
//         var searchQuery = $('#userSearch').val();

//         if(searchQuery === '') {
//             $('#staticBackdrop').modal('hide');
//             alert('Pleas input your data');
//         }else{
//             // Make an AJAX request to fetch user data
//             $.ajax({
//                 url: '../../php/search_users.php', // Replace with the actual URL to fetch user data
//                 type: 'POST',
//                 data: { searchQuery: searchQuery },
//                 success: function(response) {
//                     // Parse the response JSON (assuming it's JSON data)
//                     var userData = JSON.parse(response);
//                     console.log(userData);
//                     // Update the modal content with the user data
//                     var userResultsContainer = $('#userResults');
//                     userResultsContainer.empty();

//                     if (userData && userData.length > 0) {
//                         $('#staticBackdrop').modal('show');
//                         userData.forEach(function(user) {
//                             var userEntry = `
//                                 <div class="d-flex mb-3 align-items-center" style="width: 100%;">
//                                     <img src="../userImg/logoUser.png" alt="logoUser" style="width: 50px;">
//                                     <div class="d-flex justify-content-between align-items-center" style="width: 100%;">
//                                         <div class="d-flex flex-column ms-3">
//                                             <span>${user.first_name} ${user.surname}</span>
//                                             <span style="font-size: 14px;">Facebook user</span>
//                                         </div>
//                                         <div class="d-flex align-items-center justify-content-center">
//                                             <button type="button" class="btn btn-secondary" id="${user.id_user}">This is my account</button>
//                                         </div>
//                                     </div>
//                                 </div>
//                             `;
//                             userResultsContainer.append(userEntry);
//                         });
//                     } else {
//                         $('#staticBackdrop').modal('show');
//                         userResultsContainer.html('<p style="text-align: center;width: 100%;">No accounts found.</p>');
//                     }
//                 },
//                 error: function() {
//                     alert('Error fetching user data.');
//                 }
//             });
//         }
//     });
// });



$(document).ready(function() {
    // Variable to store the selected user details
    var selectedUser = {};

    // Add click event for the "Search" button
    $('#searchUser').click(function() {
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
                    var userData = JSON.parse(response);
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
                                            <button type="button" class="btn btn-secondary view-user" data-id="${user.id_user}">This is my account</button>
                                        </div>
                                    </div>
                                </div>
                            `;
                            userResultsContainer.append(userEntry);
                        });
                        // Add click event for the ".view-user" buttons
                        $(document).on('click', '.view-user', function() {
                            // Get the user details based on the data-id attribute
                            var userId = $(this).data('id');
                            selectedUser = userData.find(user => user.id_user == userId);

                            // Populate the modal with user information
                            $('#fullName').text(`${selectedUser.first_name} ${selectedUser.surname}`);
                            // $('#SendCodeP').text(selectedUser.mobileOrEmail);

                            // Check if the selectedUser.mobileOrEmail is a phone number
                            if (/^\d+$/.test(selectedUser.mobileOrEmail)) {
                                // Format the phone number (assuming it's 10 digits)
                                var formattedPhone = '********' + selectedUser.mobileOrEmail.slice(-2);
                                $('#SendCodeP').text(formattedPhone);
                            } else {
                                // It's an email, format accordingly
                                var emailParts = selectedUser.mobileOrEmail.split('@');
                                var formattedEmail = emailParts[0].charAt(0) + '******' + emailParts[0].slice(-1) + '@****.com';
                                $('#SendCodeP').text(formattedEmail);
                            }

                            // Show the modal
                            $('#ResetYourPassword').modal('show');
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

    // Continue button click event
    $('#ContinueResetYourPassword').click(function() {
        // You can use the selectedUser object to perform further actions
        console.log(selectedUser);
        // Add your logic here
    });
});

