<?php
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbase = "sdp_2007";

    //connect to server
    $conn = mysqli_connect($servername, $user, $password, $dbase);
    if(!$conn) {
        die("Server was not connected. Error Message: " . mysqli_connect_error());
    }

    $eventid = $_GET['eventID'];

    $update_query = "UPDATE `events` SET `approval_status`='0' WHERE `event_id` = '$eventid'";
    $approved = mysqli_query($conn,$update_query);
    header("location: edit_event.php");
?>