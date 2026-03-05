<?php 
session_start();
$conn=mysqli_connect("localhost","root","","tripy_db");
$email_admin_query=mysqli_query($conn,"SELECT tripy_role.role_id,tripy_role.role_title,tripy_login.role_id,tripy_login.login_email FROM tripy_role JOIN tripy_login ON tripy_role.role_id = tripy_login.role_id AND tripy_role.role_title='admin' ORDER BY tripy_login.login_id");
$email_admin_row=mysqli_fetch_array($email_admin_query);
$admin_email=$email_admin_row['login_email'];
$filename=basename($_SERVER['REQUEST_URI']);
$file=pathinfo($filename,PATHINFO_FILENAME);
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Tripy</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>