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
            // Initialize your bot with the token
            // ================hwo to show id bot=================
            // https://api.telegram.org/bot6521503624:AAFKlknrcD3G4Nlf1Jfn0-_XNNHeJXTtNL8/getUpdates


            $botToken = '6521503624:AAFKlknrcD3G4Nlf1Jfn0-_XNNHeJXTtNL8';
            $chatId = '6132093492'; // Replace with the recipient's chat ID


            // Generate a random 6-digit code
            $randomCode = rand(100000, 999999);


            // Apply formatting to the code
            // $formattedCode = "<b>This is a bold text</b>, <i>italic text</i>, and <code><pre style='background-color:#FFFF00;color:#FF0000;'>$randomCode</pre></code>";
            $formattedCode = "<b><span class='tg-spoiler'>$randomCode</span></b> is confirmation Facebook code";
            // $formattedCode = "<span $randomCode class='tg-spoiler'>[<font color='#0000FF'>__underline__</font>]$randomCode</span> is confirmation Facebook code";


            // Compose the message
            $message = urlencode($formattedCode);

            // Create the cURL request
            // $url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=$message&parse_mode=MarkdownV2";
            $url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=$message&parse_mode=HTML";
            // $url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=$message";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            // Execute the cURL request
            $output = curl_exec($ch);

            // Check for errors
            if (curl_errno($ch)) {
                echo 'Error: ' . curl_error($ch);
            }

            // Close cURL session
            curl_close($ch);

            // Check the response from the Telegram API
            $response = json_decode($output, true);

            if ($response && $response['ok']) {
                $alertMessage = "Sent successfully to $mobile";
            } else {
                echo 'Error sending code: ' . $response['description'];
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
