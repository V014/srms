<?php
if(isset($_SESSION["ID"])) {
  $ID = $_SESSION["ID"];
  // collect admin name
  $query = "SELECT `Username` FROM `admin` WHERE `ID` = $ID";
  $result = $connection -> query($query);
  $row = $result -> fetch_assoc();
  $Name = $row['Username'];
}else {
  $_SESSION['error'] = "loginfirst";
  header ("Location: ../../login.php"); // redirect to login if user didnt login
  exit();
}
?>