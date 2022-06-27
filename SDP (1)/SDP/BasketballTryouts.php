<?php 
    include('newheader.php');
    include('db.php');
    $sql_query = "SELECT * FROM `events` WHERE event_name = 'Basketball Tryouts'";
    $result = mysqli_query($conn, $sql_query);

    //connect to server
    $conn = mysqli_connect($servername, $user, $password, $dbase);
    if(!$conn) {
        die("Server was not connected. Error Message: " . mysqli_connect_error());
    }

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
  <title>Basketball Club Tryouts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="master.css">
  <link rel='shortcut icon' href="logo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
      <h4><?php echo $row['event_name']; ?> Details</h4>
      <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['event_images']).'" height="150" width="190">';?> 
      <div class="input-group">
        <a class="btn btn-primary" href='event_registration.php'>Register Now</a>
      </div>
    </div>


    <div class="col-sm-9">
      <h4><small>Event Details</small></h4>
      <hr>
      <h2><?php echo $row['event_name']; ?></h2>
      <h5><span class="label label-danger">Sport</span>
      <p><?php echo $row['description']; ?></p>
      <br><br>
    </div>
    <?php } ?>



</body>
</html>
