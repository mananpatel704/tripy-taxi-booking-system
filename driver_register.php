<?php
include("includes/main_header.php");
?>
<?php

if (isset($_POST['submit'])) 
{
    $driver_fname = $_POST['driver_fname'];
    $driver_lname = $_POST['driver_lname'];
    $driver_username = $_POST['driver_username'];
    $driver_email = $_POST['driver_email'];
    $driver_password = md5($_POST['driver_password']);

    $driver_thumb_org = $_FILES["driver_thumb"]["name"];
    $driver_thumb_tmp = $_FILES["driver_thumb"]["tmp_name"];
    $targetfile = "uploads/" . $driver_thumb_org;
    move_uploaded_file($driver_thumb_tmp, $targetfile);

    $role_id = $_POST['role_id'];

    $driver_phone = $_POST['driver_phone'];
    $driver_licence_org = $_FILES["driver_licence"]["name"];
    $driver_licence_tmp = $_FILES["driver_licence"]["tmp_name"];
    $targetfile = "uploads/" . $driver_licence_org;
    move_uploaded_file($driver_licence_tmp, $targetfile);

    $driver_adhar_card_org = $_FILES["driver_adhar_card"]["name"];
    $driver_adhar_card_tmp = $_FILES["driver_adhar_card"]["tmp_name"];
    $targetfile = "uploads/" . $driver_adhar_card_org;
    move_uploaded_file($driver_adhar_card_tmp, $targetfile);

    $vehicle_name = $_POST['vehicle_name'];
    $vehicle_type = $_POST['vehicle_type'];

    $login_query=mysqli_query($conn,"insert into tripy_login (login_fname,login_lname,login_username,login_email,login_password,login_thumb,role_id) values ('$driver_fname','$driver_lname','$driver_username','$driver_email','$driver_password','$driver_thumb_org',$role_id)");
    $login_id = mysqli_insert_id($conn);
    if($login_query)
    {
        $result='<div class="alert alert-success alert-dismissable fade show mb-0 result_msg">
        <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Success!</strong> Driver Register Successfully.</div>';

        $driver_query = mysqli_query($conn, "insert into tripy_driver (login_id,driver_phone,driver_licence,driver_adhar_card,vehicle_name,vehicle_type) values ($login_id,$driver_phone,'$driver_licence_org','$driver_adhar_card_org','$vehicle_name','$vehicle_type')");

        $notification_query=mysqli_query($conn,"insert into tripy_notification(login_id,notification_message) values (1,'New Driver is Register')");

    // driver email
    if ($driver_query) {
        $to = "$driver_email";
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

    <h2>Dear '$driver_fname'</h2>
    <p>We are pleased to inform you that your registration as a driver in 'TRIPY' has been successful. Below are your registration details:</p>
    <table>
        <tr>
            <th>Driver First Name</th>
            <td>$driver_fname</td>
        </tr>
        <tr>
            <th>Driver Last Name</th>
            <td>$driver_lname</td>
        </tr>
        <tr>
            <th>Driver Username</th>
            <td>$driver_username</td>
        </tr>
        <tr>
            <th>Driver Email</th>
            <td>$driver_email</td>
        </tr>
        <tr>
            <th>Driver Phone</th>
            <td>$driver_phone</td>
        </tr>
        <tr>
            <th>Vehicle Type</th>
            <td>$vehicle_type</td>
        </tr>
        <tr>
            <th>Vehicle Name</th>
            <td>$vehicle_name</td>
        </tr>
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
        $headers .= 'From: <rishikatharotiya8385@gmail.com>' . "\r\n";
        // $headers .= 'Cc: myboss@example.com' . "\r\n";

        if (mail($to, $subject, $message, $headers))
        {
            $result='<div class="alert alert-success alert-dismissable fade show mb-0 result_msg">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Success!</strong> Mail Sent Successfully.</div>';
        } 
        else 
        {
            $result='<div class="alert alert-danger alert-dismissable fade show mb-0">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Warning!</strong> Mail Not Sent.</div>';
        }

        //admin email

        $to = $admin_email;
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

    <h2>Dear '$driver_fname'</h2>
    <p>We are pleased to inform you that your registration as a driver in 'TRIPY' has been successful. Below are your registration details:</p>
    <table>
        <tr>
            <th>Driver First Name</th>
            <td>$driver_fname</td>
        </tr>
        <tr>
            <th>Driver Last Name</th>
            <td>$driver_lname</td>
        </tr>
         <tr>
            <th>Driver Username</th>
            <td>$driver_username</td>
        </tr>
        <tr>
            <th>Driver Email</th>
            <td>$driver_email</td>
        </tr>
        <tr>
            <th>Driver Phone</th>
            <td>$driver_phone</td>
        </tr>
        <tr>
            <th>Vehicle Type</th>
            <td>$vehicle_type</td>
        </tr>
        <tr>
            <th>Vehicle Name</th>
            <td>$vehicle_name</td>
        </tr>
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
        $headers .= 'From: <rishikatharotiya8385@gmail.com>' . "\r\n";
        // $headers .= 'Cc: myboss@example.com' . "\r\n";

        if (mail($to, $subject, $message, $headers))
        {
            $result='<div class="alert alert-success alert-dismissable fade show mb-0 result_msg">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Success!</strong> Mail Sent Successfully.</div>';
        } 
        else 
        {
            $result='<div class="alert alert-danger alert-dismissable fade show mb-0">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Warning!</strong> Mail Not Sent.</div>';
        }
    }
}
}
$driver_data = mysqli_query($conn, "select * from tripy_driver");
?>


