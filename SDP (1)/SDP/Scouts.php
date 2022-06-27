<?php 
    error_reporting(0);
    include('newheader.php');
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbase = "sdp_2007";

    //connect to server
    $conn = mysqli_connect($servername, $user, $password, $dbase);
    if(!$conn) {
        die("Server was not connected. Error Message: " . mysqli_connect_error());
    }

    $sql_query = "SELECT * FROM `club` WHERE club_id = '3'";
    $records = $conn->query($sql_query) or die($conn->error);
    $row = $records->fetch_assoc();

    if(!isset($_SESSION)){
        session_start();
    }
    // get the user's id from the URL
    $u_sername = $_SESSION['u_sername'];
    // sql query to retrieve club's data from database based on user's id
    $query = "SELECT * FROM `students` WHERE u_sername = '$u_sername'";
    // store the sql query result in a variable
    $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $row['club_name']; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="master.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel='shortcut icon' href="logo.png">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }

    .btn {
      margin-left: 120px;
    }

    .club_logo {
      margin-left: 80px;
    }
  </style>
</head>
<body>
<?php
        $result = mysqli_query($conn, $sql_query);
        while ($row = mysqli_fetch_array($result)){ 

    ?>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
    &nbsp;&nbsp;<h4><?php echo $row['club_name']; ?> Details</h4>
      <label class="club_logo"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['club_logo']).'" height="150" width="190">';?></label>
      <div class="input-group">
      <br><br>  
      <?php if (isset($_SESSION['u_sername'])) { ?>
        <a class="btn btn-primary" href='club_registration.php?clubid=<?php echo $row["club_id"]; ?>'>Register Now</a>
      <?php } else { ?>

      <?php } ?>
      </div>
    </div>


    <div class="col-sm-9">
      <h4><small>Club Details</small></h4>
      <hr>
      <h2><?php echo $row['club_name']; ?></h2>
      <h5><span class="label label-danger">Description</span>
      <br><br>
      <p><?php echo $row['club_description']; ?></p>
      <br><br>
    </div>
    <?php } ?>
</body>
</html>
