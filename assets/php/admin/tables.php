<?php
include ('assets/php/connection.php');

// collect information of students
$query = "SELECT * FROM students";
$result = $connection -> query($query);

// collect information of requests
$query2 = "SELECT students.ID, requests.StudentID, FirstName, LastName, Gender FROM requests INNER JOIN students ON requests.StudentID = students.ID";
$result2 = $connection -> query($query2);

// collect information of boys room
$query3 = "SELECT StudentID, RoomID, FirstName, LastName FROM student_rooms INNER JOIN students ON student_rooms.StudentID = students.ID WHERE Gender = 'Male'";
$result3 = $connection -> query($query3);

// collect information of girls room
$query4 = "SELECT StudentID, RoomID, FirstName, LastName FROM student_rooms INNER JOIN students ON student_rooms.StudentID = students.ID WHERE Gender = 'Female'";
$result4 = $connection -> query($query4);

// collect information of leavers table
$query5 = "SELECT leaving.StudentID, FirstName, LastName, Reason, Explanation FROM leaving INNER JOIN students ON leaving.StudentID = students.ID";
$result5 = $connection -> query($query5);

// collect student count
$query6 = "SELECT COUNT(ID) FROM students";
$result6 = $connection -> query($query6);

// collect boy count
$query7 = "SELECT COUNT(student_rooms.StudentID) FROM student_rooms INNER JOIN students ON student_rooms.StudentID = students.ID WHERE Gender = 'Male'";
$result7 = $connection -> query($query7);

// collect girl count
$query8 = "SELECT COUNT(student_rooms.StudentID) FROM student_rooms INNER JOIN students ON student_rooms.StudentID = students.ID WHERE Gender = 'Female'";
$result8 = $connection -> query($query8);

// collect request count
$query9 = "SELECT COUNT(ID) FROM requests";
$result9 = $connection -> query($query9);

// collect leavers count
$query10 = "SELECT COUNT(ID) FROM leaving";
$result10 = $connection -> query($query10);

// collect feedback information
$query11 = "SELECT * FROM feedback";
$result11 = $connection -> query($query11);

// collect notice board posts
$query12 = "SELECT * FROM `notification`";
$result12 = $connection -> query($query12);

?>