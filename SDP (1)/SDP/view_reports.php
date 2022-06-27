<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' href="logo.png">
    <link rel="stylesheet" href="master.css">
    <link rel="stylesheet">
    <title>Reports</title>
    <style>
        body{
            margin: 0;
        }

        #center{
            display: block;
	        margin-left: auto;
	        margin-right: auto;
        }

        a:link {
	        text-decoration: none;
	        color: black;
        }
    </style>

</head>
<body>
<?php include ('club_header.html')?>
    <h2><center>Reports:</h2>
    <button id="center"><a href="member_list.php">View Members</a></button><br/>
    <button id="center"><a href="feedback_inquiries.php">View feedback and inquiries</a></button><br/>
    <button id="center"><a href="view_events.php">View Events</a></button><br/>
    <button id="center"><a href="homepage.php">Return</a></button><br/>
    <?php include ('footer.html')?>
</body>
</html>