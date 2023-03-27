<?php
session_start();
$ID = $_SESSION['ID'];
include ('connection.php');
include ('details.php');
include ('utils.php');

if (isset($_POST['updateImg'])) {
    
    if(!empty($_FILES)){
    	// timestamp and username rename previous filename
    	$Image = time() . '_' . $_FILES['profileImage'][''] . $Username . '.png';
        // delete previous profile picture
        $unlink = unlink('../uploads/'.$Imagedir);
        // close gaps with underscore
        $Imagedir = str_replace(' ', '_', $Image);
        // set profile src destination
        $Target = '../profile/' . $Imagedir;
        // move file to new destination
            if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $Target)) {
            // update the database    
            $queryImg = "UPDATE `students` SET `Imagedir` = '$Imagedir' WHERE `ID` = $ID";
            $resultImg = $connection -> query($queryImg);

                if ($resultImg) {
                    // profile update success
                    $_SESSION['profile'] = "Profile updated!";
                    $_SESSION['alert'] = "alert-success";
                    header("Location: ../../profile.php");
                    exit();
                } else {
                    // student database error
                    $_SESSION['profile'] = "Image directory error!";
                    $_SESSION['alert'] = "alert-danger";
                    header("Location: ../../profile.php");
                    exit();  
                }
            } else {
                // file destination error
                $_SESSION['profile'] = "file destination error!";
                $_SESSION['alert'] = "alert-danger";
                header("Location: ../../profile.php");
                exit();
            }
        } else {
            // if no image selected
            $_SESSION['profile'] = "Select image first!";
            $_SESSION['alert'] = "alert-danger";
            header("Location: ../../profile.php");
        }
} 

if (isset($_POST['removeImg'])) {
   	$queryImg = "UPDATE `students` SET `Imagedir` = '' WHERE `ID` = $ID";
   	$resultImg = $connection -> query($queryImg);

   	if ($resultImg) {
   		// profile image reset success
        $_SESSION['profile'] = "Profile image reset!";
        $_SESSION['alert'] = "alert-success";
        header("Location: ../../profile.php");
   	} else {
   		// if image reset failed
        $_SESSION['profile'] = "Reset failed!";
        $_SESSION['alert'] = "alert-danger";
        header("Location: ../../profile.php");
   	}
}   
    
if (isset($_POST['updateUsername'])) {
	$NewUsername = escTxt($connection, $_POST['Username']);
    // check for similarities
    $queryUsername = $connection->query(updatetable('students', 'Username', $NewUsername, $ID));
    if ($queryUsername== true){
        $_SESSION['updateUsername'] = "Username updated";
        $_SESSION['alert'] = "alert-success";
        header ("Location: ../../profile.php#username"); // redirect to home if valid
        exit();
    } else {
        $_SESSION['updateUsername'] = "Error ";
        $_SESSION['alert'] = "alert-danger";
        //header ("Location: ../../profile.php#username"); // redirect to home if valid
        exit();
    }
}

if (isset($_POST['updateEmail'])) {
	$NewEmail = escTxt($connection, $_POST['Email']);
    // check for similarities
    $queryUsername = $connection->query(updatetable('students', 'Email', $NewEmail, $ID));
    if ($queryUsername == true){
        $_SESSION['updateEmail'] = "Email updated";
        $_SESSION['alert'] = "alert-success";
        header ("Location: ../../profile.php#email"); // redirect to home if valid
        exit();
    } else {
        $_SESSION['updateUsername'] = "Error ";
        $_SESSION['alert'] = "alert-danger";
        //header ("Location: ../../profile.php#username"); // redirect to home if valid
        exit();
    }
}

if (isset($_POST['updatePassword'])) {
    $password = escTxt($connection, $_POST['Password']);
    $newPassword = escTxt($connection, $_POST['newPassword']);
    $hash = password_hash($newPassword, PASSWORD_BCRYPT);
    // check for similarities
    $queryPass = $connection->query("SELECT `Password` FROM `students` WHERE `ID` = $ID");
	if ($queryPass->num_rows > 0)
        $data = $queryPass->fetch_array();
        // check if user pass and db pass match hash
		if(password_verify($password, $data['Password'])){
            $queryPassword = $connection->query(updatetable('students', 'Password', $hash, $ID));
            if ($queryPassword == true){
                $_SESSION['updatePassword'] = "Password updated!";
                $_SESSION['alert'] = "alert-success";
                header ("Location: ../../profile.php#password"); // redirect to home if valid
                exit();
            } else {
                $_SESSION['updatePassword'] = "Error ";
                $_SESSION['alert'] = "alert-danger";
                header ("Location: ../../profile.php#password"); // redirect to home if valid
                exit();
            }
        }
}
?>