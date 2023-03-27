<?php
$queryFeedbackReply = "SELECT f.Message, f.Date, f.Time, Response FROM feedback AS f INNER JOIN reply AS r ON f.ID = r.FeedbackID WHERE StudentID = $ID";
$resultFeedbackReply = $connection -> query($queryFeedbackReply);
?>