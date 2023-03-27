<?php
 $queryRequests = "SELECT r.ID, StudentID, FirstName, LastName, Gender, Date FROM requests AS r INNER JOIN students AS s ON r.StudentID = s.ID";
$resultRequests = $connection -> query($queryRequests);
?>