<?php
    session_start();
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
    <link rel="stylesheet" href="master.css">
    <link rel='shortcut icon' href="logo.png">
    <!-- icon from bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <!--hover table for bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Club Feedback and Inquiriries</title>
</head>
<body>
    <?php include ("club_header.html") ?>
    <br/>
    <h2>Feedback and Inquiries</h2>
    <table class="table table-hover">
            <thead>
                <tr>
                <th width='20px'>Name</td>
                <th width='100px'>Feedback</td>
                </tr>
            </thead>
            <!-- taking from feedback table -->
            <?php
            $sql_query ="SELECT * FROM feedback WHERE to_club = '".$_SESSION['Club_Name']."'";
            $result = mysqli_query($conn,$sql_query);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["feedback"] ?></td>
                </tr>
            <?php }
            ?>
    </table>
    <br/>
    <table class="table table-hover">
            <thead>
                <tr>
                <th width='20px'>Name</td>
                <th width='100px'>Inquiries</td>
                </tr>
            </thead>
            <!-- taking from feedback table -->
            <?php
            $sql_query ="SELECT * FROM inquiries WHERE to_club = '".$_SESSION['Club_Name']."'";
            $result = mysqli_query($conn,$sql_query);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["inquiry"] ?></td>
                </tr>
            <?php }
            ?>
    </table>
    <?php include ('footer.html')?>
</body>
</html>