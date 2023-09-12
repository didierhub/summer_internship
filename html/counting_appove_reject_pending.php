<?php
// Include your database connection script
 require_once 'midleware.php'; 
 include('db_connection.php');

// Initialize the counts array
$counts = array('pending' => 0, 'approved' => 0, 'rejected' => 0);

// Count the number of submissions with each status
$query = "SELECT
            COUNT(CASE WHEN form_status = 'Pending' THEN 1 END) AS pending_count,
            COUNT(CASE WHEN form_status = 'Approved' THEN 1 END) AS approved_count,
            COUNT(CASE WHEN form_status = 'Rejected' THEN 1 END) AS rejected_count
          FROM ethic_form";
$result = $conn->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    $counts['pending'] = $row['pending_count'];
    $counts['approved'] = $row['approved_count'];
    $counts['rejected'] = $row['rejected_count'];
}



// Return the counts array
return $counts;
?>
