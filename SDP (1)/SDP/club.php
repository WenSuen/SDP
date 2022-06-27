<?php
    include('newheader.php');
    include('db.php');


    $sql_query = "SELECT * FROM `club`";
    $result = mysqli_query($conn, $sql_query);

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
    <link rel='shortcut icon' href="logo.png">
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="mainpage.css">
    <link rel="stylesheet" href="listgrid.css">
    <link rel="stylesheet" href="master.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Clubs List</title>
</head>

<body>
    <div class="box" id="box1">
        <img src= "clubs.png" width= 100% height= 500px></bz>
        <center>
        <h7>Student life at Triangle Club goes beyond studying. It can be an enriching journey filled with fun-learning co-curricular activities. You get to make crucial choices that set your stage of future and still have fun while you’re at it.</h7>
        </center>
    </div>
    <div class="column" style="background-color:#aaa;">
        <img src= "SDP 1.png" width= 100% height= 300px>
    </div>
    <div class="column" style="background-color:#bbb;">
        <img src= "SDP 2.png" width= 100% height= 300px>
    </div>
    <div class="column" style="background-color:#ccc;">
        <img src= "SDP 3.png" width= 100% height= 300px>
    </div>
    <div class="column" style="background-color:#ddd;">
        <img src= "SDP 4.png" width= 100% height= 300px>
    </div>
    <h1><center>Clubs</center><br></h1>
    <?php
      $sql_query ="SELECT * FROM `club` WHERE `registration_status` = '0'";
      $result = mysqli_query($conn,$sql_query);   
      while ($row = mysqli_fetch_array($result)) {
      ?>
      <div class="card">
          <form action="" method="post">
              <br/>
              <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['club_logo']).'" height="150" width="190">';?> 
              <h2><?php echo $row["club_name"];?></h2>
              <a class="btn btn-primary" href='<?php echo $row['link']; ?>'>Learn More</a>
          </form>
      </div>
  <?php }
  ?>
  
</body>
</html>
