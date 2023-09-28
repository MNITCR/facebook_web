$(document).ready(function() {
    $('#searchUser').click(function() {
        var searchQuery = $('#userSearch').val();

        if(searchQuery === '') {
            $('#staticBackdrop').modal('hide');
            alert('Pleas input your data');
        }else{
            // Make an AJAX request to fetch user data
            $.ajax({
                url: '../../php/search_users.php', // Replace with the actual URL to fetch user data
                type: 'POST',
                data: { searchQuery: searchQuery },
                success: function(response) {
                    // Parse the response JSON (assuming it's JSON data)
                    var userData = JSON.parse(response);
                    console.log(userData);
                    // Update the modal content with the user data
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
                                            <button type="button" class="btn btn-secondary">This is my account</button>
                                        </div>
                                    </div>
                                </div>
                            `;
                            // var userImage = $('<img src="../userImg/logoUser.png" alt="logoUser" style="width: 50px;">');
                            // var userDiv = $('<div class="d-flex justify-content-between align-items-center" style="width: 100%;">');
                            // // var userImage = $('<img src="' + user.profile_image + '" alt="User" style="width: 50px;">');
                            // var userInfo = $('<div class="d-flex flex-column ms-3"><span>' + user.first_name + ' ' + user.surname + '</span><span style="font-size: 14px;">Facebook user</span></div>');
                            // var userButton = $('<div><button type="button" class="btn btn-secondary">This is my account</button></div>');

                            // userDiv.append(userImage, userInfo, userButton);
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
});
