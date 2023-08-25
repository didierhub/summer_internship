<?php
// Include database connection

require_once 'db_connection.php';
echo '<link rel="stylesheet" type="text/css" href="../css/admin.css">';

$query = "SELECT submission_id, form_type, status, submission_date FROM ethic_form";
$result = $conn->query($query);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo "<div id='submitted_form_row'>";
        echo "<div class='col'><span>" . $row['submission_id'] . "</span></div>";
        echo "<div class='col'><span>" . $row['form_type'] . "</span></div>";
        echo "<div class='col'><span>" . $row['status'] . "</span></div>";
        echo "<div class='col'><span>" . $row['submission_date'] . "</span></div>";
        echo "</div>";
    }
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
