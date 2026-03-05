<?php
session_start();
unset($_SESSION['admin_login_id']);
header("Location:login.php");
?>