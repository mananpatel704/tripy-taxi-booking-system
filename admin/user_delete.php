<?php
$user_id=$_GET['user_id'];
$conn=mysqli_connect("localhost","root","","tripy_db");
$query=mysqli_query($conn,"delete from tripy_user where user_id=$user_id");
if($query)
{
    echo "data deleteed";
    // header("location:practice1.php");
}
?>