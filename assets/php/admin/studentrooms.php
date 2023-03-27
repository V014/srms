<?php
$queryStudentRoom = "SELECT FirstName, LastName, r.Gender, RoomID, r.Name FROM students AS s INNER JOIN student_rooms AS sr ON s.ID = sr.StudentID INNER JOIN rooms AS r ON r.ID = sr.RoomID ORDER BY RoomID ASC";
$resultStudentRoom = $connection -> query($queryStudentRoom);
?>