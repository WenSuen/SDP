<?php
    include ('newheader.php');
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbase = "sdp_2007";

    //connect to server
    $conn = mysqli_connect($servername, $user, $password, $dbase);
    if(!$conn) {
        die("Server was not connected. Error Message: " . mysqli_connect_error());
    }
    $student_name = $_SESSION['user_name'];
    $sql_query ="SELECT * FROM joined_clubs WHERE student_name = '$student_name'";
    $event_query ="SELECT * FROM register_events WHERE user_name = '$student_name'";
    $result = mysqli_query($conn,$sql_query);
    $eventresult = mysqli_query($conn,$event_query);
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
    <title>Clubs and Events</title>
</head>
<body>
    <br/>
    <h2>Joined Clubs</h2>
    <table class="table table-hover">
            <thead>
                <tr>
                <th width='20px'>Name</td>
                <th width='20px'>Joined Clubs</td>
                </tr>
            </thead>
            <?php
            $sql_query ="SELECT * FROM `joined_clubs`  WHERE `student_name` ='$student_name'";
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
    <br/><br/>
    <h2>Joined Events</h2>
    <table class="table table-hover">
            <thead>
                <tr>
                <th width='20px'>Name</td>
                <th width='20px'>Joined Event</td>
                </tr>
            </thead>
            <?php
                while ($row = mysqli_fetch_array($eventresult)) {
            ?>
                <tr>
                    <td><?php echo $row["user_name"] ?></td>
                    <td><?php echo $row["event_name"] ?></td>
                </tr>
            <?php }
            ?>
    </table>
</body>
<?php include ('footer.html')?>
</html>