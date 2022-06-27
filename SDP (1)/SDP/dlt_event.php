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

    $event_id = $_GET['event_id'];

    $delete_query = "DELETE FROM `events` WHERE (`event_id`) = ('$event_id')";
    $deleteee = mysqli_query($conn,$delete_query);
    header("location: event_list.php");
?>