<?php
    include('newheader.php');
    $servername = "localhost";
    $user = "root";
    $password = "";
    $database = "sdp_2007";

    //Connection to mysql server
    $conn = mysqli_connect($servername, $user, $password, $database);
    if(!$conn) {
        die("Server was not connected. Error Message: " . mysqli_connect_error());
    }

    $student_id = $_SESSION['student_id'];
    //Create a query that will refer to your id
    $sql_query = "SELECT * FROM `students` WHERE `student_id` ='$student_id'";
    $records = $conn->query($sql_query) or die($conn->error);
    $row = $records->fetch_assoc();

    //Check if your submit has been clicked
    if(isset($_POST['update'])){
        $newname = $_POST['edtName'];
        $newtp = $_POST['edtTP'];
        $newgender = $_POST['edtGender'];
        $newusername = $_POST['edtUsername'];
        $newpassword = $_POST['edtPassword'];
        $newnumber = $_POST['edtNumber'];

        //Insert data in database
        $query = "UPDATE `students` SET `n_ame`='$newname',`tp_number`='$newtp',`gender`='$newgender',`u_sername`='$newusername',`p_assword`='$newpassword',`contact_number`='$newnumber' WHERE `students`.`student_id` = '$student_id'";
        if(mysqli_query($conn, $query)){
            echo "<script>alert('Record edited!')</script>";
        } 
        else {
            echo "<script>alert('Error: ')</script>".mysqli_error($conn);
        }

        mysqli_close($conn);
        echo "<script type='text/javascript'>location.href = 'user_edit_user.php';</script>";

    }
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' href="logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Capriola' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Bakbak One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Koulen' rel='stylesheet'>
    <title>Edit <?php echo $row['n_ame']?>'s' Details</title>

</head>
<body>
    <form action="" method = "post">
<div class="container">
    <div class="main-body">

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $row['u_sername']?></h4>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name="edtName" value="<?php echo $row['n_ame']?>" required readonly>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">TP Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name="edtTP" value="<?php echo $row['tp_number']?>" required readonly>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Contact Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name="edtNumber" value="<?php echo $row['contact_number']?>" required>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name="edtPassword" value="<?php echo $row['p_assword']?>" required>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name="edtUsername" value="<?php echo $row['u_sername']?>" required>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <input type="text" name="edtGender" value="<?php echo $row['gender']?>" required readonly>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                    <input type="submit" name="update" value="Update Record">
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
    </div>
    </form>
</body>
</html>