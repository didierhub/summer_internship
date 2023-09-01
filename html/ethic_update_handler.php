<?php
require_once 'db_connection.php'; // Include your database connection script
require_once 'midleware.php'; // Include your authentication/middleware script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $submissionId = $_POST['submission_id'];
    $researcherName = $_POST['researcher_name'];
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];
    $question4 = $_POST['question4'];
    $question5 = $_POST['question5'];
    $question6 = $_POST['question6'];
    $question7 = $_POST['question7'];

    // Update the database with the new values
    $query = "UPDATE ethic_form 
              SET researcher_name = ?, 
                  question1 = ?, question2 = ?, question3 = ?, 
                  question4 = ?, question5 = ?, question6 = ?, question7 = ?
              WHERE submission_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssssss", $researcherName, 
                      $question1, $question2, $question3, 
                      $question4, $question5, $question6, $question7, 
                      $submissionId);
    $stmt->execute();

    // Handle success/failure
    if ($stmt->affected_rows > 0) {
        echo '
        <link rel="stylesheet" type="text/css" href="../css/popup-style.css">
        <div class="popup">
            <span class="success-icon">&#10004;</span>
            <span>Edit successful.</span>
            <div class="popup-buttons">
                <button onclick="closePopupAndRedirect()">OK</button>
            </div>
        </div>
        <script>
            function closePopupAndRedirect() {
                var popup = document.querySelector(".popup");
                if (popup) {
                    popup.style.display = "none";
                    window.location.href = "appt_status.php"; // Redirect back to app_status.php
                }
            }
        </script>';
        
    }
     else {
        echo "Failed to update form.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
