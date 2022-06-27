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

    session_start();
    if(isset($_POST['login'])){
        //retrieve values from textboxes, passed to a variable
        $username = $_POST['username'];
        $password = $_POST['password'];
        //create sql query//command
        $sql_query = "SELECT * FROM club WHERE u_sername='$username' AND p_assword='$password' AND registration_status='0'";
        //execute - mysqli_query
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result); //$row['id']
        $count = mysqli_num_rows($result); //1/0
        
        if($count==1){
            echo "<script>alert(`Welcome!`)</script>";
            $_SESSION['Club_Name'] = $row['club_name'];
            $_SESSION['Club_ID'] = $row['club_id'];

            echo "<script type='text/javascript'>location.href = 'homepage.php';</script>";
        }
        else {
            echo "<script>alert('Credentials do not match...')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/29de809aae.js" crossorigin="anonymous"></script>
    <title>Club Login</title>
</head>
<body>
    <?php include ("header.html") ?>
    <form method="post">
    <div class="container" id="center">
        <h1>Club Login</h1>
        <br> <hr>
        <input type="text" placeholder="Enter Username" name="username" id="email" class="field" required>
        <input type="password" placeholder="Enter Password" name="password" id="password" class="field" required>
        <hr>
      
        <button type="submit" class="loginbtn" name="login">Enter</button>
    </div>  
    </form>
    <?php include ("footer.html") ?>
</body>
</html>
