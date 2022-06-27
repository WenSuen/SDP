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
    <!-- icon from bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <!--hover table for bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='shortcut icon' href="logo.png">
    <title>Events</title>
    <style>
        #sButton{
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <?php include ("admin_header.html") ?>
    <br/>
    <h2>Approve Events</h2>
    <table class="table table-hover">
            <thead>
                <tr>
                <th width='200px'>Event Name</td>
                <th width='220px'>Club</td>
                <th width='500px'>Description</td>
                <th width='100px'>Date</td>
                <th width='100px'>Start Time</td>
                <th width='100px'>End Time</td>
                <th width='100px'>Date Posted</td>
                </tr>
            </thead>
            <!-- taking from feedback table -->
            <?php
            $sql_query ="SELECT * FROM `events` WHERE `approval_status` = '0'";
            $result = mysqli_query($conn,$sql_query);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row["event_name"] ?></td>
                    <td><?php echo $row["club"] ?></td>
                    <td><?php echo $row["description"] ?></td>
                    <td><?php echo $row["date"] ?></td>
                    <td><?php echo $row["start_time"] ?></td>
                    <td><?php echo $row["end_time"] ?></td>
                    <td><?php echo $row["date_posted"] ?></td>
                </tr>
            <?php }
            ?>
    </table>
    <br/><br/>
    <h2>Unapproved Events</h2>
    <table class="table table-hover">
            <thead>
                <tr>
                <th width='200px'>Event Name</td>
                <th width='100px'>Club</td>
                <th width='300px'>Description</td>
                <th width='80'>Date</td>
                <th width='50'>Start Time</td>
                <th width='50'>End Time</td>
                <th width='80'>Date Posted</td>
                <th width='20px'>Approve</td>
                </tr>
            </thead>
            <!-- taking from feedback table -->
            <?php
            $sql_query ="SELECT * FROM `events` WHERE `approval_status` = '1'";
            $result = mysqli_query($conn,$sql_query);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <form>
                        <td><?php echo $row["event_name"] ?></td>
                        <td><?php echo $row["club"] ?></td>
                        <td><?php echo $row["description"] ?></td>
                        <td><?php echo $row["date"] ?></td>
                        <td><?php echo $row["start_time"] ?></td>
                        <td><?php echo $row["end_time"] ?></td>
                        <td><?php echo $row["date_posted"] ?></td>
                        <td>&emsp;<a href="approve_event.php?eventID=<?php echo $row["event_id"]; ?>"><button><i class='fa fa-thumbs-o-up' aria-hidden='true'></i></a></button> 
                        | 
                        <a href="disapprove_event.php?eventID=<?php echo $row["event_id"]; ?>"><button><i class='fa fa-thumbs-o-down' aria-hidden='true'></i></a></button></td>
                        <input name="eventid" type="hidden" value="<?php echo $row["event_id"] ?>">
                    </form>
                </tr>
            <?php }
            ?>
    </table>    
</body>
</html>