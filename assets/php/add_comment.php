<?php
session_start();
$ID = $_SESSION['ID'];
include ('connection.php');
include ('details.php');
include ('utils.php');

$Message = esctxt($connection, $_POST['message']);
$forum = esctxt($connection, $_POST['forum']);
$Date = date("Y-m-d");
$Time = date("h:i:sa");

if (!empty($Message)) {
	$queryCom = "INSERT INTO `comments` VALUES(NULL, '$forum', '$Username', '$Email', '$Message', '$Date', '$Time', '')";
	$resultCom = $connection -> query($queryCom);

	if ($resultCom) {
		$_SESSION['reply'] = "Comment posted";
		$_SESSION['alert'] = "alert-success";
		header("Location: ../../forum.php#feed");
	} else {
		$_SESSION['reply'] = "Failed to post";
		$_SESSION['alert'] = "alert-danger";
		header("Location: ../../forum.php#feed");
	}	
} else {
	$_SESSION['reply'] = "Write something first!";
	$_SESSION['alert'] = "alert-danger";
	header("Location: ../../forum.php#feed");
}

?>