<?php
$queryStudents = "SELECT ID, FirstName, LastName, Gender, Email, Balance FROM students";
$resultStudents = $connection -> query($queryStudents);
?>