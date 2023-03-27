<?php
$query = "SELECT COUNT(ID) FROM `requests`";
$result = $connection -> query($query);
$row = $result -> fetch_assoc();
if($row){
    $badges = $row['COUNT(ID)'];
}
?>