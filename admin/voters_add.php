<?php
	include 'includes/session.php';

	if (isset($_POST['add'])) {
		$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
		$student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
		$student_level = mysqli_real_escape_string($conn, $_POST['student_level']);
		$course = mysqli_real_escape_string($conn, $_POST['course']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$filename = mysqli_real_escape_string($conn, $_FILES['photo']['name']);

		// Hash the password before saving
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		if (!empty($filename)) {
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}

		$sql = "INSERT INTO voters (firstname, lastname, student_id, student_level, course, password, photo)
				VALUES ('$firstname', '$lastname', '$student_id', '$student_level', '$course', '$hashed_password', '$filename')";
		
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