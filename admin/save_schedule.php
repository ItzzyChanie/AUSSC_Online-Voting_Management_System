<?php
require_once '../includes/conn.php'; // Adjust path as needed

session_start();

if (isset($_POST['save'])) {
    $start = date('Y-m-d H:i:s', strtotime($_POST['start_date']));
    $end = date('Y-m-d H:i:s', strtotime($_POST['end_date']));

    if(!$start || !$end){
        $_SESSION['error'] = 'Please fill in all fields.';
        header('location: index.php');
        exit();
    }
    
    if (strtotime($end) <= strtotime($start)) {
        $_SESSION['error'] = 'End date/time must be later than start date/time.';
        header('location: index.php');
        exit();
    }

    // Check if schedule exists
    $sql = "SELECT id FROM election_schedule LIMIT 1";
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Remove created_at from update query
        $stmt = $conn->prepare("UPDATE election_schedule SET start_datetime=?, end_datetime=? WHERE id=?");
        $stmt->bind_param("ssi", $start, $end, $row['id']);
    } 
    else {
        $stmt = $conn->prepare("INSERT INTO election_schedule (start_datetime, end_datetime) VALUES (?, ?)");
        $stmt->bind_param("ss", $start, $end);
    }
    
    if ($stmt->execute()) {
        $_SESSION['success'] = 'Election schedule saved.';
    } 
    else {
        $_SESSION['error'] = 'Failed to save schedule.';
    }

    $stmt->close();
    $conn->close();
    header('location: index.php');
    exit();
}

