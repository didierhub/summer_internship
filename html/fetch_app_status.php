<?php
// Include database connection
require_once 'db_connection.php';
require_once 'midleware.php';
echo '<link rel="stylesheet" type="text/css" href="../css/admin_appt_fetch.css">';

$loggedInUserId = getLoggedInUserId(); // Implement a function to get the logged-in user's ID

$query = "SELECT submission_id, form_type, status, submission_date FROM ethic_form WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $loggedInUserId);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo "<div id='submitted_form_row'>";
        echo "<div class='col'><span>" . $row['submission_id'] . "</span></div>";
        echo "<div class='col'><span>" . $row['form_type'] . "</span></div>";
        echo "<div class='col'><span>" . $row['status'] . "</span></div>";
        echo "<div class='col'><span>" . $row['submission_date'] . "</span></div>";
        echo "<div class='col'><a href='edit_ecthic.php?submission_id=" . $row['submission_id'] . "'>Edit</a></div>";
        echo '<div class="col"> <a href="delete_ethic.php?submission_id=' . $row['submission_id'] . '" onclick="return confirm(\'Are you sure you want to delete this submission?\')">Delete</a></div>';

       
        echo "</div>";
      

    }
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
