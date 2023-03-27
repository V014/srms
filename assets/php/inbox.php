<?php
$ID = $_SESSION['ID'];
// look  in inbox
$queryInbox = "SELECT RSID, `Message`, Response, `Sent`, Reply FROM `messages` WHERE SSID = $ID";
$resultInbox = $connection -> query($queryInbox);
$rowInbox = $resultInbox -> fetch_assoc();
$RecieverID = $rowInbox['RSID'];
?>