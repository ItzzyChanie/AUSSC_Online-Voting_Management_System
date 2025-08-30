<?php
require_once '../includes/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

if (isset($_POST['close_voting'])) {
    $now = date('Y-m-d H:i:s');
    $sql = "UPDATE election_schedule SET end_datetime=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $now);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Voting period closed successfully.";
    } 
    else {
        $_SESSION['error'] = "Failed to close voting period.";
    }
    $stmt->close();
    $conn->close();
    header("Location: index.php");
    exit();
}
?>
