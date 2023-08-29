<?php
require_once 'db_connection.php'; // Include your database connection script
require_once 'midleware.php';
$loggedInUserId = getLoggedInUserId();
// Include your authentication/middleware script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submissionId = $_POST['submission_id'];
    $adminComment = $_POST['comment'];
    $formStatus = $_POST['form_status'];

    // Determine editable status based on form_status
    $editable = ($formStatus === 'Approved') ? 0 : 1; // Set editable to 0 for Approved, 1 for Rejected

    $query = "UPDATE ethic_form 
              SET form_status = ?, comment = ?, editable = ? 
              WHERE submission_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssis", $formStatus, $adminComment, $editable, $submissionId);
    $stmt->execute();
    $stmt->close();

    // Update user form_count
    if (!empty($adminComment) && (strcasecmp($formStatus, 'Approved') === 0 || strcasecmp($formStatus, 'Rejected') === 0)) {
        // Update user form_count
        $countUpdateQuery = "UPDATE users SET form_count = form_count + 1 WHERE user_id = ?";
        $countUpdateStmt = $conn->prepare($countUpdateQuery);
        $countUpdateStmt->bind_param("i", $loggedInUserId); // Use the appropriate user ID
        $affectedRows = $countUpdateStmt->affected_rows;
        $countUpdateStmt->execute();
        $countUpdateStmt->close();
        echo "Rows affected: $affectedRows"; 
        echo "User ID: $loggedInUserId | Form Status: $formStatus | Admin Comment: $adminComment<br>";



    }



    echo '
    <link rel="stylesheet" type="text/css" href="../css/popup-style.css">
    <div class="popup">
        <span class="success-icon">&#10004;</span>
        <span>successfuly done.</span>
        <div class="popup-buttons">
            <button onclick="closePopupAndRedirect()">OK</button>
        </div>
    </div>
    <script>
        function closePopupAndRedirect() {
            var popup = document.querySelector(".popup");
            if (popup) {
                popup.style.display = "none";
                window.location.href = "Admin_dashboard.php"; // Redirect back to app_status.php
            }
        }
    </script>';
} else {
    echo "Invalid request.";
}


?>

