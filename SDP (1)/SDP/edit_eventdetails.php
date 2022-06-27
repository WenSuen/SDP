<?php
    $servername = "localhost";
    $user = "root";
    $password = "";
    $database = "sdp_2007";

    //Connection to mysql server
    $conn = mysqli_connect($servername, $user, $password, $database);
    if(!$conn) {
        die("Server was not connected. Error Message: " . mysqli_connect_error());
    }
    session_start();

    $event_id = $_GET['event_id'];
    //Create a query that will refer to your id
    $sql_query = "SELECT * FROM `events` WHERE `event_id` ='$event_id'";
    $records = $conn->query($sql_query) or die($conn->error);
    $row = $records->fetch_assoc();

    //Check if your submit has been clicked
    if(isset($_POST['update'])){
        $newname = $_POST['edtname'];
        $newdesc = $_POST['edtdesc'];
        $newdate = $_POST['edtdate'];
        $newstarttime = $_POST['edtstart'];
        $newendtime = $_POST['edtend'];
        $idevent =$_POST['idevent'];

        //Insert data in database
        $update_query = "UPDATE `events` SET `event_name`='$newname',`description`='$newdesc',`date`='$newdate',`start_time`='$newstarttime',`end_time`='$newendtime' WHERE `event_id`='$idevent'";
        if(mysqli_query($conn, $update_query)){
            echo "<script>alert('Information updated!')</script>";
        } 
        else {
            echo "<script>alert('Error: ')</script>".mysqli_error($conn);
        }

        mysqli_close($conn);
        echo "<script>window.location.href = 'event_list.php'</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="master.css">
    <link rel='shortcut icon' href="logo.png">
    <title>Edit <?php echo $row['event_name']?>'s' Details</title>
</head>
<body>
    <?php include('club_header.html'); ?>
    <h1>Edit <?php echo $row['event_name']; ?>'s Details</h1>
    <form action="" method = "post">
        <table>
            <tr>
                <td>Event Name: </td>
                <td><input type="text" name="edtname" value="<?php echo $row['event_name']?>" required></td>
            </tr>
            <tr>
                <td>Description: </td>
                <td><input type="text" name="edtdesc" value="<?php echo $row['description']?>" required></td>
            </tr>
            <tr>
                <td>Date: </td>
                <td><input type="date" name="edtdate" value="<?php echo $row['date']?>" required></td>
            </tr>
            <tr>
                <td>Start Time: </td>
                <td><input type="time" name="edtstart" value="<?php echo $row['start_time']?>" required></td>
            </tr>
            <tr>
                <td>End Time: </td>
                <td><input type="time" name="edtend" value="<?php echo $row['end_time']?>" required></td>
                <input type="hidden" name="idevent" value="<?php echo $row['event_id']?>" required>
            </tr>
        </table><br/>
        <input type="submit" name="update" value="Update Record">
    </form>
</body>
<?php include ('footer.html')?>
</html>