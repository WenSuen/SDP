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
    <h2>Feedbacks</h2>
    <table class="table table-hover">
            <thead>
                <tr>
                <th width='200px'>Student</td>
                <th width='220px'>Club</td>
                <th width='500px'>Feedback</td>
                </tr>
            </thead>
            <!-- taking from feedback table -->
            <?php
            $sql_query ="SELECT * FROM `feedback`";
            $result = mysqli_query($conn,$sql_query);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["to_club"] ?></td>
                    <td><?php echo $row["feedback"] ?></td>
                </tr>
            <?php }
            ?>
    </table>
    <br/><br/>
    <h2>Inquiries</h2>
    <table class="table table-hover">
            <thead>
                <tr>
                <th width='200px'>Student</td>
                <th width='220px'>Club</td>
                <th width='500px'>Inquiry</td>
                </tr>
            </thead>
            <!-- taking from feedback table -->
            <?php
            $sql_query ="SELECT * FROM `inquiries`";
            $result = mysqli_query($conn,$sql_query);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row["name"] ?></td>
                    <td><?php echo $row["to_club"] ?></td>
                    <td><?php echo $row["inquiry"] ?></td>
                </tr>
            <?php }
            ?>
    </table>
</body>
</html>