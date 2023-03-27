<?php
if(isset($_SESSION["ID"])) {
    $ID = $_SESSION["ID"];
    $queryDetails = "SELECT FirstName, LastName, Email, Gender, Username, Joined, LastEntry, Password, Imagedir FROM students WHERE ID = $ID";
    $resultDetails = $connection -> query($queryDetails);
    $rowDetails = $resultDetails -> fetch_assoc();
    $FirstName = $rowDetails['FirstName'];
    $LastName = $rowDetails['LastName'];
    $Email = $rowDetails['Email'];
    $Username = $rowDetails['Username'];
    $Gender = $rowDetails['Gender'];
    $Joined = $rowDetails['Joined'];
    $LastEntry = $rowDetails['LastEntry'];
    $Password = $rowDetails['Password'];
    $Imagedir = $rowDetails['Imagedir'];
    $_SESSION['FirstName'] = $FirstName;
}else{
    $_SESSION['error'] = "loginfirst";
    header ("Location: ../index.php"); // redirect to login if user didnt login
    exit();
}
?>