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
    $clubid = $_SESSION['Club_ID'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel='stylesheet' href='master.css'>
<link rel='shortcut icon' href="logo.png">
<title><?php echo $_SESSION['Club_Name']; ?> Homepage</title>
</head>

<body>
    <?php include ("club_header.html"); ?>
    <h1><center>Welcome, <?php echo $_SESSION['Club_Name']; ?></center></h1>
    <?php
           $sql_query ="SELECT * FROM club WHERE club_id = $clubid";
            $result = mysqli_query($conn,$sql_query);
            while ($row = mysqli_fetch_array($result)) {
    ?>
    <center><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['club_logo']).'"'; ?></center>
    <?php }
    ?>
    <h4><center>Refer to the header for all available functions.</center></h4>   
</body>
</html>