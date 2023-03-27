<?php
// check for notifications
$queryNotices = "SELECT `Title`, `Notice`, `Datetime` FROM `notification`";
$resultNotices = $connection -> query($queryNotices);
$rowNotices = $resultNotices ->fetch_assoc();
if (!empty($rowNotices)) {
	$Title = $rowNotices['Title'];
    $Notice = $rowNotices['Notice'];
    $Datetime = $rowNotices['Datetime'];
} else {
    $Notice = "Check later for updates";
}
?>