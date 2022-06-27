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
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="master.css">
    <link rel='shortcut icon' href="logo.png">
    <title>Admin Homepage</title>
    <style>
        .bg{
            display: block;
	        margin-left: auto;
	        margin-right: auto;
            width: 700px;
            opacity: 0.6;
        }
    </style>
</head>
<body>
    <?php include ("admin_header.html"); ?>
    <h1><center>Admin Page, where all the details are at!</center></h1>
    <h3><center>Welcome, <?php echo $_SESSION['Admin_Name']; ?>!</center></h3>
    <img src="logo.png" class="bg">
    <h4><center>Refer to the header for all available functions.</center></h4>   
</body>
</html>