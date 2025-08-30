<?php
	include 'includes/session.php';

	if (isset($_POST['edit'])) {
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$position = $_POST['position'];
		$platform = $_POST['platform'];

		$stmt = $conn->prepare("UPDATE candidates SET firstname = ?, lastname = ?, position_id = ?, platform = ? WHERE id = ?");
		$stmt->bind_param("ssisi", $firstname, $lastname, $position, $platform, $id);

		if ($stmt->execute()) {
			$_SESSION['success'] = 'Candidate updated successfully';
		}
		else {
			$_SESSION['error'] = $stmt->error;
		}

		$stmt->close();
	}
	else {
		$_SESSION['error'] = 'Fill up edit form first';
	}
	header('location: candidates.php');
?>
