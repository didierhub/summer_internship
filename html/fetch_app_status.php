<?php
// Include database connection
require_once 'db_connection.php';
require_once 'midleware.php';
echo '<link rel="stylesheet" href="../css/table_style.css"> ';
echo '<link rel="stylesheet" href="../css/appt_status.css"> ';

$loggedInUserId = getLoggedInUserId(); // Implement a function to get the logged-in user's ID

$query = "SELECT submission_id, form_type, form_status, submission_date,comment FROM ethic_form WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $loggedInUserId);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Submission ID</th>";
    echo "<th>Form Type</th>";
    echo "<th>Form Status</th>";
    echo "<th>Comment</th>";
    echo "<th>Submission Date</th>";
    echo "<th>Edit</th>";
    echo "<th>Delete</th>";
    echo "<th>Print</th>";
    echo "</tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='col'><span>" . $row['submission_id'] . "</span></td>";
        echo "<td class='col'><span>" . $row['form_type'] . "</span></td>";
        echo "<td class='col'><span>" . $row['form_status'] . "</span></td>";
        echo "<td class='col'><span>" . $row['comment'] . "</span></td>";
        echo "<td class='col'><span>" . $row['submission_date'] . "</span></td>";
        echo "<td class='col'><a href='edit_ethic.php?submission_id=" . $row['submission_id'] . "'>Edit</a></td>";
        echo '<td class="col"><a href="delete_ethic.php?submission_id=' . $row['submission_id'] . '" onclick="return confirm(\'Are you sure you want to delete this submission?\')">Delete</a></td>';
        echo "<td class='col'><a href='view_and_action_print.php?submission_id=" . $row['submission_id'] . "'>Print</a></td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
}
 else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
