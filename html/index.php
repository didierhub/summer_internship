<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 1);
error_reporting(0);
error_reporting(E_ALL);

include('db_connection.php');

$emailError = ""; // Initialize email error message
$passwordError = ""; // Initialize password error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $stmt = $conn->prepare("SELECT user_id, email, password, user_role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $dbEmail, $dbPassword, $userRole);
        $stmt->fetch();

        if (password_verify($password, $dbPassword)) {
            session_start(); // This is already present in your code
            
            $_SESSION["user_id"] = $id;
            $_SESSION["user_email"] = $dbEmail;
            $_SESSION["user_role"] = $userRole;

            if ($userRole === 'superadmin') {
                header("Location: Admin_dashboard.php");
            } elseif ($userRole === 'manager') {
                header("Location: manager_dashboard.php");
            } elseif ($userRole === 'supervisor') {
                header("Location: supervisor_dashboard.php");
            } else {
                header("Location: user_dashboard.php");
            }
            exit();
        } else {
            $passwordError = "Wrong password"; // Set password error message
        }
    } else {
        $emailError = "Email not found"; // Set email error message
    }

    $stmt->close();
}
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


    <h1>Log in</h1>
    <form action="index.php" method="post" >
      <label>email</label>
      <input  name="email" type="email" placeholder="" />
      <div class="error-message"><?php echo isset($emailError) ? $emailError : ''; ?></div>
      <label>Password</label>
      <input  name="password"type="password" placeholder="" />
      <div class="error-message"><?php echo isset($passwordError) ? $passwordError : ''; ?></div>
      <input type="submit" value="log in" />
      <p class="para-2" id="not_have_account">
        Not have an account? <span>  <a href="sign_up.php">Sign Up Here</a> </span>
      </p>
      <closeform></closeform>
    </form>
  </div>

  
  <script src="../js/app.js">

  </script>
</body>

</html>