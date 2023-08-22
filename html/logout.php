<?php
 // Start the session

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other page you want
header("Location: index.php"); // Change this to the appropriate URL
exit();

?>
