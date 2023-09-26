<?php
    // connect to database
    include 'php/conn.php';
    $alertMessage = ''; // Initialize an empty alert message

    if(isset($_POST['sing_up'])){
        $fname = $_POST['first_name'];
        $surname = $_POST['surname'];
        $mobile = $_POST['mobileOrEmail'];
        $pass = $_POST['password'];
        $birthday_day =$_POST['birthday_day'];
        $birthday_month =$_POST['birthday_month'];
        $birthday_year =$_POST['birthday_year'];
        $correct_year = date('Y');
        $gender = $_POST['gender'];

        $user_year = intval($birthday_year);
        $age = $correct_year - $user_year;


        if($age >= 15){
            // Check if email or phone number already exists in the users table
            $query = "SELECT mobileOrEmail FROM user_table WHERE mobileOrEmail = '$mobile'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 0) {
                // Email or phone number does not exist, insert the new user data
                $insertQuery = "INSERT INTO user_table (first_name, surname, mobileOrEmail, password, birthday_day, birthday_month, birthday_year, gender, created_at)
                                VALUES ('$fname', '$surname', '$mobile', '$pass', '$birthday_day', '$birthday_month', '$birthday_year', '$gender', now())";

                if(mysqli_query($conn, $insertQuery)){
                    // User inserted successfully, you can redirect to a success page
                    $alertMessage = 'Register successfully';
                    // header("Location: index.php");
                    echo '<script>alert("' . $alertMessage . '"); window.location.href = "index.php";</script>';
                    exit;
                } else {
                    $alertMessage = "Error: " . mysqli_error($conn);
                }
            } else {
                // Email or phone number already exists, show an alert message
                $alertMessage = "Email or phone number already exists. Please use a different one.";
            }
        }
        else {
            $alertMessage = "Sorry, you must be at least 15 years old to create an account.";
        }
    }
?>
