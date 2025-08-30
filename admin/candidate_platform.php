<?php
include 'includes/conn.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT platform, firstname, lastname FROM candidates WHERE id='$id'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        $row = $query->fetch_assoc();
        echo '<h4><b>'.$row['firstname'].' '.$row['lastname'].'</b></h4>';
        echo '<p>'.$row['platform'].'</p>';
    } 
    else {
        echo '<p>No platform information found.</p>';
    }
} 
else {
    echo '<p>Invalid request.</p>';
}
?>
