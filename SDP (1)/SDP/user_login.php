<?php
    include('header.html');
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
        $u_sername = $_POST['u_sername'];
        $p_assword = $_POST['p_assword'];
        //create sql query//command
        $sql_query = "SELECT * FROM students WHERE u_sername='$u_sername' AND p_assword='$p_assword'";
        //execute - mysqli_query
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result); //$row['id']
        $count = mysqli_num_rows($result); //1/0
        
        if($count==1){
            echo "<script>alert('Welcome to Triangle Club!')</script>";
            $_SESSION['u_sername'] = $row['u_sername'];
            $_SESSION['student_id'] = $row['student_id'];
            $_SESSION['user_name'] = $row['n_ame'];
            echo "<script type='text/javascript'>location.href = 'user_home.php';</script>";
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
    <link rel='shortcut icon' href="logo.png">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Registration for User</title>
</head>
<body>
    <form method="post">
    <div class="container" id="center">
        <h1>User Login</h1>
        <br> <hr>
        <input type="text" placeholder="Enter Username" name="u_sername" id="u_sername" class="field" required>
        <input type="password" placeholder="Enter Password" name="p_assword" id="p_assword" class="field" required>
        <hr>
      
        <button type="submit" class="loginbtn" name="login">Enter</button>
        </div>
    </form>
    <br>
    <?php include ('footer.html')?>
</body>
</html>