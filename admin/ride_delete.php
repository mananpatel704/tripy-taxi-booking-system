<?php
$ride_id=$_GET['ride_id'];
$conn=mysqli_connect("localhost","root","","tripy_db");
$query=mysqli_query($conn,"delete from tripy_ride where ride_id=$ride_id");
if($query)
{
    echo "data deleteed";
    // header("location:practice1.php");
}
?>