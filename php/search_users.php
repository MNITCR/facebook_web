<?php
// Include your database connection code here
include '../php/conn.php';

if (isset($_POST['searchQuery'])) {
    $searchQuery = $_POST['searchQuery'];

    // Perform a database query to retrieve user data based on the search query
    // Replace this with your actual database query
    $query = "SELECT user_id, first_name, surname, mobileOrEmail, password FROM user_table WHERE first_name LIKE '%$searchQuery%' OR surname LIKE '%$searchQuery%' OR mobileOrEmail LIKE '%$searchQuery%'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $userData = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $userData[] = $row;
        }

        echo json_encode($userData);
    } else {
        echo json_encode(array()); // Return an empty array if no results found
    }
}
?>
