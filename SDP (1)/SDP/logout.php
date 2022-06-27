<?php
session_start();
if (!isset($_SESSION['u_sername'])) {
    // Student/ Admin Authentication
    $_SESSION['login'] = false;
    $_SESSION['message'] = "Please login to continue";
    header("Location: mainpage.php");
} else {
    unset($_SESSION['u_sername']);
    $_SESSION['login'] = false;
    $_SESSION['message'] = "Logged Out Successfully";
    header("Location: mainpage.php");
    exit(0);
}