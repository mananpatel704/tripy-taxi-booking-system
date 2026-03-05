<?php
$role_id=$_GET['role_id'];
$conn=mysqli_connect("localhost","root","","tripy_db");
$query=mysqli_query($conn,"delete from tripy_role where role_id=$role_id");
if($query)
{
    echo "data deleteed";
    // header("location:practice1.php");
}
?>