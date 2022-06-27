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

    $update_query = "UPDATE `club` SET `registration_status`='0' WHERE `club_id` = '$clubid'";
    if($approved = mysqli_query($conn,$update_query)){;
        echo "<script>alert('Club accepted!')</script>";
        echo "<script>window.location.href = 'edit_clubs.php'</script>";
    }
?>