<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection file
require_once 'midleware.php';
include('db_connection.php');
include('notification_handler.php');

// Get the logged-in user's ID
$loggedInUserId = getLoggedInUserId();

// Get the user's full name using the ID
$userFullName = getUserFullName($loggedInUserId);

// Calculate the year and month components
$year = date('Y');
$month = date('m');

// Calculate the next incremental value for the given year and month
function getNextIncrementalValue($conn, $year, $month) {
    $query = "SELECT MAX(incremental) AS max_incremental FROM ethic_form WHERE YEAR(submission_date) = ? AND MONTH(submission_date) = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $year, $month);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $maxIncremental = $row['max_incremental'];
    return ($maxIncremental !== null) ? ($maxIncremental + 1) : 1;
}

// Get current date
$submissionDate = date('Y-m-d'); // Current date in YYYY-MM-DD format

// Calculate the next incremental value
$nextIncremental = getNextIncrementalValue($conn, $year, $month);

// Create the primary key
$submissionId = $year . $month . str_pad($nextIncremental, 3, '0', STR_PAD_LEFT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process other form data...
    $researcherName = $_POST["researcher_name"];
    $question1 = $_POST["question1"];
    $question2 = $_POST["question2"];
    $question3 = $_POST["question3"];
    $question4 = $_POST["question4"];
    $question5 = $_POST["question5"];
    $question6 = $_POST["question6"];
    $question7 = $_POST["question7"];

    // Process and save the signature image...
    // (same code as before)

    // Use prepared statement to insert data
    $insertSQL = "INSERT INTO ethic_form (submission_id, user_id, researcher_name, question1, question2, question3, question4, question5, question6, question7, signature_path, month,year ,submission_date, incremental)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($insertSQL);

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bind_param("sdssssssssssssd", $submissionId, $loggedInUserId, $researcherName, $question1, $question2, $question3, $question4, $question5, $question6, $question7, $signaturePath, $month ,$year ,$submissionDate, $nextIncremental);

        if ($stmt->execute()) {
            echo "Form submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>


<!-- ethic_database+_syntac -->