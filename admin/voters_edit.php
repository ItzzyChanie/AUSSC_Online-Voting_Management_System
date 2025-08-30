<?php
	include 'includes/session.php';

	if (isset($_POST['edit'])) {
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM voters WHERE id = $id";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		if ($password == $row['password']) {
			$password = $row['password'];
		}
		// Store password as plain text

		$sql = "UPDATE voters SET firstname = '$firstname', lastname = '$lastname', password = '$password' WHERE id = '$id'";
		if ($conn->query($sql)) {
			$_SESSION['success'] = 'Voter updated successfully';
		}
		else {
			$_SESSION['error'] = $conn->error;
		}
	}
	else {
		$_SESSION['error'] = 'Fill up edit form first';
	}
	header('location: voters.php');

?>