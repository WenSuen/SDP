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

    $club_id = $_SESSION['Club_ID'];
    //Create a query that will refer to your id
    $sql_query = "SELECT * FROM `club` WHERE `club_id` ='$club_id'";
    $records = $conn->query($sql_query) or die($conn->error);
    $row = $records->fetch_assoc();

    //Check if your submit has been clicked
    if(isset($_POST['update'])){
        $newname = $_POST['edtclubname'];
        $newdescription = $_POST['edtdesc'];
        $newusername = $_POST['edtusername'];
        $newpassword = $_POST['edtpassword'];
        $idclub = $_POST['idclub'];

        //Insert data in database
        $update_query = "UPDATE `club` SET `club_name`='$newname',`club_description`='$newdescription',`u_sername`='$newusername',`p_assword`='$newpassword' WHERE `club_id`='$idclub'";
        if(mysqli_query($conn, $update_query)){
            echo "<script>alert('Information updated!')</script>";
        } 
        else {
            echo "<script>alert('Error: ')</script>".mysqli_error($conn);
        }

        mysqli_close($conn);
        echo "<script type='text/javascript'>location.href = 'edit_clubdetails.php';</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="master.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='shortcut icon' href="logo.png">
    <title>Edit <?php echo $row['club_name']?>'s' Details</title>
</head>
<body>
    <?php include('club_header.html'); ?>
    <h1>Edit <?php echo $row['club_name']; ?>'s Details</h1>
    <form action="" method = "post">
        <table>
            <tr>
                <td>Club Name: </td>
                <td><input type="text" name="edtclubname" value="<?php echo $row['club_name']?>" required></td>
            </tr>
            <tr>
                <td>Description: </td>
                <td><textarea name="edtdesc" cols="50" rows="5" required><?php echo $row['club_description']?></textarea></td>
            </tr>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="edtusername" value="<?php echo $row['u_sername']?>" required></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="text" name="edtpassword" value="<?php echo $row['p_assword']?>" required></td>
                <input type="hidden" name="idclub" value="<?php echo $row['club_id']?>" required>
                </td>
            </tr>
        </table><br/>
        <input type="submit" name="update" value="Update Record">
    </form>
    <br/><br/>
</body>
<?php include ('footer.html')?>
</html>