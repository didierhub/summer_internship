
        <?php
        require_once 'db_connection.php'; // Include your database connection script

        $loggedInUserId = getLoggedInUserId(); // Implement a function to get the logged-in user's ID

        // Retrieve and display form details
        $formDetailsQuery = "SELECT comment, form_status FROM ethic_form WHERE user_id = ?";
        $formDetailsStmt = $conn->prepare($formDetailsQuery);
        $formDetailsStmt->bind_param("i", $loggedInUserId);
        $formDetailsStmt->execute();
        $formDetailsResult = $formDetailsStmt->get_result();

        if ($formDetailsResult) {
            while ($formDetailsRow = $formDetailsResult->fetch_assoc()) {
                $comment = $formDetailsRow['comment'];
                $formStatus = $formDetailsRow['form_status'];
                echo "Comment: $comment | Form Status: $formStatus<br>";
            }
            
            // Decrement form count
            $decrementQuery = "UPDATE users SET form_count = form_count - 1 WHERE user_id = ?";
            $decrementStmt = $conn->prepare($decrementQuery);
            $decrementStmt->bind_param("i", $loggedInUserId);
            $decrementStmt->execute();
            $decrementStmt->close();
        }

        $formDetailsStmt->close();
        $conn->close();


        
        ?>