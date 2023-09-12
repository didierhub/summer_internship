
<?php
        require_once 'midleware.php'; 
        $loggedInUserId = getLoggedInUserId(); // Implement a function to get the logged-in user's ID
        $userFullName = getUserFullName($loggedInUserId);
        // Retrieve the form count for the logged-in user
        $userCountQuery = "SELECT form_count FROM users WHERE user_id = ?";
        $userCountStmt = $conn->prepare($userCountQuery);
        $userCountStmt->bind_param("i", $loggedInUserId);
        $userCountStmt->execute();
        $userCountResult = $userCountStmt->get_result();

        if ($userCountResult && $userCountRow = $userCountResult->fetch_assoc()) {
            $formCount = $userCountRow['form_count'];
           
        }

        $userCountStmt->close();
      
 ?>