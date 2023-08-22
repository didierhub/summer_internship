
<?php

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
?>
