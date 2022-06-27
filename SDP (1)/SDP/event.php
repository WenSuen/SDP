<?php
    include('newheader.php');
    include('db.php');

    $sql_query = "SELECT * FROM `events`";
    $result = mysqli_query($conn, $sql_query);

    //connect to server
    $conn = mysqli_connect($servername, $user, $password, $dbase);
    if(!$conn) {
        die("Server was not connected. Error Message: " . mysqli_connect_error());
    }

    // start the session if it is not set
    if(!isset($_SESSION)){
        session_start();
    }
    // get the user's id from the URL
    $u_sername = $_SESSION['u_sername'];
    // sql query to retrieve club's data from database based on user's id
    $query = "SELECT * FROM `students` WHERE u_sername = '$u_sername'";
    // store the sql query result in a variable
    $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="mainpage.css">
    <link rel="stylesheet" href="master.css">
    <link rel='shortcut icon' href="logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Events</title>
</head>

<body>
    <div class="box" id="box1">
        <img src= "clubs.png" width= 100% height= 500px></bz>
        <h7>Student life at Triangle Club goes beyond studying. It can be an enriching journey filled with fun-learning co-curricular activities. You get to make crucial choices that set your stage of future and still have fun while you’re at it.</h7>
    </div>
    <div class="column" style="background-color:#aaa;">
        <img src= "SDP 1.png" width= 100% height= 300px>
    </div>
    <div class="column" style="background-color:#bbb;">
        <img src= "SDP 2.png" width= 100% height= 300px>
    </div>
    <div class="column" style="background-color:#ccc;">
        <img src= "SDP 3.png" width= 100% height= 300px>
    </div>
    <div class="column" style="background-color:#ddd;">
        <img src= "SDP 4.png" width= 100% height= 300px>
    </div>
    <h1><center>EVENTS</center><br></h1>
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
                <th width='100px'></td>
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
                    <td><a class="btn btn-primary" href='event_registration.php?event_id=<?php echo $row['event_id']?>'>Register</a></td>
                </tr>
            <?php }
            ?>
    </table>
    <?php include ('footer.html')?>
</body>
</html>
