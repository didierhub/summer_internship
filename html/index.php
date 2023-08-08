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
        <form action="index.php" method="post" >
                    <label>First Name</label>
                    <input  name="first_name" type="text" placeholder="" />
                    <label>Last Name</label>
                    <input  name ="last_name"  type="text" placeholder="" />
                    <label>Email</label>
                    <input  name="type="email="email" placeholder="" />
                    <label>Password</label>
                    <input  name="password"  type="password" placeholder="" />
                    <label>Confirm Password</label>
                    <input name="confirm_password" type="password"  placeholder="" />
                    <span class="message" id="message"></span>
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
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirm-password');
    const messageElement = document.getElementById('message');
    const form = document.getElementById('signup-form');

    confirmPasswordInput.addEventListener('input', () => {
      const password = passwordInput.value;
      const confirmPassword = confirmPasswordInput.value;

      if (password === confirmPassword) {
        messageElement.textContent = 'Passwords match';
        messageElement.style.color = 'green';
        form.querySelector('button').disabled = false;
      } else {
        messageElement.textContent = 'Passwords do not match';
        messageElement.style.color = 'red';
        form.querySelector('button').disabled = true;
      }
    });

    form.addEventListener('submit', (e) => {
      if (passwordInput.value !== confirmPasswordInput.value) {
        e.preventDefault();
        alert('Passwords do not match. Please correct.');
      }
    });
  </script>


  </body>
</html>

