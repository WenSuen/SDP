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

    $student_id = $_GET['student_id'];

    $delete_query = "DELETE FROM `joined_clubs` WHERE (`joined_id`) = ('$joined_id')";
    $deleteee = mysqli_query($conn,$delete_query);
    header("location: member_list.php");
?>