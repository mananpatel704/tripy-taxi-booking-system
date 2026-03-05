<?php
$driver_id=$_GET['driver_id'];
$conn=mysqli_connect("localhost","root","","tripy_db");
$query=mysqli_query($conn,"delete from tripy_driver where driver_id=$driver_id");
if($query)
{
    echo "data deleteed";
    // header("location:practice1.php");
}
?>