<?php
session_start();
include ('../connection.php');
include ('../utils.php');

if(isset($_POST['login'])){
$Username = esctxt($connection, $_POST["username"]);
$Password = esctxt($connection, $_POST["password"]);

// query the database for admin authentication
$queryLogin = "SELECT `ID` FROM `admin` WHERE `Username` = '$Username' AND `Password` = '$Password'";
$resultLogin = $connection -> query($queryLogin);
$rowLogin = $resultLogin -> fetch_assoc();
$ID = $rowLogin['ID'];

	// check to see if there is a valid result
	if ($rowLogin){
		if(isset($_SESSION['ID'])){
			session_destroy(); // end active session
			$_SESSION['ID'] = $ID; // create new session
			header ("Location: ../../../main.php"); // redirect to admin homepage
			exit();
		}else{
			$_SESSION['ID'] = $ID;
			header ("Location: ../../../main.php"); // redirect to home if valid
			exit();
        }
	}else {
		$_SESSION['alert'] = "alert-danger";
		$_SESSION['login'] = "Error logging you in!";
		header ("Location: ../../../login.php"); // redirect to login if invalid
		exit();
	}
}
?>