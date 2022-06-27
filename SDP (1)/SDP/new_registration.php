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

    if(isset($_POST['register'])){
        $clubname = $_POST['clubname'];
        $desc = $_POST['clubdescription'];
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $logo = $_POST['img'];
        // $logosixty = new Imagick ($logo);
        // $data = $image->getImageBlob();
        // $data = $mysqli->real_escape_string($data);

        //Insert data in database
        $register_query = "INSERT INTO `club`(`club_logo`, `club_name`, `club_description`, `u_sername`, `p_assword`, `registration_status`) VALUES ('$data','$clubname','$desc','$username','$pass','1')";
        if(mysqli_query($conn, $register_query)){
            echo "<script>alert('Sucesfully Registered! Waiting for Approval...')</script>";
        } 
        else {
            echo "<script>alert('Error: ')</script>".mysqli_error($conn);
        }

        mysqli_close($conn);
        echo "<script type='text/javascript'>location.href = 'login.php';</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='shortcut icon' href="logo.png">
        <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
        <title>Register</title>
    </head>
    <body>
    <?php include('header_no.html'); ?>
    <main>
        <form method="post">
            <h1>Register</h1>
            <div>
                <label for="clublogo">Club Logo:</label>
                <input type="file" id="img" name="img" accept="image/*">
            </div>
            <div>
                <label for="clubname">Club Name:</label>
                <input type="text" id="clubname" name="clubname">
            </div>
            <div>
                <label for="clubdescription">Club Description:</label>
                <input type="textarea" id="clubdescription" name="clubdescription">
            </div>
            <div>
                <label for="username">Username:</label>
                <input type="username" id="username" name="username">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>
            <input type="submit" name="register" value="Register">
            <footer>Already a member? <a href="login.php">Login here</a></footer>
        </form>
    </main>
    </body>
    </html>