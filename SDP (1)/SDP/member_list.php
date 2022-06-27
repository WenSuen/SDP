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
    <title>Edit Member Details</title>
</head>
<body>
    <?php include ("club_header.html") ?>
    <br/>
    <h2>Members</h2>
    <table class="table table-hover">
            <thead>
                <tr>
                <th width='20px'>Student Name</td>
                <th width='10px'>Club Name</td>
                <th width='10px'>Edit</td>
                </tr>
            </thead>
            <!-- taking from feedback table -->
            <?php
            $sql_query ="SELECT * FROM joined_clubs WHERE club_name = '".$_SESSION['Club_Name']."'";
            $result = mysqli_query($conn,$sql_query);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row["student_name"] ?></td>
                    <td><?php echo $row["club_name"] ?></td>
                    <td>&emsp;<a href="dlt_member.php?student_id=<?php echo $row["student_id"]; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                </tr>
            <?php }
            ?>
    </table>
    <?php include ('footer.html')?>
</body>
</html>