<?php
$conn = mysqli_connect("localhost","root","","tripy");

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>