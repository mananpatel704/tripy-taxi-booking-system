<?php
$conn=mysqli_connect("localhost","root","","tripy_db");

$action=$_POST['action'];
if($action=='ride_approve')
{
    $ride_approve=$_POST['ride_approve'];
    $ride_id=$_POST['ride_id'];
    if($ride_approve==1)
    {
        $update_ride=mysqli_query($conn,"update tripy_ride set ride_approve=1 and status=1 where ride_id=$ride_id");
        if($update_ride)
        {
            $notification_query=mysqli_query($conn,"insert into tripy_notification(login_id,notification_message) values (2,'Driver Approved Successfully')");
            echo "Ride Approved";
        }
    }
}
else if($action=='ride_not_approve')
{
    $ride_approve=$_POST['ride_approve'];
    $ride_id=$_POST['ride_id'];
    if($ride_approve==0)
    {
        $update_ride=mysqli_query($conn,"update tripy_ride set ride_approve=0 and status=0 where ride_id=$ride_id");
        if($update_ride)
        {
            $notification_query=mysqli_query($conn,"insert into tripy_notification(login_id,notification_message) values (2,'Driver Not Approved')");
            echo "Ride Not Approved";
        }
    }
}
else if($action=='driver_approve')
{
    $approve=$_POST['approve'];
    $driver_id=$_POST['driver_id'];
if($approve==1)
{
    $update_driver=mysqli_query($conn,"update tripy_driver set approved=1 where driver_id=$driver_id");
    if($update_driver)
    {
        
        $driver_login_id=mysqli_query($conn,"select * from tripy_driver where driver_id=$driver_id");
        $driver_login_id_row=mysqli_fetch_array($driver_login_id);
        $driver_select=mysqli_query($conn,"select * from tripy_login where login_id=$driver_login_id_row[login_id]");
        $driver_row=mysqli_fetch_array($driver_select);
        $login_fname=$driver_row['login_fname'];
        $notification_query=mysqli_query($conn,"insert into tripy_notification(login_id,notification_message) values ($driver_login_id_row[login_id],'Driver Approved')");
        $to = $driver_row['login_email'];
        $subject = "Driver email";

        $message = "
        <html>
        <head>
        <title>driver approve email</title>
        </head>    
        <body>
            <!DOCTYPE html>
<head>
    <title>Driver Registration Successful</title>
    <style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
        
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>    
<h1>WELCOME TO 'TRIPY'</h1>

    <h2>Dear '$login_fname'</h2>
    <p>We are pleased to inform you that your detail has been chacked , and you are approved for driver ride:</p>
    <table>
        
    </table>
    <p>If you have any questions or need further assistance, please do not hesitate to contact us.</p>
    <p>Best Regards,<br/>The Team</p>
</body>
</html>

        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <mananpatel704@gmail.com>' . "\r\n";
        // $headers .= 'Cc: myboss@example.com' . "\r\n";

        if (mail($to, $subject, $message, $headers)) {
            echo "mail send";
        } else {
            echo "error";
        }

    }
}
}
else if($action=='driver_not_approve')
{
    $approve=$_POST['approve'];
    $driver_id=$_POST['driver_id'];
    if($approve==0)
    {
            $update_driver=mysqli_query($conn,"update tripy_driver set approved=0 where driver_id=$driver_id");
            if($update_driver)
            {
                $notification_query=mysqli_query($conn,"insert into tripy_notification(login_id,notification_message) values ($driver_id,'Driver Not Approved')");
                echo "Success";
            }
    }
}
else if($action=='allocate_driver_ride')
{
    $ride_id=$_POST['ride_id'];
    $driver_id=$_POST['driver_id'];
            $insert_driver_ride=mysqli_query($conn,"insert into tripy_driver_ride (driver_id,ride_id) values ($driver_id,$ride_id)");
            if($insert_driver_ride)
            {
                $notification_query=mysqli_query($conn,"insert into tripy_notification(login_id,notification_message) values (3,'New Ride Allocated'),(2,'New Ride Allocated')");
                echo "Success";
            }
    
}
else if($action=='accepted_status')
{
    $accepted_status=$_POST['accepted_status'];
    $driver_ride_id=$_POST['driver_ride_id'];
    echo "update tripy_driver_ride set accepted_status='$accepted_status' where driver_ride_id=$driver_ride_id";
        $driver_rides=mysqli_query($conn,"update tripy_driver_ride set accepted_status='$accepted_status' where driver_ride_id=$driver_ride_id");
        if($driver_rides)
        {
            $notification_query=mysqli_query($conn,"insert into tripy_notification(login_id,notification_message) values (1,'Ride Accepted'),(3,'Ride Accepted')");
            echo "Ride Accepted";
        }
}
else if($action=='closed_status')
{
    $closed_status=$_POST['closed_status'];
    $driver_ride_id=$_POST['driver_ride_id'];
    echo "update tripy_driver_ride set closed_status='$closed_status' where driver_ride_id=$driver_ride_id";
        $driver_rides=mysqli_query($conn,"update tripy_driver_ride set closed_status='$closed_status' where driver_ride_id=$driver_ride_id");
        if($driver_rides)
        {
            $notification_query=mysqli_query($conn,"insert into tripy_notification(login_id,notification_message) values (1,'Ride Closed'),(3,'Ride Closed')");
            echo "Ride Closed";
        }
}
else
{
    echo "error";
}
?>