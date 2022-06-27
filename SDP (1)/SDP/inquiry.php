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
            $Inquiry = $_POST['txtInquiry'];
            $To_clubs = $_POST['txtToClub'];
            $query= "INSERT INTO `inquiries`(`name`, `inquiry`, `to_club`) VALUES ('$Name','$Inquiry','$To_clubs')";
            if(mysqli_query($conn,$query)){
                echo "<script> alert ('Inquiry submitted!') </script>";
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
    <title>Submit Inquiries!</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="feedback.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel='shortcut icon' href="logo.png">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="main-block">
      <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1>Inquiry Form</h1>
        <p>DOUBT IS THE INCENTIVE TO TRUTH AND INQUIRY LEADS THE WAY!</p>

      </div>
      <form method="post">
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>Have any doubt? Feel free to ask!</h2>
        </div>
        <div class="info">
            <input type="text" name="txtName" value=" <?php echo $namename; ?>" require>

            <input type="text" name="txtInquiry" placeholder="Inquiry" require>

            <input type="text" name="txtToClub" placeholder="Which club you would like to submit to?" require>
        </div>
        <button type="submit" class= "trigger-btn" data-toggle="modal" name="Submit" a href="#myModal">Submit</button>
      </form>
    </div>
  </body>
</html>