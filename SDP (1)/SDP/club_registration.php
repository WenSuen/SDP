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
    $sql_query = "SELECT * FROM `joined_clubs`";
    $result = mysqli_query($conn, $sql_query);

    //Create a query that will refer to your id
    $namename = $_SESSION['user_name'];
    
    if(isset($_POST['Submit'])){
        $club_id = $_GET['clubid'];
        $Name = $_POST['txtName'];
        $ClubName = $_POST['txtClubName'];
        $student_id = $_SESSION['student_id'];
        $sql_query= "INSERT INTO `joined_clubs`(`student_id`, `student_name`, `club_id`, `club_name`) VALUES ('$student_id', '$Name', '$club_id', '$ClubName')";
        if(mysqli_query($conn,$sql_query)){
            echo "<script> alert ('Registered!') </script>";
            echo "<script type='text/javascript'>location.href = 'user_page.php';</script>";
        }else{
            echo "Error : " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }

    $club_id = $_GET['clubid'];
    $club_queryy = "SELECT * FROM `club` WHERE `club_id` ='$club_id'";
    $records = $conn->query($club_queryy) or die($conn->error);
    // $row = $records->fetch_assoc();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Register for a Club!</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='shortcut icon' href="logo.png">
    <link rel="stylesheet" href="master.css">
    <link rel="stylesheet" href="club_registration.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="main-block">
      <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1>Register to our clubs</h1>
        <p>Bringing Out the Best in Each Other!</p>

      </div>
      <form method="post">
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>Register here</h2>
        </div>
        <div class="info">
            <?php
                // $club_id = $_GET['clubid'];
                // $club_query = "SELECT * FROM `club` WHERE 'club_id' = '$club_id'";
                // $result = mysqli_query($conn,$club_query);
                while ($row = mysqli_fetch_array($records)) {
            ?>
            <input type="text" name="txtName" value=" <?php echo $namename; ?>" require>
            <input type="text" name="txtClubName" value="<?php echo $row['club_name']; ?>" require>
            <?php } ?>
        </div>
        <button type="submit" class= "trigger-btn" data-toggle="modal" name="Submit" a href="#myModal">Submit</button>
      </form>
    </div>
</html>