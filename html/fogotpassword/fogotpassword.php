<?php
  include '../../php/FgLogin.php';
  include '../../php/CheckNewPass.php';
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://static.xx.fbcdn.net/rsrc.php/yb/r/hLRJ1GG_y0J.ico">
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
    <!-- Display the alert message if it's not empty -->
    <?php if (!empty($OTPAlertMessage)) : ?>
      <script>
        alert("<?php echo $OTPAlertMessage; ?>");
      </script>
    <?php endif; ?>
    <?php if (!empty($alertMessage)) : ?>
      <script>
        alert("<?php echo $alertMessage; ?>");
        window.location.href = "fogotpassword.php"; // Redirect to the index page
      </script>
    <?php endif; ?>
    <?php if (!empty($error)) : ?>
      <script>
        alert("<?php echo $error; ?>");
        window.location.href = "fogotpassword.php"; // Redirect to the index page
      </script>
    <?php endif; ?>

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
                <form class="d-flex" role="search" method="POST">
                    <input class="form-control me-2" type="text" name="emailOrPhone" placeholder="Email or phone">
                    <input class="form-control me-2" type="text" name="password" placeholder="Password">
                    <button class="btn btn-primary fw-bold" type="submit" name="login" style="white-space: nowrap;">Log in</button>
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
                    <button type="button" id="searchUser" class="btn btn-primary" style="padding: 5px 30px 5px 30px;font-size: 18px;">Search</button>
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
                    <!-- =============show data get from jquery============ -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                <button type="button" class="btn btn-primary">I Am Not In This List</button>
            </div>
            </div>
        </div>
    </div>


    <!-- ResetYourPassword Modal -->
    <div  class="d-flex justify-content-center align-items-center w-100" style="position: relative;bottom: 220px;z-index: 9999;">
      <!-- Then put toasts within -->
      <div id="toast" class="toast" role="alert"  >
        <div class="toast-header">
          <div class="d-flex justify-content-end align-items-end" style="width: 100%;">
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
        <div class="toast-body text-center">
          <div class="mb-3">
            <img src="../userImg/logoUser.png" alt="" srcset="" style="height: 150px;">
          </div>
          <div class="mb-3">
            <input type="hidden" id="ToastsInputEmail">
            <input type="hidden" id="ToastsInputEmailGetPass">
            <input type="text" name="ToastsInputPassword" id="ToastsInputPassword" class="form-control" placeholder="Enter password">
          </div>
          <button type="submit" class="btn btn-primary col-12" id="ToastsButtonLogin">Log In</button>
          <hr>
          <a href="#" style="font-size: 14px;text-decoration: none;" id="NotYou">Not you ?</a>
        </div>
      </div>
    </div>


    <div class="modal fade" id="ResetYourPassword" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-4" id="exampleModalLabel">Reset Your Password</h1>
          </div>
          <div class="modal-body">
            <form method="POST">
              <div class="mb-3">
                <div class="d-flex">
                  <div class="col-6 mb-3">
                    <label for="" class="col-form-label mb-3" style="font-size: 17px;font-weight: 600;">How do you want to receive the code to reset your password?</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="SendCode" id="SendCode" checked>
                      <label class="form-check-label" for="Sendcode">
                        Send code to : )
                        <p style="font-size: 15px;" id="SendCodeP"><!-- Get Email or Phone from search  --></p>
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="SendCode" id="EnterPassword">
                      <label class="form-check-label" for="EnterPassword" id="EnterPasswordLable">
                        Enter Password to Log In
                      </label>
                    </div>
                  </div>
                  <div class="col-6 justify-content-center d-flex align-items-center">
                    <div class="text-center">
                      <div class="mb-2">
                        <img src="../userImg/logoUser.png" alt="user" style="height: 50px;">
                      </div>
                      <span class="mt-2" style="font-weight: 600;" id="fullName">TH MN</span>
                      <div class="d-flex flex-column" style="position: relative; top: -2px;">
                        <span style="font-size: 14px;">Facebook user</span>
                        <a href="#" style="font-size: 14px;text-decoration: none;" id="NotYou">Not you ?</a>
                      </div>
                    </div>

                  </div>
                </div>
              </div>


              <div class="modal-footer">
                <input type="hidden" id="EnterPasswordInput">
                <button type="button" class="btn btn-secondary fw-bold" id="EnterResetYourPassword">Enter Password to Log In</button>
                <button type="button" id="ContinueResetYourPassword" class="btn btn-primary fw-bold">Continue</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Enter Security code -->
    <div class="modal fade" id="EnterSecurityCode" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-4" id="exampleModalLabel">Enter security code</h1>
          </div>
            <div class="modal-body">
            <form method="POST">
              <div class="mb-4">
                <label for="" class="col-form-label mb-3" style="font-size: 17px;font-weight: 600;">Please check your emails for a message with your code. Your code is 6 numbers long.</label>
                <div class="d-flex align-items-center gap-3">
                  <div id="mainOTPCodeEM">
                    <input type='hidden' id='OTPFromRestEmail' name='OTPFromRestEmail' value='<?php echo $_SESSION['OTPFromRestEmail'] ?>'>
                    <input type="text" class="form-control p-3" id="EnterCodeSecurity" placeholder="Enter code">
                  </div>
                  <div class="">
                    <label class="EnterCodeSecurity" for="">
                      We Sent your code to :
                      <p style="font-size: 15px;" class="mt-1" id="EnterCodeSecurityP"><!-- Get Email or Phone from search  --></p>
                    </label>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
              </div>
              <div class="" style="justify-content: space-between;display: flex;" style="width: 100%;">
                <a href="#" id="DidNotGetACode" style="left: 0;text-decoration: none;">Didn't get a code ?</a>
                <div class="">
                  <button type="button" class="btn btn-secondary fw-bold" id="CancelEnterSecurityCode">Cancel</button>
                  <button type="button" id="ContinueEnterSecurityCode" class="btn btn-primary fw-bold">Continue</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>


    <!-- Update Password -->
    <div class="modal fade" id="UpdatePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Password</h1>
            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
          </div>
          <div class="modal-body">
            <form method="POST">
              <div class="mb-3">
                <label for="message-text" class="col-form-label">New Password :</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="New Password"/>
                  <button class="btn btn-outline-secondary" type="button" id="togglePasswordRegister1" style="border-radius: 0px 5px 5px 0px">
                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                  </button>
                </div>
                <!-- check Character -->
                <div id="CheckSpecialCharacter1" class="text-danger"></div>
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Confirm Password :</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="ConfirmNewPassword" name="ConfirmNewPassword" placeholder="Confirm Password"/>
                  <button class="btn btn-outline-secondary" type="button" id="togglePasswordRegister2" style="border-radius: 0px 5px 5px 0px">
                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                  </button>
                </div>
                <!-- check Character -->
                <div id="CheckSpecialCharacter2" class="text-danger"></div>
              </div>
              <input type="hidden" id="EmailOrPhonenumberUpdatePassword" name="EmailOrPhonenumberUpdatePassword" />
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary fw-bold" id="UpdatePasswordSubmit" name="UpdatePasswordSubmit">Save Change</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <!-- =================JS FILE================= -->
    <script src="../../js/searchUser.js?<?php echo time() ;?>" type="text/javascript"></script>
    <script src="../../js/ResetYourPassword.js?<?php echo time() ;?>" type="text/javascript"></script>
    <script src="../../js/CheckNewPass.js?<?php echo time() ;?>" type="text/javascript"></script>

</body>
</html>
