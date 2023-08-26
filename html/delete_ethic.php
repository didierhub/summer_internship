<?php
require_once 'db_connection.php'; // Include database connection

if (isset($_GET['submission_id'])) {
    $submissionId = $_GET['submission_id'];

    // Verify the submission_id before proceeding with deletion
    if (empty($submissionId)) {
        echo "Invalid submission ID.";
        exit;
    }

    // Delete the submission from the database
    $deleteQuery = "DELETE FROM ethic_form WHERE submission_id = ?";
    $deleteStmt = $conn->prepare($deleteQuery);
    $deleteStmt->bind_param("i", $submissionId);
    
    if ($deleteStmt->execute()) {
        // Deletion successful, display a styled popup within appt_status.php
        echo '
        <link rel="stylesheet" type="text/css" href="../css/popup-style.css">
        <div class="popup">
            <span class="success-icon">&#10004;</span>
            <span>Delete successful.</span>
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
    } else {
        echo "Delete failed: " . $deleteStmt->error;
    }

    $deleteStmt->close();
} else {
    echo "Submission ID not provided.";
}

$conn->close();
?>
