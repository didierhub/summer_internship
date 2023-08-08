<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Start the session

// Include the database connection file
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the email exists in the database
    $email_check_query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($email_check_query);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $row["password"])) {
            // Set session variables for the logged-in user
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_email"] = $row["email"];
            // Redirect to the video page or wherever you want
            header("Location:user_dashboard.php ");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Email not found";
    }
}

// Close the connection
$conn->close();
?>











<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <link rel="stylesheet" href="../css/login.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
</head>

<body>


  <div id="login-box">

    <div id="logo">
      <img src="../image/ufulogoen4.png" alt="">
    </div>


    <h1>Login</h1>
    <form action="login.php" method="post" >
      <label>email</label>
      <input  name="email" type="email" placeholder="" />
      <label>Password</label>
      <input  name="password"type="password" placeholder="" />
      <input type="submit" value="log in" />
      <p class="para-2" id="not_have_account">
        Not have an account? <span>  <a href="index.php">Sign Up Here</a> </span>
      </p>
      <closeform></closeform>
    </form>
  </div>

  
  <script src="/app.js">

  </script>
</body>

</html>