<?php

// session_start(); // Start the session

// // Check if the user is logged in and is an admin
// if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') {
//     // Allow access to the admin-only page
// } else {
//     // Redirect or show an access denied message
//     header("Location: index.php"); // Redirect to a page indicating access denied
//     exit(); // Stop further script execution
// }

// Include the database connection file
require_once 'db_connection.php'; // Include your database connection script
require_once 'midleware.php';



// Query to fetch all user information
$select_query = "SELECT * FROM users";
$result = $conn->query($select_query);

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/table_style.css"> <!-- Replace with your CSS file path -->
    <title>User Information</title>
</head>

<body>
    <div class="container">
        <h1>User Information</h1>

        <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>user role</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row["user_id"]; ?></td>
                <td><?php echo $row["first_name"]; ?></td>
                <td><?php echo $row["last_name"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["user_role"]; ?></td>

            </tr>
            <?php endwhile; ?>

        </table>
        <?php else: ?>
        <p>No records found.</p>
        <?php endif; ?>
    </div>
</body>

</html>
