<?php
    include '../php/conn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["post_id"]) && isset($_POST["image_url"])) {
            $post_id = $_POST["post_id"];
            $img_url = $_POST["image_url"];
            $text_icon = $_POST["text_icon"];

            // Check if the image already exists in the database
            $checkQuery = "SELECT * FROM store_icon_reach WHERE post_id = '$post_id'";
            $result = mysqli_query($conn, $checkQuery);

            if (mysqli_num_rows($result) > 0) {
                // If image exists, update the existing record
                $updateQuery = "UPDATE store_icon_reach SET image_url = '$img_url',text_icon = '$text_icon', updated_at = now() WHERE post_id = '$post_id'";
                if (mysqli_query($conn, $updateQuery)) {
                    echo "Image data updated successfully.";
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
            } else {
                // If image doesn't exist, insert a new record
                $insertQuery = "INSERT INTO store_icon_reach (post_id, image_url, text_icon, created_at) VALUES ('$post_id', '$img_url', '$text_icon', now())";
                if (mysqli_query($conn, $insertQuery)) {
                    echo "Image and data stored successfully.";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }

            // Close the database connection
            mysqli_close($conn);
        } else {
            echo "Invalid request. Please provide post_id and image.";
        }
    } else {
        echo "Invalid request method.";
    }
?>
