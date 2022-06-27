<?php
$servername = "localhost"; //127.0.0.1
$user = "root";
$password = "";
$dbase = "sdp_2007";

//establish a connection to mysql server
$conn = mysqli_connect($servername, $user, $password, $dbase);

// if connection to mysql server is error
if (!$conn) {
    // echo "Server Failed : " . mysqli_connect_error();
    die("Server Failed : " . mysqli_connect_error());
}
// else{
//     echo "Connection successful!";
// }
?>