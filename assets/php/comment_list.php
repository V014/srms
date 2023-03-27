<?php
$queryCom = "SELECT `Username`, `Email`, `Comment`, c.Time, f.Date, `Likes` FROM `Comments` AS c INNER JOIN forum AS f ON f.ID = c.ForumID WHERE `visibility` = 'visible'";
$resultCom = $connection -> query($queryCom);
?>