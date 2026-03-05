<?php
session_start();
if(!isset($_SESSION['admin_login_id']))
{
    header("Location:login.php");
}
$conn=mysqli_connect("localhost","root","","tripy_db");
$filename=basename($_SERVER['REQUEST_URI']);
$file=pathinfo($filename,PATHINFO_FILENAME);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>tripy | Dashboard</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="./assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="https://play-lh.googleusercontent.com/H9yLRV4nbC7A-HZUwrm189yLxSkV62U-VlAfDa6BFVuCcXDzxaUUypqTkuIP9bAuiA=w240-h480-rw">
    <!-- PAGE LEVEL STYLES-->
</head>