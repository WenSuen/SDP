<?php 
    include('db.php');
    $event_id = $_GET['event_id'];
    $sql_query = "SELECT * FROM `register_events`";
    $eventlist = "SELECT * FROM `events` WHERE event_id = $event_id";
    $records = $conn->query($eventlist) or die($conn->error);
    $row = $records->fetch_assoc();
    $result = mysqli_query($conn, $sql_query);

    //connect to server
    $conn = mysqli_connect($servername, $user, $password, $dbase);
    if(!$conn) {
        die("Server was not connected. Error Message: " . mysqli_connect_error());
    }

        if(isset($_POST['Submit'])){
            $event_id = $_GET['event_id'];
            $Name = $_POST['txtName'];
            $EventName = $_POST['txtEventName'];
            $query= "INSERT INTO `register_events`(`event_id`, `event_name`, `user_name`) VALUES ('$event_id','$EventName', '$Name')";
            if(mysqli_query($conn,$query)){
                echo "<script> alert ('Event Registered') </script>";
                header("location: user_page.php");
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
    <title>Register for an event!</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel='shortcut icon' href="logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
    html, body {
    min-height: 100%;
    }
    body, div, form, input, select, p { 
    padding: 0;
    margin: 0;
    outline: none;
    font-family: Roboto, Arial, sans-serif;
    font-size: 16px;
    color: #eee;
    }
    body {
    background: url("/uploads/media/default/0001/01/b5edc1bad4dc8c20291c8394527cb2c5b43ee13c.jpeg") no-repeat center;
    background-size: cover;
    }
    h1, h2 {
    text-transform: uppercase;
    font-weight: 400;
    }
    h2 {
    margin: 0 0 0 8px;
    }
    .main-block {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100%;
    padding: 25px;
    background: rgba(0, 0, 0, 0.5); 
    }
    .left-part, form {
    padding: 25px;
    }
    .left-part {
    text-align: center;
    }
    .fa-graduation-cap {
    font-size: 72px;
    }
    form {
    background: rgba(0, 0, 0, 0.7); 
    }
    .title {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    }
    .info {
    display: flex;
    flex-direction: column;
    }
    input, select {
    padding: 5px;
    margin-bottom: 30px;
    background: transparent;
    border: none;
    border-bottom: 1px solid #eee;
    }
    input::placeholder {
    color: #eee;
    }
    option:focus {
    border: none;
    }
    option {
    background: black; 
    border: none;
    }
    .checkbox input {
    margin: 0 10px 0 0;
    vertical-align: middle;
    }
    .checkbox a {
    color: #26a9e0;
    }
    .checkbox a:hover {
    color: #85d6de;
    }
    .btn-item, button {
    padding: 10px 5px;
    margin-top: 20px;
    border-radius: 5px; 
    border: none;
    background: #26a9e0; 
    text-decoration: none;
    font-size: 15px;
    font-weight: 400;
    color: #fff;
    }
    .btn-item {
    display: inline-block;
    margin: 20px 5px 0;
    }
    button {
    width: 100%;
    }
    button:hover, .btn-item:hover {
    background: #85d6de;
    }
    @media (min-width: 568px) {
    html, body {
    height: 100%;
    }
    .main-block {
    flex-direction: row;
    height: calc(100% - 50px);
    }
    .left-part, form {
    flex: 1;
    height: auto;
    }
    body {
        font-family: 'Varela Round', sans-serif;
    }
    .modal-confirm {		
        color: #636363;
        width: 325px;
        font-size: 14px;
    }
    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
    }
    .modal-confirm .modal-header {
        border-bottom: none;   
        position: relative;
    }
    .modal-confirm h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -15px;
    }
    .modal-confirm .form-control, .modal-confirm .btn {
        min-height: 40px;
        border-radius: 3px; 
    }
    .modal-confirm .close {
        position: absolute;
        top: -5px;
        right: -5px;
    }	
    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
    }	
    .modal-confirm .icon-box {
        color: #fff;		
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: -70px;
        width: 95px;
        height: 95px;
        border-radius: 50%;
        z-index: 9;
        background: #82ce34;
        padding: 15px;
        text-align: center;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }
    .modal-confirm .icon-box i {
        font-size: 58px;
        position: relative;
        top: 3px;
    }
    .modal-confirm.modal-dialog {
        margin-top: 80px;
    }
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
        background: #82ce34;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        border: none;
    }
    .modal-confirm .btn:hover, .modal-confirm .btn:focus {
        background: #6fb32b;
        outline: none;
    }
    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }
    </style>
  </head>
  <body>
    <div class="main-block">
      <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1>Register to our events!</h1>
        <p>Bringing Out the Best in Each Other!</p>

      </div>
      <form method="post">
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>Register here</h2>
        </div>
        <div class="info">
            <input type="text" name="txtName" value=" <?php echo $namename; ?>" require>

            <input type="text" name="txtEventName" placeholder="Event Name" value="<?php echo $row['event_name']?>" require>
        </div>
        <button type="submit" class= "trigger-btn" data-toggle="modal" name="Submit" a href="#myModal">Submit</button>
      </form>
    </div>
</html>