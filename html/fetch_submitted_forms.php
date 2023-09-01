<?php
// Include database connection

require_once 'db_connection.php';
echo '<link rel="stylesheet" href="../css/table_style.css"> ';

$query = "SELECT submission_id, form_type, form_status, submission_date FROM ethic_form";
$result = $conn->query($query);

if ($result) {
    echo "<table id='table'>";
    echo "<tr>";
    echo "<th>Submission ID</th>";
    echo "<th>Form Type</th>";
    echo "<th>Form Status</th>";
    echo "<th>Submission Date</th>";
    echo "<th>View</th>";
    echo "</tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['submission_id'] . "</td>";
        echo "<td>" . $row['form_type'] . "</td>";
        echo "<td>" . $row['form_status'] . "</td>";
        echo "<td>" . $row['submission_date'] . "</td>";
        echo "<td><a href='admin_view_ethic_form_and_comment.php?submission_id=" . $row['submission_id'] . "'> <span>View Details</span></a></td>";
        echo "</tr>";
    }
    
    echo "</table>";
    
}

else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
