<?php
$type_id=$_GET['type_id'];
$conn=mysqli_connect("localhost","root","","tripy_db");
$query=mysqli_query($conn,"delete from tripy_type where type_id=$type_id");
if($query)
{
    echo "data deleteed";
    // header("location:practice1.php");
}
?>