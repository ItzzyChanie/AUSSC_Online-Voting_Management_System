<?php
	include 'includes/session.php';

	if (isset($_POST['delete'])) {
		$id = $_POST['id'];
		$sql = "DELETE FROM partylist WHERE id = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('i', $id);
		
		if($stmt->execute()){
			$_SESSION['success'] = 'Partylist deleted successfully';
		} 
		else {
			$_SESSION['error'] = 'Something went wrong in deleting partylist';
		}
		$stmt->close();
	} 
	else {
		$_SESSION['error'] = 'Select item to delete first';
	}
	header('location: partylist.php');
?>