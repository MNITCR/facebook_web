<?php
    include_once 'conn.php';
    if (isset($_POST['UpdatePasswordSubmit'])){
        $dataEmailOrPhone = $_POST['EmailOrPhonenumberUpdatePassword'];
        $dataNewPassword = $_POST['newPassword'];
        $dataConfirmNewPassword = $_POST['ConfirmNewPassword'];

        if($dataNewPassword != $dataConfirmNewPassword){
            echo '<script>alert("Password not matches")</script>';
        }else{
            $query = "UPDATE user_table SET password = '$dataConfirmNewPassword', updated_at = now() WHERE mobileOrEmail = '$dataEmailOrPhone'";

            $result = mysqli_query($conn, $query);

            if ($result) {
                echo '<script>alert("Password updated successfully");window.location.href = "../../html/home/home.php";</script>';
            } else {
                echo '<script>alert("Error updating password")</script>';
            }
        }
    }
?>
