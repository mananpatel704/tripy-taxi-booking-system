<?php
include("includes/main_header.php");
?>
<?php
if(isset($_POST['submit']))
{
   $login_email=$_POST['login_email'];

    $query=mysqli_query($conn,"SELECT * FROM tripy_login WHERE login_email='$login_email'");
    
    if(mysqli_num_rows($query)>0)
    {
        //echo "email match";
        $to = $login_email;
        $subject = "Reset Password Request";
        
        
        
        $message = "
        <html>
        <head>
        <title>Reset Password</title>
        </head>
        <body>
        <p>Dear User,</p>
        <p>Please click on the following link to reset your password:</p>
        <p><a style='color: black; background: #f7c621; padding: 12px 70px; border-radius: 25px; font-size: 18px; font-weight: 600;' href='http://localhost/tripy/reset_password.php?login_email=".$login_email."'>Reset Password</a></p>
        </body>
        </html>
        ";
        
        
        
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: <rishikatharotiya8385@gmail.com>' . "\r\n";
        
        if(mail($to,$subject,$message,$headers))
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
    else
    {
      $result='<div class="alert alert-danger alert-dismissable fade show mb-0">
      <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Warning!</strong> Better check yourself, youre not looking too good.</div>';
    }
}
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
          <div class="contact_form">
            <h4>
              FORGOT PASSWORD
            </h4>
            <h6 style="color: wheat">Enter your email address below and we'll send you password reset instructions.</h6>
            <?php
                if(isset($result))
                {
                echo $result;
                }
            ?>
            <form action="" method="post" >
           
              <input type="text" placeholder="email"  name="login_email">
              <input style="color: black;background-color: #f8f85c;" type="submit" name="submit" >
              

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