<?php 
    include('db.php');
    $sql_query = "SELECT * FROM `joined_clubs`";
    $result = mysqli_query($conn, $sql_query);

    //connect to server
    $conn = mysqli_connect($servername, $user, $password, $dbase);
    if(!$conn) {
        die("Server was not connected. Error Message: " . mysqli_connect_error());
    }

        if(isset($_POST['Submit'])){
            $Name = $_POST['txtName'];
            $Feedback = $_POST['txtFeedback'];
            $To_clubs = $_POST['txtToClub'];
            $query= "INSERT INTO `feedback`(`name`, `feedback`, `to_club`) VALUES ('$Name', '$Feedback', '$To_clubs')";
            if(mysqli_query($conn,$query)){
                echo "<script> alert ('Feedback submitted!') </script>";
                echo "<script type='text/javascript'>location.href = 'user_page.php';</script>";
            }else{
                echo "Error : " . mysqli_error($conn);
            }
    
            mysqli_close($conn);
    }

    session_start();
    $namename = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Submit Feedback!</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="feedback.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel='shortcut icon' href="logo.png">
  </head>
  <body>
    <div class="main-block">
      <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1>Feedback Form</h1>
        <p>WE NEED PEOPLE WHO WILL GIVE US FEEDBACK. THAT IS HOW WE IMPROVE!</p>

      </div>
      <form method="post">
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>Submit Your Feedback</h2>
        </div>
        <div class="info">
            <input type="text" name="txtName" value=" <?php echo $namename; ?>" require>

            <input type="text" name="txtFeedback" placeholder="Feedback" require>

            <input type="text" name="txtToClub" placeholder="Which club you would like to submit to?" require>
        </div>
        <button type="submit" class= "trigger-btn" data-toggle="modal" name="Submit" a href="#myModal">Submit</button>
      </form>
    </div>
  </body>
</html>