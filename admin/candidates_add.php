<?php
	include 'includes/session.php';

	if (isset($_POST['add'])) {
		$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
		$position = mysqli_real_escape_string($conn, $_POST['position']);
		$platform = mysqli_real_escape_string($conn, $_POST['platform']);
		$filename = mysqli_real_escape_string($conn, $_FILES['photo']['name']);
		$partylist = $_POST['partylist']; // This should be the description, not the id

		if (!empty($filename)) {
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}

		$sql = "INSERT INTO candidates (position_id, firstname, lastname, partylist, photo, platform) 
				VALUES ('$position', '$firstname', '$lastname', '$partylist', '$filename', '$platform')";
		
		if($conn->query($sql)) {
			$_SESSION['success'] = 'Candidate added successfully';
		}
		else {
			$_SESSION['error'] = $conn->error;
		}
	}
	else {
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: candidates.php');
?>