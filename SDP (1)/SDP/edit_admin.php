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

    $admin_id = $_SESSION['Admin_ID'];
    //Create a query that will refer to your id
    $sql_query = "SELECT * FROM `admin_details` WHERE `admin_id` ='$admin_id'";
    $records = $conn->query($sql_query) or die($conn->error);
    $row = $records->fetch_assoc();

    //Check if your submit has been clicked
    if(isset($_POST['update'])){
        $newname = $_POST['edtName'];
        $newtp = $_POST['edtTP'];
        $newusername = $_POST['edtUsername'];
        $newpassword = $_POST['edtPassword'];
        $idadmin = $_POST['idadmin'];

        //Insert data in database
        $update_query = "UPDATE `admin_details` SET `admin_name`='$newname',`tp_number`='$newtp',`u_sername`='$newusername',`p_assword`='$newpassword' WHERE `admin_id` = '$idadmin'";
        if(mysqli_query($conn, $update_query)){
            echo "<script>alert('Information updated!')</script>";
        } 
        else {
            echo "<script>alert('Error: ')</script>".mysqli_error($conn);
        }

        mysqli_close($conn);
        echo "<script type='text/javascript'>location.href = 'edit_admin.php';</script>";
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
    <title>Edit <?php echo $row['admin_name']?>'s' Details</title>
</head>
<body>
    <?php include('admin_header.html'); ?>
    <h1>Edit <?php echo $row['admin_name']; ?>'s Details</h1>
    <form action="" method = "post">
        <table>
            <tr>
                <td>Name: </td>
                <td><input type="text" name="edtName" value="<?php echo $row['admin_name']?>" required></td>
            </tr>
            <tr>
                <td>TP Number: </td>
                <td><input type="text" name="edtTP" value="<?php echo $row['tp_number']?>" required></td>
            </tr>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="edtUsername" value="<?php echo $row['u_sername']?>" required></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="text" name="edtPassword" value="<?php echo $row['p_assword']?>" required></td>
                <input type="hidden" name="idadmin" value="<?php echo $row['admin_id']?>" required>
                </td>
            </tr>
        </table><br/>
        <input type="submit" name="update" value="Update Record">
    </form>
</body>
</html>