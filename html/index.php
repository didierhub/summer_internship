<?php
require_once 'db_connection.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Add more validation and security measures here
    
    // Insert user data into the database
    $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
      header("Location:user_dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css" >

    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    

<div id="signup-box">

        <div id="logo">
             <img src="../image/ufulogoen4.png" alt="">
        </div>

        <h1>Sign Up</h1>
        <form action="signup_process.php" method="post" >
                    <label>First Name</label>
                    <input type="text" placeholder="" />
                    <label>Last Name</label>
                    <input type="text" placeholder="" />
                    <label>Email</label>
                    <input type="email" placeholder="" />
                    <label>Password</label>
                    <input type="password" placeholder="" />
                    <label>Confirm Password</label>
                    <input type="password" placeholder="" />
                    <input type="submit" value="sin up " />
                    <closeform></closeform>
    </form>

        <p>
          By clicking the Sign Up button,you agree to our <br />
          <a href="#">Terms and Condition</a> and <a href="#">Policy Privacy</a>
        </p>
        <?php
        if (isset($error_message)) {
            echo '<p>' . $error_message . '</p>';
        }
        ?>
        <p class="para-2" id="have_account">
            Already have an account?  <a href="index.php"><span>Login here</span></a>
          </p>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirmPassword");
    const signupForm = document.getElementById("signupForm");

    confirmPasswordInput.addEventListener("input", function() {
        if (passwordInput.value !== confirmPasswordInput.value) {
            confirmPasswordInput.setCustomValidity("Passwords do not match.");
        } else {
            confirmPasswordInput.setCustomValidity("");
        }
    });

    signupForm.addEventListener("submit", function(event) {
        if (passwordInput.value !== confirmPasswordInput.value) {
            event.preventDefault();
            confirmPasswordInput.reportValidity();
        }
    });
});
</script>
  </body>
</html>

