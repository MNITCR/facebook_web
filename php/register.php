<?php
    include 'php/conn.php';

    // Include the database connection and initialize the alert message
    $alertMessage = '';

    if (isset($_POST['sing_up'])) {
        $mobile = $_POST['mobileOrEmail'];
        $birthday_year = $_POST['birthday_year'];
        $correct_year = date('Y');

        $user_year = intval($birthday_year);
        $age = $correct_year - $user_year;

        if ($age >= 15) {
            // Check if email or phone number already exists in the users table
            $query = "SELECT mobileOrEmail FROM user_table WHERE mobileOrEmail = '$mobile'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 0) {
                if (strpos($mobile, '@gmail.com') !== false) {
                    // Email contains @gmail.com
                    include 'php/OTPGmail.php';
                } else {
                    // Email does not contain @gmail.com (assuming it's a phone number)
                    include 'php/OTPPhone.php';
                }
            } else {
                // Email or phone number already exists
                $alertMessage = "Email or phone number already exists. Please use a different one.";
            }
        } else {
            $alertMessage = "Sorry, you must be at least 15 years old to create an account.";
        }

    }


    // Check if the form is submitted
    if(isset($_POST['Continue'])){
        $fname = $_POST['first_name'];
        $surname = $_POST['surname'];
        $mobile = $_POST['mobileOrEmail'];
        $pass = $_POST['password'];
        $birthday_day = $_POST['birthday_day'];
        $birthday_month = $_POST['birthday_month'];
        $birthday_year = $_POST['birthday_year'];
        $inputOTP = $_POST['verify_code'];
        $gender = $_POST['gender'];

        if (empty($inputOTP)) {
            $alertMessage = 'Please enter your OTP code';
            // Handle the error, show an alert, or return an error response
        } else {
            // Your database connection and query for inserting user data
            // include 'php/conn.php'; // Include your database connection

            $insertQuery = "INSERT INTO user_table (first_name, surname, mobileOrEmail, password, birthday_day, birthday_month, birthday_year, gender, created_at)
            VALUES ('$fname', '$surname', '$mobile', '$pass', '$birthday_day', '$birthday_month', '$birthday_year', '$gender', NOW())";

            if (mysqli_query($conn, $insertQuery)) {
                // OTP sent successfully
                $alertMessage = 'Register successfully';
                // Redirect or display a success message
                echo '<script>alert("' . $alertMessage . '"); window.location.href = "../../home/home.php";</script>';
            } else {
                $alertMessage = "Error: " . mysqli_error($conn);
                // Handle the database error, show an alert, or return an error response
            }
        }
    }

?>
