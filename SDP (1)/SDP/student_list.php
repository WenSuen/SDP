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
    <title>Edit Students Details</title>
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
                <th width='10px'>Delete</td>
                <th width='10px'>Edit</td>
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
                    <td>&emsp;<a href="dlt_student.php?student_id=<?php echo $row["student_id"]; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                    <td>&emsp;<a href="edit_student.php?student_id=<?php echo $row["student_id"]; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                </tr>
            <?php }
            ?>
    </table>
</body>
</html>