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

    $clubid = $_GET['clubID'];

    $delete_query = "DELETE FROM `club` WHERE `club_id`='$clubid'";
    if($deleted = mysqli_query($conn,$delete_query)) {;
        echo "<script>alert('Club rejected!')</script>";
        echo "<script>window.location.href = 'edit_clubs.php'</script>";
    }
?>