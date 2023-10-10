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
    $OTPMessage = "";

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
        $OTP_CODE = $_POST['OTP_CODE'];
        session_start();
        $OTP_SESSION= $_SESSION['CODE_OTP'];

        // print($OTP_CODE.'||'.$fname.'||'.$surname.'||'.$mobile.'||'.$pass.'||'.$birthday_day.'||'.$birthday_month.'||'.$birthday_year.'||'.$inputOTP.'||'.$gender);

        if (empty($inputOTP)) {
            $OTPMessage = 'Please enter your OTP code';
            // Handle the error, show an alert, or return an error response
        }
        else if($inputOTP != $OTP_CODE || $inputOTP != $OTP_SESSION){
            $OTPMessage = 'The code otp not found!';
        }
        else {
            $insertQuery = "INSERT INTO user_table (first_name, surname, mobileOrEmail, password, birthday_day, birthday_month, birthday_year, gender, created_at)
            VALUES ('$fname', '$surname', '$mobile', '$pass', '$birthday_day', '$birthday_month', '$birthday_year', '$gender', NOW())";

            if (mysqli_query($conn, $insertQuery)) {
                // Retrieve the user data
                $getUserQuery = "SELECT first_name,surname FROM user_table WHERE mobileOrEmail = '$mobile'";
                $userResult = mysqli_query($conn, $getUserQuery);

                if ($userResult && $userData = mysqli_fetch_assoc($userResult)) {
                    $FName = $userData['first_name'];
                    $LName = $userData['surname'];

                    $FULL_Name = $FName + $LName;
                    $FULLName = $_SESSION['FULL_Name'];
                    // Redirect or display a success message with the user's name
                    $alertMessage = "Register successfully. Welcome, ' . $FULLName . '!";'window.location.href = "html/home/home.php"';
                } else {
                    $alertMessage = "Error retrieving user data: " . mysqli_error($conn);
                    // Handle the database error, show an alert, or return an error response
                }
                // $alertMessage = 'Register successfully';
            } else {
                $alertMessage = "Error: " . mysqli_error($conn);
                // Handle the database error, show an alert, or return an error response
            }
        }
    }
?>
