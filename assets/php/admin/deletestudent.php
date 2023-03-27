<?php
session_start();
include ('../connection.php');
if(isset($_POST['delete'])){
    $ID = $_POST['ID'];
    $queryDeleteStudent = "DELETE FROM students WHERE ID = $ID";
    $resultsDeleteStudent = $connection -> query($queryDeleteStudent);
    if($resultsDeleteStudent){
        $_SESSION['deletestudent'] = "Student deleted";
        $_SESSION['alert'] = "alert-success";
        header("Location: ../../../students.php#deletestudent");
        exit();
    }else {
        $_SESSION['deletestudent'] = "Failed to delete Student";
        $_SESSION['alert'] = "alert-danger";
        header("Location: ../../../students.php#deletestudent");
        exit();
    }
}
?>