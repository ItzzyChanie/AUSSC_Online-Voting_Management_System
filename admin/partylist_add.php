<?php
	include 'includes/session.php';

	if (isset($_POST['add'])) {
		$description = $_POST['description'];
		$max_vote = $_POST['max_vote'];

		$sql = "SELECT * FROM partylist ORDER BY priority DESC LIMIT 1";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		$priority = $row['priority'] + 1;
		
		$sql = "INSERT INTO partylist (description, max_vote, priority) VALUES ('$description', '$max_vote', '$priority')";
		if ($conn->query($sql)) {
			$_SESSION['success'] = 'Partylist added successfully';
		}
		else {
			$_SESSION['error'] = $conn->error;
		}
	}
	else {
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: partylist.php');
?>