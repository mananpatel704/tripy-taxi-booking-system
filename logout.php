<?php
session_start();
unset($_SESSION['front_login_id']);
header("Location:login.php");
?>
