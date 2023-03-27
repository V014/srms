<?php
include ('../connection.php');
include ('../utils.php');

if(isset($_POST['addforum'])){
    $topic = esctxt($connection, $_POST['topic']);
    $date = $_POST['date'];
    $time = $_POST['time'];
    date_default_timezone_set("Africa/Blantyre");
    $Date = date('Y-m-d');
    
    $queryForum = $connection->query("INSERT INTO `forum` VALUES(NULL, '$topic', '$date', '$time', '$Date')");
    if ($queryForum == true)
        $_SESSION['addforum'] = "Topic posted!";
        $_SESSION['alert'] = "alert-success";
        header ("Location: ../../converse.php#forum"); // redirect to login if invalid
        exit();
}

if(isset($_POST['deleteforum'])){
    $queryForumDelete = $connection->query("UPDATE forum SET `visibility` = 'hidden'");
    if ($queryForumDelete == true)
        $_SESSION['deleteforum'] = "Topic taken down!";
        $_SESSION['alert'] = "alert-success";
        header ("Location: ../../converse.php#deleteforum"); // redirect to login if invalid
        exit();
    }else{
        $_SESSION['deleteforum'] = "Error!";
        $_SESSION['alert'] = "alert-danger";
        header ("Location: ../../converse.php#deleteforum"); // redirect to login if invalid
        exit();
    }

?>