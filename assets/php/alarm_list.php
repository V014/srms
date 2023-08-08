<?php
$queryCom = "SELECT `client.Name`, `alarm.Status`, `alarm.Date` FROM alarm INNER JOIN Client ON client.ClientID = alarm.ClientID";
$resultCom = $connection -> query($queryCom);
?>