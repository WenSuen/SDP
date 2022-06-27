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

    $delete_query = "DELETE FROM `events` WHERE (`event_id`) = ('$eventid')";
    $deleted = mysqli_query($conn,$delete_query);
    echo "<script>alert('Event rejected!')</script>";
    echo "<script>window.location.href = 'edit_event.php'</script>";
?>