<?php
    include '../php/conn.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $postId = $_POST['post_id'];
        $newCaption = $_POST['new_caption'];

        // Update the caption in the database
        $updateQuery = "UPDATE posts_table SET caption = '$newCaption' WHERE post_id = '$postId'";

        if (mysqli_query($conn, $updateQuery)) {
            $response = array('success' => true);
            echo json_encode($response);
        } else {
            $response = array('success' => false, 'error' => mysqli_error($conn));
            echo json_encode($response);
        }
    } else {
        $response = array('success' => false, 'error' => 'Invalid request method.');
        echo json_encode($response);
    }
?>
