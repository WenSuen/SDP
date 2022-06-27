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

    $clubname = $_SESSION['Club_Name'];
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
    <title>Upcoming Events</title>
</head>
<body>
    <?php include ("club_header.html") ?>
    <br/>
    <h2>Upcoming Events</h2>
    <table class="table table-hover">
            <thead>
                <tr>
                <th width='20px'>Event Name</td>
                <th width='100px'>Description</td>
                <th width='50px'>Date</td>
                <th width='50px'>Start Time</td>
                <th width='50px'>End Time</td>
                <th width='10px'>Date Posted</td>
                </tr>
            </thead>
            <!-- taking from feedback table -->
            <?php
           $sql_query ="SELECT * FROM events WHERE club = '$clubname'";
            $result = mysqli_query($conn,$sql_query);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row["event_name"] ?></td>
                    <td><?php echo $row["description"] ?></td>
                    <td><?php echo $row["date"] ?></td>
                    <td><?php echo $row["start_time"] ?></td>
                    <td><?php echo $row["end_time"] ?></td>
                    <td><?php echo $row["date_posted"] ?></td>
                </tr>
            <?php }
            ?>
    </table>
    <?php include ('footer.html')?>
</body>
</html>