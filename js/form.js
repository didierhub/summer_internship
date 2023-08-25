document.addEventListener("DOMContentLoaded", function () {
    // Wait for the document to be fully loaded before running the script
    var password = document.getElementById("password");
    var confirmPassword = document.getElementById("confirm_password");
    var passwordError = document.getElementById("password_error");
  
    confirmPassword.addEventListener("input", function () {
      if (password.value !== confirmPassword.value) {
        passwordError.textContent = "Passwords do not match";
        return false;
      } else {
        passwordError.textContent = "";
        return true
      }
    });
  });