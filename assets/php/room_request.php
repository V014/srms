<?php
session_start();
$ID = $_SESSION['ID'];
include ('connection.php');
include ('details.php');
include ('dashboard.php');
$Date = date('Y-m-d');
$Time = date('h:i:s');

if (isset($_POST['request'])) {
	// check if student already has a room
	if ($RoomID > 0 ) {
		$_SESSION['request'] = "room already allocated";
		$_SESSION['alert'] = "alert-danger";
		header ("Location: ../../room.php#request");
		exit();
	} else {
		$queryRoomRequest = "INSERT INTO requests VALUES(NULL, $ID, '$Date', '$Time')";
		$resultRoomRequest = $connection -> query($queryRoomRequest);
		if ($resultRoomRequest) {
		$_SESSION['request'] = "Room request pending";
		$_SESSION['alert'] = "alert-success";
		header ("Location: ../../room.php#request");
		exit();
		}
	}
}

if (isset($_POST['cancel'])) {
	// check if student already has a room
	if (isset($RoomID)) {
		$_SESSION['request'] = "Room already allocated";
		$_SESSION['alert'] = "alert-danger";
		header ("Location: ../../room.php#request");
		exit();
	} else {
		$queryCancelRequest = "DELETE FROM requests WHERE StudentID = $ID";
		$resultCancelRequest = $connection -> query($queryCancelRequest);
		if ($resultCancelRequest) {
		$_SESSION['request'] = "Room request canceled";
		$_SESSION['alert'] = "alert-success";
		header ("Location: ../../room.php#request");
		exit();
		}
	}
}
?>