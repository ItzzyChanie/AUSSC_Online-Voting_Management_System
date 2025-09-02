<?php
	include 'includes/session.php';

	if (isset($_POST['add'])) {
		$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
		$student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$filename = mysqli_real_escape_string($conn, $_FILES['photo']['name']);
		
		if (!empty($filename)) {
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}

		$sql = "INSERT INTO voters (student_id, password, firstname, lastname, photo) VALUES ('$student_id', '$password', '$firstname', '$lastname', '$filename')";
		
		if ($conn->query($sql)) {
			$_SESSION['success'] = 'Voter added successfully';
		}
		else{ 
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: voters.php');
?>