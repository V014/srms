<?php
include ('../connection.php');
include ('../utils.php');

if (isset($_POST['swap'])) {
	$StudentID = esctxt($connection, $_POST['studentID']);
	$RoomID = $_POST['roomID'];
	$querySwap = "UPDATE student_rooms SET RoomID = $RoomID WHERE StudentID = $StudentID";
	$resultSwap = $connection -> query($querySwap);

	if ($resultSwap) {
		$_SESSION['swapstudentroom'] = "Room swap successful"
		$_SESSION['alert'] = "alert-success";
		header("Location: ../../../dorms.php#swapstudentroom");
		exit();
	} else {
		$_SESSION['swapstudentroom'] = "Room swap error"
		$_SESSION['alert'] = "alert-danger";
		header("Location: ../../../dorms.php#swapstudentroom");
		exit();
	}
}
?>