<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://static.xx.fbcdn.net/rsrc.php/yb/r/hLRJ1GG_y0J.ico">
    <title>Facebook</title>
    <link rel="stylesheet" href="../../css/Profile.css?<?php echo time()?>">
    <link rel="stylesheet" href="../../css/home.css?<?php echo time()?>">
    <?php include '../../php/link.php' ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css"/>
</head>
<body>
    <?php include './Navbar.php' ?>
    <?php include './Profile.php' ?>
    <!-- getIMG -->
    <script src="../../js/getIMG_handler.js?<?php echo time() ?>" type="text/javascript"></script>
    <script src="../../js/profile.js?<?php echo time() ?>" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>

</body>
</html>
