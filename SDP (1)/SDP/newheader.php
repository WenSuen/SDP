<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">
    <link rel='shortcut icon' href="logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="body">
        <div class="top">
            <a href="mainpage.php"><img class="logo" src="logo.png" alt="logo"></a>
            <ul>
                <?php if (isset($_SESSION['u_sername'])) { ?>
                    <li><a href="club.php">Clubs</a></li>
                    <li><a href="event.php">Events</a></li>
                    <li><a href="feedback.php">Feedback</a></li>
                    <li><a href="inquiry.php">Inquiry</a></li>
                    <li><a href="view_joined_clubs.php">Joined clubs/events</a></li>
                    <li><a href="user_edit_user.php"><?php 
                    if(isset($_SESSION['u_sername'])) {
                        echo $_SESSION['user_name'];
                    }else {
                            echo "SIGN UP / LOG IN";
                    } 
                ?></a></a></li>
                    
                    <li><a href="logout.php">Logout</a></li>
                <?php } else { ?>
                    <li><a href="mainpage.php">Homepage</a></li>
                    <li><a href="user_login.php">User Login</a></li>
                    <li><a href="club_login.php">Club Login</a></li>
                    <li><a href="admin_login.php">Admin Login</a></li>
                    <li><a href="new_registration.php">Club Register</a></li>
                    <li><a href="club.php">Clubs</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</body>
</html>