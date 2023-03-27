<?php
include ("../connection.php");
include ("../utils.php");

if(isset($_POST['Update'])){
    $ID = $_POST['ID'];
    $Column = $_POST['Column'];
    $Replacement = esctxt($connection, $_POST['Replacement']);

    $query = "UPDATE students SET $Column = '$Replacement' WHERE ID = $ID";
    $results = $connection -> query($query);
    if($results){
        $_SESSION['alterstudent'] = "Student details altered";
        $_SESSION['alert'] = "alert-success";
        header("Location: ../../../students.php#alterstudent");
        exit();
    }else {
        $_SESSION['alterstudent'] = "Error editing student";
        $_SESSION['alert'] = "alert-danger";
        header("Location: ../../../students.php#alterstudent");
        exit();
    }
}
?>