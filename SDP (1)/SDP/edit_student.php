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

    $student_id = $_GET['student_id'];
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
        echo "<script type='text/javascript'>location.href = 'student_list.php';</script>";

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="master.css">
    <link rel='shortcut icon' href="logo.png">
    <title>Edit <?php echo $row['n_ame']?>'s' Details</title>
</head>
<body>
    <?php include('admin_header.html') ?>
    <h1>Edit <?php echo $row['n_ame']?>'s Details</h1>
    <form action="" method = "post">
        <table>
            <tr>
                <td>Name: </td>
                <td><input type="text" name="edtName" value="<?php echo $row['n_ame']?>" required></td>
            </tr>
            <tr>
                <td>TP Number: </td>
                <td><input type="text" name="edtTP" value="<?php echo $row['tp_number']?>" required></td>
            </tr>
            <tr>
                <td>Gender: </td>
                <td>
                    <select name="edtGender" value="<?php echo $row['gender']?>" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="edtUsername" value="<?php echo $row['u_sername']?>" required></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="text" name="edtPassword" value="<?php echo $row['p_assword']?>" required></td>
                </td>
            </tr>
            <tr>
                <td>Contact Number: </td>
                <td><input type="text" name="edtNumber" value="<?php echo $row['contact_number']?>" required></td>
            </tr>
        </table>
        <input type="submit" name="update" value="Update Record">
    </form>
</body>

<div class="container">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
				</div>
				<h5 class="user-name">Yuki Hayashi</h5>
				<h6 class="user-email">yuki@Maxwell.com</h6>
			</div>
			<div class="about">
				<h5>About</h5>
				<p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>
			</div>
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Personal Details</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">Full Name</label>
					<input type="text" class="form-control" id="fullName" placeholder="Enter full name">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Email</label>
					<input type="email" class="form-control" id="eMail" placeholder="Enter email ID">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Phone</label>
					<input type="text" class="form-control" id="phone" placeholder="Enter phone number">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="website">Website URL</label>
					<input type="url" class="form-control" id="website" placeholder="Website url">
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary">Address</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Street">Street</label>
					<input type="name" class="form-control" id="Street" placeholder="Enter Street">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="ciTy">City</label>
					<input type="name" class="form-control" id="ciTy" placeholder="Enter City">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="sTate">State</label>
					<input type="text" class="form-control" id="sTate" placeholder="Enter State">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="zIp">Zip Code</label>
					<input type="text" class="form-control" id="zIp" placeholder="Zip Code">
				</div>
			</div>
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
					<button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
					<button type="button" id="submit" name="submit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</html>