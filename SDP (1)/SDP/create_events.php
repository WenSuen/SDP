<?php
    include('club_header_no.html');
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

    $clubname = $_SESSION['Club_Name'];
    if(isset($_POST['create'])){
        $eventname = $_POST['eventname'];
        $desc = $_POST['desc'];
        $date = $_POST['date'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $dateposted = $_POST['posted'];

        //Insert data in database
        $register_query = "INSERT INTO `events`( `event_name`, `club`, `description`, `date`, `start_time`, `end_time`, `date_posted`, `approval_status`, `link`) VALUES ('$eventname', '$clubname','$desc','$date','$start','$end','$dateposted', '1', 'TBC')";
        if(mysqli_query($conn, $register_query)){
            echo "<script>alert('Sucesfully Apllied! Waiting for Approval...')</script>";
        } 
        else {
            echo "<script>alert('Error: ')</script>".mysqli_error($conn);
        }

        mysqli_close($conn);
        // echo "<script type='text/javascript'>location.href = 'create_events.php';</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
        <link rel="stylesheet" href="master.css">
        <link rel='shortcut icon' href="logo.png">
        <title>Create Event</title>
    </head>
    <body>
    <main>
        <form method="post">
            <h1>Create Event</h1>
            <div>
                <label for="eventname">Event Name:</label>
                <input type="text" id="eventname" name="eventname">
            </div>
            <div>
                <label for="desc">Description:</label>
                <input type="textarea" id="desc" name="desc">
            </div>
            <div>
                <label for="date">Date:</label>
                <input type="date" id="date" name="date">
            </div>
            <div>
                <label for="start">Start Time:</label>
                <input type="time" id="start" name="start">
            </div>
            <div>
                <label for="end">End Time:</label>
                <input type="time" id="end" name="end">
            </div>
            <div>
                <label for="posted">Date Posted:</label>
                <input type='date' id='posted' name='posted' value='<?php echo date('Y-m-d');?>' disabled>
            </div>
            <input type="submit" name="create" value="Create Event">
        </form>
    </main>
    </body>
    </html>