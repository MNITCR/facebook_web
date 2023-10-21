<?php
    include '../php/conn.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    // Query to fetch posts with associated image URLs
    $query = "SELECT p.*,GROUP_CONCAT(sir.image_url) AS image_urls, text_icon FROM
            posts_table p LEFT JOIN store_icon_reach sir ON p.post_id = sir.post_id
            WHERE p.user_id = '$user_id' GROUP BY p.post_id ORDER BY p.post_id DESC
    ";

    $result = mysqli_query($conn, $query);

    // Fetch data and convert to JSON
    $posts = array();
    while ($row = mysqli_fetch_assoc($result)) {
        // Convert comma-separated image URLs to an array
        $row['image_urls'] = explode(',', $row['image_urls']);
        $posts[] = $row;
    }

    echo json_encode($posts);
?>
