    <?php
        // connect to database
        include 'conn.php';
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

            if($emailOrPhone == "" || $password == "") {
                $alertMessage = "Please enter your email or Password";
            }else{
                // Query to check if the user exists in the database
                $query = "SELECT mobileOrEmail,password FROM user_table WHERE mobileOrEmail = '$emailOrPhone' AND password = '$password'";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    // Check if a row was returned (valid login)
                    if (mysqli_num_rows($result) == 1) {
                        session_start();

                        // Retrieve the user data
                        $getUserQuery = "SELECT first_name, surname, birthday_day, birthday_month, birthday_year FROM user_table WHERE mobileOrEmail = '$emailOrPhone'";
                        $userResult = mysqli_query($conn, $getUserQuery);

                        if ($userResult && $userData = mysqli_fetch_assoc($userResult)) {
                            $FName = $userData['first_name'];
                            $LName = $userData['surname'];
                            $_SESSION['BIT_DAY'] = $userData['birthday_day'];
                            // Map numeric month to string representation
                            $monthMapping = [
                                '1' => 'January',
                                '2' => 'February',
                                '3' => 'March',
                                '4' => 'April',
                                '5' => 'May',
                                '6' => 'June',
                                '7' => 'July',
                                '8' => 'August',
                                '9' => 'September',
                                '10' => 'October',
                                '11' => 'November',
                                '12' => 'December'
                            ];
                            $Mouth = $monthMapping[$userData['birthday_month']];
                            $_SESSION['BIT_MONTH'] = $Mouth;
                            $_SESSION['BIT_YEAR'] = $userData['birthday_year'];

                            $FULL_Name = $FName .' '. $LName;
                            $_SESSION['FULL_Name'] = $FULL_Name;

                            $alertMessage = "Login successfully";
                            echo '<script>alert("' . $alertMessage . '"); window.location.href = "html/home/home.php";</script>';
                            exit;
                        } else {
                            $alertMessage = "Error retrieving user data: " . mysqli_error($conn);
                            // Handle the database error, show an alert, or return an error response
                        }



                    } else {
                        // Invalid credentials
                        $error = "Invalid email/phone or password. Please try again.";
                    }
                } else {
                    // Database error
                    $error = "Database error. Please try again later.";
                }
            }
        }

    ?>
