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
    <link rel="stylesheet" href="master.css">
    <!--hover table for bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='shortcut icon' href="logo.png">
    <title>Events</title>
</head>
<body>
    <?php include ("admin_header.html") ?>
    <br/>
    <h2>Students</h2>
    <table class="table table-hover">
            <thead>
                <tr>
                <th width='20px'>Name</td>
                <th width='20px'>TP Number</td>
                <th width='50px'>Gender</td>
                <th width='100px'>Username</td>
                <th width='50px'>Password</td>
                <th width='50px'>Phone Number</td>
                </tr>
            </thead>
            <!-- taking from feedback table -->
            <?php
            $sql_query ="SELECT * FROM `students`";
            $result = mysqli_query($conn,$sql_query);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row["n_ame"] ?></td>
                    <td><?php echo $row["tp_number"] ?></td>
                    <td><?php echo $row["gender"] ?></td>
                    <td><?php echo $row["u_sername"] ?></td>
                    <td><?php echo $row["p_assword"] ?></td>
                    <td><?php echo $row["contact_number"] ?></td>
                </tr>
            <?php }
            ?>
    </table>
    <br/><br/>
    <h2>Joined Clubs</h2>
    <table class="table table-hover">
            <thead>
                <tr>
                <th width='20px'>Name</td>
                <th width='20px'>Joined Clubs</td>
                </tr>
            </thead>
            <!-- taking from feedback table -->
            <?php
            $sql_query ="SELECT * FROM `joined_clubs` ORDER BY `joined_clubs`.`student_name` ASC";
            $result = mysqli_query($conn,$sql_query);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row["student_name"] ?></td>
                    <td><?php echo $row["club_name"] ?></td>
                </tr>
            <?php }
            ?>
    </table>
</body>
</html>