<?php
    include '../php/conn.php';

    $allMessage = "";
    if (isset($_POST['Video_OR_Image_POST'])) {
        $user_id = $_POST['user_id'];
        $caption = $_POST['textarea_caption_input'];

        // Process image file upload
        $target_dir = "../uploads/"; // Adjust the target directory as needed
        $target_file = $target_dir . basename($_FILES["fileInput"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check file size (adjust the limit as needed)
        if ($_FILES["fileInput"]["size"] > 500000) {
            $allMessage = "Sorry, your file is too large.";
            echo "<script>alert('$allMessage');window.location.href='../html/home/home.php'</script>";
        }

        // Allow certain file formats
        $allowed_extensions = array("jpg", "jpeg", "png", "gif", "jfif", "ico", "mp4","webp", "avi", "mkv", "mov");
        if (!in_array($imageFileType, $allowed_extensions)) {
            $allMessage = "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
            echo "<script>alert('$allMessage');window.location.href='../html/home/home.php'</script>";
        }


        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["fileInput"]["tmp_name"], $target_file)) {
            // echo "The file " . htmlspecialchars(basename($_FILES["fileInput"]["name"])) . " has been uploaded.";

            // Insert data into the database (adjust SQL query based on your database structure)
            $sql = "INSERT INTO posts_table (user_id, caption, file_path, post_month, post_day, post_year, created_at) VALUES ('$user_id', '$caption', '$target_file', MONTH(CURDATE()), DAYOFMONTH(CURDATE()), YEAR(CURDATE()), now())";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // Display success message using jQuery
                $allMessage = "Successfully uploaded";
                echo "<script>alert('$allMessage');window.location.href='../html/home/home.php'</script>";
                // echo 'Successfully uploaded.';
            } else {
                $allMessage = 'Error inserting data into the database: ' . mysqli_error($conn);
                echo "<script>alert('$allMessage');window.location.href='../html/home/home.php'</script>";
            }
        } else {
            // Display success message using jQuery
            $allMessage = "Sorry, there was an error uploading your file.";
            echo "<script>alert('$allMessage');window.location.href='../html/home/home.php'</script>";
        }

        // Close the database connection
        mysqli_close($conn);

        // Redirect to the main page or wherever you want after posting
        // header("Location: index.php");
        exit();
    }
?>

