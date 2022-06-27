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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="listgrid.css">
    <link rel="stylesheet" href="master.css">
    <link rel='shortcut icon' href="logo.png">
    <title>Approve Registering Clubs</title>
</head>
<body>
    <?php include ("admin_header.html") ?>
    <?php
        $sql_query ="SELECT * FROM `club` WHERE `registration_status` = '1'";
        $result = mysqli_query($conn,$sql_query);   
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <div class="card">
            <form action="" method="post">
                <br/>
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['club_logo']).'" height="150" width="190">';?> 
                <h2><?php echo $row["club_name"];?></h2>
                <?php echo 'Username: ' . $row["u_sername"]; ?><br/>
                <?php echo 'Password: ' . $row["p_assword"]; ?><br/><br/>
                <a href="approve_club.php?clubID=<?php echo $row["club_id"]; ?>"><button>Approve&nbsp;<i class='fa fa-thumbs-o-up' aria-hidden='true'></i></a></button><br/><br/>
                <a href="disapprove_club.php?clubID=<?php echo $row["club_id"]; ?>"><button>Disapprove&nbsp;<i class='fa fa-thumbs-o-down' aria-hidden='true'></i></a></button>
                <input name="clubid" type="hidden" value="<?php echo $row["club_id"]; ?>">
            </form>
        </div>
    <?php }
    ?>
</body>
</html>