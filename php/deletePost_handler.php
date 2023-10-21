<?php
    include '../php/conn.php';

    // Check if post_id is set and not empty
    if (isset($_POST['post_id']) && !empty($_POST['post_id'])) {
        $postId = $_POST['post_id'];

        // Retrieve the file path from the database
        $filePathQuery = "SELECT file_path FROM posts_table WHERE post_id = '$postId'";
        $result = mysqli_query($conn, $filePathQuery);

        if ($result && $row = mysqli_fetch_assoc($result)) {
            $filePath = $row['file_path'];

            // Perform the deletion in your database
            $deleteQuery = "DELETE FROM posts_table WHERE post_id = '$postId'";
            if (mysqli_query($conn, $deleteQuery)) {
                // Delete the file from the upload folder
                if (file_exists($filePath)) {
                    unlink($filePath);
                    echo "Post and image deleted successfully";
                } else {
                    echo "Post deleted, but image not found in the upload folder";
                }
            } else {
                echo 'Error deleting post: ' . mysqli_error($conn);
            }
        } else {
            echo 'Error retrieving file path: ' . mysqli_error($conn);
        }
    } else {
        echo 'Invalid post ID';
    }
?>
