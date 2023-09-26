<?php
    // connect to database
    include 'php/conn.php';
    $alertMessage = ''; // Initialize an empty alert message

    // Define variables to store user input
    $emailOrPhone = "";
    $password = "";

    // Define a variable to store error messages
    $error = "";

    if (isset($_POST['login'])) {
        // Get user input from the form
        $emailOrPhone = $_POST['emailOrPhone'];
        $password = $_POST['password'];

        // Query to check if the user exists in the database
        $query = "SELECT mobileOrEmail,password FROM user_table WHERE mobileOrEmail = '$emailOrPhone' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Check if a row was returned (valid login)
            if (mysqli_num_rows($result) == 1) {
                // User is authenticated, you can set a session and redirect to a secure page
                session_start();
                $_SESSION['loggedIn'] = true;
                $_SESSION['emailOrPhone'] = $emailOrPhone;
                $alertMessage = "Login successfully";
                echo '<script>alert("' . $alertMessage . '"); window.location.href = "html/home/home.php";</script>';
                exit;
            } else {
                // Invalid credentials
                $error = "Invalid email/phone or password. Please try again.";
            }
        } else {
            // Database error
            $error = "Database error. Please try again later.";
        }
    }

?>
