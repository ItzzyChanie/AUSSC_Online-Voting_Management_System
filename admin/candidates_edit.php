<?php
	include 'includes/session.php';

	if (isset($_POST['edit'])) {
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$position = $_POST['position'];
		$platform = $_POST['platform'];
		$partylist = $_POST['partylist']; // This should be the description, not the id

		$sql = "UPDATE candidates 
				SET position_id='$position', 
				firstname='$firstname', 
				lastname='$lastname', 
				partylist='$partylist', 
				platform='$platform' 
				WHERE id='$id'";
				
		if ($conn->query($sql)) {
			$_SESSION['success'] = 'Candidate updated successfully';
		}
		else {
			$_SESSION['error'] = $conn->error;
		}
	}
	else {
		$_SESSION['error'] = 'Fill up edit form first';
	}
	header('location: candidates.php');
?>
