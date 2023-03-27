<?php
session_start();
include ('connection.php');
if(isset($_POST['Signup'])){
	 // store field data in variables
	$Email = $_POST["Email"];
	$Password = $_POST["Password"];
	$FirstName = $_POST["FirstName"];
	$LastName = $_POST["LastName"];
	$Gender = $_POST["Gender"];
	$Username = $_POST['Username'];
	$Date = Date("Y-m-d");
	// check if any of the details are identical
	$query = "SELECT `Email`, `Username` FROM `students`";
	$result = $connection -> query($query);
	while($row = $result -> fetch_assoc()){
		$UsedEmail = $row['Email'];
		$UsedUsername = $row['Username'];
	}
	// if their email is already in the db tell the student
	if($Email == $UsedEmail){
		echo "<script>alert('Similar address found, use a unique one!')</script>";
		header ("refresh: 0; url=../student/signup.php"); // redirect user to home page
		exit();
	}else if($Username == $UsedUsername){
		echo "<script>alert('Similar username found, use a unique one!')</script>";
		header ("refresh: 0; url=../student/signup.php"); // redirect user to home page
		exit();
	}else{
		// insert the user's data into the db
		$query1 = "INSERT INTO students VALUES (null, '$FirstName', '$LastName', '$Email', '$Gender', '$Username', '$Password', 0, '$Date')";
		$result1 = $connection -> query($query1);
		// if query and connection are right
		if ($result1) { 
			header ("refresh: 0; url=../student/home.php"); // redirect user to home page
			exit();
		} else{
			echo "<script>alert('Signup failed, try again later')</script>";
			header ("refresh: 0; url=../student/signup.php");
			exit();
		}
	}
	$query2 = "SELECT `ID` FROM `students` WHERE `Email` = '$Email'";
	$result2 = $connection -> query($query2);
	$row2 = $result2 -> fetch_assoc();
	$ID = $row2['ID'];
	// store student ID in a sesson
	$_SESSION['ID'] = $ID;
}
?>