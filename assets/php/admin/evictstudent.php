<?php
include ('connection.php');
include ('utils.php');

if (isset($_POST['evict'])) {
    $StudentID = esctxt($connection, $_POST['studentID']);
    $queryEviction = "UPDATE student_rooms SET RoomID = $RoomID WHERE StudentID = $StudentID";
    $resultEviction = $connection -> query($queryEviction);

    if ($resultEviction) {
        $_SESSION['evictstudent'] = "Student Evicted!"
        $_SESSION['alert'] = "alert-success";
        header("Location: ../../../dorms.php#evictstudent");
        exit();
    } else {
        $_SESSION['evictstudent'] = "Student Eviction Error!"
        $_SESSION['alert'] = "alert-danger";
        header("Location: ../../../dorms.php#evictstudent");
        exit();
    }
}
?>