<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection file
require_once 'midleware.php';
include('db_connection.php');

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
    
    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        return false;
    }

    $stmt->bind_param("ss", $year, $month);
    if (!$stmt->execute()) {
        echo "Error executing statement: " . $stmt->error;
        return false;
    }

    $result = $stmt->get_result();
    if (!$result) {
        echo "Error getting result: " . $stmt->error;
        return false;
    }

    $row = $result->fetch_assoc();
    if ($row === null) {
        return 1; // No records found, start from 1
    }

    $maxIncremental = $row['max_incremental'];
    return ($maxIncremental !== null) ? ($maxIncremental + 1) : 1;
}


// Get current date and time
$submissionDate = date('Y-m-d');         // Current date in YYYY-MM-DD format
$submissionTime = date('H:i:s');         // Current time in HH:MM:SS format

// Calculate the next incremental value
$nextIncremental = getNextIncrementalValue($conn, $year, $month);

// Create the primary key
$primaryKey = $year . $month . str_pad($nextIncremental, 3, '0', STR_PAD_LEFT);

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

    // Process and save the signature image
    if (isset($_POST["signatureData"])) {
        $signatureData = $_POST["signatureData"];
        $signatureData = str_replace('data:image/png;base64,', '', $signatureData);
        $signatureData = base64_decode($signatureData);

        // Create the directory if it doesn't exist
        $signatureDirectory = 'signature_images/';
        if (!is_dir($signatureDirectory)) {
            mkdir($signatureDirectory, 0777, true); // 0777 provides full permissions, adjust as needed
        }

        // Generate a unique filename for the signature image
        $signatureFileName = uniqid() . '.png';
        $signaturePath = $signatureDirectory . $signatureFileName;

        // Save the signature image to the specified path
        file_put_contents($signaturePath, $signatureData);
    }

    // Use prepared statement to insert data
    $insertSQL = "INSERT INTO ethic_form (id, user_id, researcher_name, question1, question2, question3, question4, question5, question6, question7, signature_path, submission_date, submission_time, year, month, incremental)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($insertSQL);

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bind_param("sdssssssssssssss", $primaryKey, $loggedInUserId, $researcherName, $question1, $question2, $question3, $question4, $question5, $question6, $question7, $signaturePath, $submissionDate, $submissionTime, $year, $month, $nextIncremental);


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


database code
  <!-- MySQL returned an empty result set (i.e. zero rows). (Query took 0.0003 seconds.) -->
<!-- CREATE TABLE ethic_form ( submission_id VARCHAR(20) PRIMARY KEY, user_id INT NOT NULL, researcher_name VARCHAR(255), question1 VARCHAR(255), question2 VARCHAR(255), question3 VARCHAR(255), question4 VARCHAR(255), question5 VARCHAR(255), question6 VARCHAR(255), question7 VARCHAR(255), signature_path VARCHAR(255), month INT, year INT, submission_date DATE, CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES users(id) -- Replace 'users' with the actual users table name ); -->
