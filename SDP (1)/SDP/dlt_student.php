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

    $delete_query = "DELETE FROM `students` WHERE (`student_id`) = ('$student_id')";
    $deleteee = mysqli_query($conn,$delete_query);
    header("location: edit_student.php");
?>