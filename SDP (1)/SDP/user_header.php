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

    <div class="top">
        <a href="user_home.php"><img class="logo" src="logo.png" alt="logo"></a>
        <ul>
            <li><a href="user_page.php">Clubs</a></li>
            <li><a href="event.php">Events</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="inquiry.php">Inquiry</a></li>
            <li><a href="view_joined_clubs.php">Reports</a></li>
            <li><a href="user_edit_user.php">
                <?php 
                    if(isset($_SESSION['u_sername'])) {
                        echo $_SESSION['user_name'];
                    }else {
                            echo "SIGN UP / LOG IN";
                    } 
                ?></a>
            </li>
            <li><a href="mainpage.php">Logout</a></li>
        </ul>
        <form class="search-bar">
            <input type="text" class="search" placeholder="Search.."><button class="search_b"><i class="fa fa-search"></i></button>
        </form>
    </div>
</body>
</html>