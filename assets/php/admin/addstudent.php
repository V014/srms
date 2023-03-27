<?php
include ('../connection.php');
include ('../utils.php');

if(isset($_POST['add'])){
	 // store field data in variables
	$Email = esctxt($connection, $_POST["Email"]);
	$Password = esctxt($connection, $_POST["Password"]);
	$hash = password_hash($Password, PASSWORD_BCRYPT);
	$FirstName = esctxt($connection, $_POST["FirstName"]);
	$LastName = esctxt($connection, $_POST["LastName"]);
	$Gender = esctxt($connection, $_POST["Gender"]);
    $Username = esctxt($connection, $_POST['Username']);
    $Date = Date("Y-m-d");

	// check if any of the details are identical
	$queryCheckStudent = "SELECT Email, Username FROM students WHERE Username LIKE '%$Username%' AND Email LIKE '%$Email%'";
	$resultCheckStudent = $connection -> query($queryCheckStudent);
	while($rowCheckStudent = $resultCheckStudent -> fetch_assoc()){
		$UsedEmail = $rowCheckStudent['Email'];
		$UsedUsername = $rowCheckStudent['Username'];
	}
	// if their email is already in the db tell the student
	if($Email === $UsedEmail){
		$_SESSION['addstudent'] = "Similar credentials found";
		$_SESSION['alert'] = "alert-danger";
		header ("Location: ../../../students.php#addstudent"); // redirect user to home page
		exit();
	}else if($Username === $UsedUsername){
		$_SESSION['addstudent'] = "Similar credentials found";
		$_SESSION['alert'] = "alert-danger";
		header ("Location: ../../../students.php#addstudent"); // redirect user to home page
		exit();
	}else{
		// insert the user's data into the db
		$queryAddStudent = "INSERT INTO students VALUES (NULL, '$FirstName', '$LastName', '$Email', '$Gender', '$Username', '$hash', 0, '$Date', '00:00:00', NULL)";
		$resultAddStudent = $connection -> query($queryAddStudent);
		// if query and connection are right
		if ($resultAddStudent) { 
			$_SESSION['addstudent'] = "Student added";
			$_SESSION['alert'] = "alert-success";
			header ("Location: ../../../students.php#addstudent"); // redirect user to home page
			exit();
		} else{
			$_SESSION['addstudent'] = "Error adding student";
			$_SESSION['alert'] = "alert-danger";
			header ("Location: ../../../students.php#addstudent"); // redirect user to home page
			exit();
		}
	}
}
?>