<body class="sub_page">

    <div class="hero_area">
        <!-- header section strats -->
        <?php
        include("includes/navbar.php");
        ?>
        <!-- end header section -->
    </div>

    <!-- contact section -->

    <section class="contact_section layout_padding">
        <div class="container">
            <div class="heading_container">

            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5  offset-md-1">
                    <div class="contact_form mb-2">
                        <h4>Driver Registration Form </h4>
                        <?php
                            if(isset($result))
                            {
                            echo $result;
                            }
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="text" placeholder="first name" name="driver_fname">
                            <input type="text" placeholder="last name" name="driver_lname">
                            <input type="text" placeholder="User name" name="driver_username">
                            <input type="email" placeholder="email" name="driver_email">
                            <input type="password" placeholder="password" name="driver_password">
                            <input class="form-control" type="file" placeholder="file" name="driver_thumb">
                            <?php
                                $role_query=mysqli_query($conn,"select * from tripy_role where role_title='driver'");
                                $role_data=mysqli_fetch_array($role_query);
                                ?>
                                <input type="hidden" name="role_id" placeholder="role_id" value="<?php echo $role_data['role_id']; ?>">



                            <input type="text" placeholder="contact number" name="driver_phone">



                            <p style="color: white;
    margin-top: 15px;
    margin-bottom: 0px;">Select Licence:</p>
                            <input style="margin-top: 0px;" class="form-control " type="file"
                                placeholder="select id proof" name="driver_licence">

                            <p style="color: white;
    margin-top: 15px;
    margin-bottom: 0px;">Select AdharCard:</p> <input class="form-control" type="file" placeholder="select adhar card"
                                name="driver_adhar_card">

                            <select class="form-control mb-3" name="vehicle_type">

                                <option value="two-wheeler">one-wheeler</option>
                                <option value="two-wheeler">two-wheeler</option>
                                <option value="three-wheeler">three-wheeler</option>
                                <option value="four-wheeler">four-wheeler</option>
                            </select>
                            <input type="text" name="vehicle_name" placeholder="vehical name">

                            <input type="submit" style="color: black;background-color: #f8f85c;" name="submit">
                        </form>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="img-box">
                        <img src="images/contact-img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact section -->

    <!-- info section -->

    <?php
    include("includes/subscribe.php");
    ?>

    <!-- end info section -->

    <!-- footer section -->
    <?php
    include("includes/footer.php");
    ?>
    <!-- footer section -->

    <?php
    include("includes/main_footer.php");
    ?>