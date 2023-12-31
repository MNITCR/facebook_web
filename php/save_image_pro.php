<?php
    include '../php/conn.php';

    // Check if the imageState parameter is set
    if (isset($_POST['user_id']) && isset($_FILES['image'])) {
        $user_id = $_POST['user_id'];
        $translateX = $_POST['translateX'];
        $imageSize = $_POST['imageSize'];
        $title_pro = $_POST['txt_pro'];
        $uploadDir = '../image_pro/';

        // Ensure the uploads directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Process the uploaded image
        $imageName = $_FILES['image']['name'];
        $imagePath = $uploadDir . $imageName;

        // Move the uploaded file to the uploads directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            // Update user profile image and translateX value
            $sql = "UPDATE user_table SET profile_image_path = ?, profile_image_size = ?, translateX = ? WHERE user_id = ?";
            $stmt = $conn->prepare($sql);

            // Check if the statement was prepared successfully
            if ($stmt) {
                // Bind parameters
                $stmt->bind_param("sssi", $imagePath, $imageSize, $translateX, $user_id);

                // Execute the statement
                if ($stmt->execute()) {
                    $sql = "INSERT INTO posts_table (user_id, caption, file_path, post_month, post_day, post_year, created_at) VALUES ('$user_id', '$title_pro', '$imagePath', MONTH(CURDATE()), DAYOFMONTH(CURDATE()), YEAR(CURDATE()), now())";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        echo "Successfully uploaded";
                    } else {
                        echo 'Error inserting data into the database: ' . mysqli_error($conn);
                    }
                } else {
                    echo 'Error updating image state: ' . $stmt->error;
                }

                // Close the statement
                $stmt->close();
            } else {
                echo 'Error preparing statement: ' . $conn->error;
            }
        } else {
            echo 'Error moving uploaded image to the "uploads" folder.';
        }
    } else {
        // Handle the case where the user_id or image parameter is not set
        echo 'Invalid request parameters.';
    }

    // Close the connection
    $conn->close();
?>
