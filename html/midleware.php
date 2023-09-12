
<?php
 include('db_connection.php');
if (!isset($_SESSION)) {
    session_start();
}

// Check if the user is logged in
function getLoggedInUserId() {
    if (isset($_SESSION['user_id'])) {
        return $_SESSION['user_id'];
    } else {
        return null; // Return null if user is not logged in
    }
}

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}


// midleware.php

// ... (existing code)

// Retrieve user's first and last name based on user ID
function getUserFullName($userId) {
    global $conn; // Assuming $conn is your database connection

    $query = "SELECT first_name, last_name FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        return $row['first_name'] . ' ' . $row['last_name'];
    } else {
        return "User Not Found";
    }
}

?>




