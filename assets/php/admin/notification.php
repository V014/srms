<?php

include ('../connection.php');

if(isset($_POST['Notify'])){
    $NoticeID = $_POST['NoticeID'];
    $Message = $_POST['Message'];
    $query = "INSERT INTO `notification`(`NoticeID`, `Notice`) VALUES (NULL, '$Message')";
    $result = $connection -> query($query);

    if($result){
        echo("<script>alert('Your notification has been sent to the students')</script>");
        header ("refresh: 0; url=home.php#dorms"); // redirect to home
    }else{
        echo("<script>alret('Failed to send notification to students')</script>");
        header ("refresh: 0; url=home.php#dorms"); // redirect to home
    }
}

if(isset($_POST['Delete'])){
$query2 = "SELECT `Notice` FROM `notification`";
$result2 = $connection -> query($query2);
$row2 = $result2 -> fetch_assoc();
$Notice = $row2['Notice'];

    if(!empty($Notice)){
        if(isset($_POST['Delete'])){
            $query3 = "DELETE FROM `notification`";
            $result3 = $connection -> query($query3);
        
            if($result3){
                echo("<script>alert('Last notification has been successfully cancelled!')</script>");
                header ("refresh: 0; url=home.php#dorms"); // redirect to home
            }else{
                echo("<script>alert('Failed to cancel last notification please debug code!')</script>");
                header ("refresh: 0; url=home.php#dorms"); // redirect to home
            }
        }
    }else{
        echo("<script>alert('You havent sent any notifications.')</script>");
        header ("refresh: 0; url=home.php#dorms"); // redirect to home
    }
}

?>