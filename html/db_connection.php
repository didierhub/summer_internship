<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "summer_internship";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

require_once 'midleware.php'
?>
