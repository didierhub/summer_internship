<?php
// notification_handler.php

// Include the database connection file
include('db_connection.php');

function getUnreadNotificationCount($userId) {
    global $conn;

    $unreadNotificationCountSQL = "SELECT COUNT(*) AS unread_count FROM notifications WHERE user_id = ? AND is_read = 0";
    $unreadNotificationCountStmt = $conn->prepare($unreadNotificationCountSQL);
    $unreadNotificationCountStmt->bind_param("i", $userId);
    $unreadNotificationCountStmt->execute();
    $unreadNotificationCountResult = $unreadNotificationCountStmt->get_result();
    $unreadNotificationCountRow = $unreadNotificationCountResult->fetch_assoc();
    
    return $unreadNotificationCountRow['unread_count'];
}

function getUnreadNotifications($userId) {
    global $conn;

    $unreadNotificationsSQL = "SELECT * FROM notifications WHERE user_id = ? AND is_read = 0 ORDER BY timestamp DESC";
    $unreadNotificationsStmt = $conn->prepare($unreadNotificationsSQL);
    $unreadNotificationsStmt->bind_param("i", $userId);
    $unreadNotificationsStmt->execute();
    $unreadNotificationsResult = $unreadNotificationsStmt->get_result();

    $unreadNotifications = array();
    while ($row = $unreadNotificationsResult->fetch_assoc()) {
        $unreadNotifications[] = $row;
    }

    return $unreadNotifications;
}

function markNotificationAsRead($notificationId) {
    global $conn;

    $markAsReadSQL = "UPDATE notifications SET is_read = 1 WHERE notification_id = ?";
    $markAsReadStmt = $conn->prepare($markAsReadSQL);
    $markAsReadStmt->bind_param("i", $notificationId);
    $markAsReadStmt->execute();
}

// You can define more functions related to notifications
?>
