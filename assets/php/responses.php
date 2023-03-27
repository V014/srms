<?php
if(isset($_SESSION['leave'])){ 

    if($_SESSION['leave'] === "leave-success"){
        $reply = "Leave request sent!";
    }

    if($_SESSION["leave"] === "leave-error"){
        $reply = "Leave request error!";
    }

    if($_SESSION["leave"] === "leave-pending"){
        $reply = "Leave request error!";
    }
}

if (isset($_SESSION['abort'])) {
    if($_SESSION["abort"] === "leave-aborted"){
        $reply = "Leave request aborted!";
    }

    if($_SESSION["abort"] === "abort-error"){
        $reply = "Aborted error!";
    }

    if($_SESSION["abort"] === "empty-abort"){
        $reply = "Nothing to abort!";
    }
}
///////////////////////////////////////////////////////
if (isset($_SESSION['request'])) {
    if($_SESSION["request"] === "room-allocated"){
        $reply = "You already have a room!";
    }

    if($_SESSION["request"] === "request-sent"){
        $reply = "Your request in pending!";
    }

    if($_SESSION["request"] === "request-canceled"){
        $reply = "Your request has been canceled!";
    }
}

?>