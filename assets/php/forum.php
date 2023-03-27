<?php
include ('connection.php');
include ('utils.php');

$query = "SELECT * FROM forum";
$result = $connection -> query($query);
$row = $result -> fetch_assoc();
$topic = $row['Topic'];
$date = $row['Date'];
$startime = $row['StartTime'];
$startdate = $row['StartDate'];
$id = $row['ID'];
?>