
<?php
include("includes/main_header.php");


if(isset($_POST['submit']))
{
    $contact_name=$_POST['contact_name'];
    $contact_phone=$_POST['contact_phone'];
    $contact_message=$_POST['contact_message'];
    

   
        $query=mysqli_query($conn,"insert into tripy_contact (contact_name,contact_phone,contact_message) values
     ('$contact_name',$contact_phone,'$contact_message')");

    if($query)
    {

        // echo "Inserted Successfully";
        $to = $admin_email;
        $subject = "HTML Email";
        
        $reset_link = "http://localhost/tripy/admin/reset_password.php?admin_email=";
        
        
        $message = '<!DOCTYPE html> <html> <head> <style> body { font-family: sans-serif; } .container { width: 80%; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #f2f2f2; } h1 { text-align: center; font-size: 24px; margin-bottom: 20px; } .email-content { padding: 10px; } ul { list-style-type: disc; margin-left: 20px; } li { margin-bottom: 5px; } .footer { text-align: right; margin-top: 20px; } .logo { display: inline-block; margin-top: 10px; } </style> </head> <body> <div class="container"> <h1>Contact Us Details</h1> <div class="email-content"> To: <br> Admin, <br> <br> <ul> <li><b>Name&nbsp;&nbsp; : &nbsp;&nbsp;</b>'.$contact_name.'</li> <li><b>Phone&nbsp;&nbsp; : &nbsp;&nbsp;</b>'.$contact_phone.'</li> <li><b>Message&nbsp;&nbsp; : &nbsp;&nbsp;</b>'.$contact_message.'</li></ul> <br> This user is looking forward to use your service for their use.. Please connect with his/her and resolve their query</div> </body> </html>';

        
        
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: <mananpatel704@gmail.com>' . "\r\n";
        
        if(mail($to,$subject,$message,$headers))
        {
            echo "mail sent";
        }
        else
        {
            echo "error";
        }
    }
    else{
        echo "Error";
    }

    

  
}

// $contact_data=mysqli_query($conn,"select * from tripy_contact");

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
              Get In touch
            </h4>
            <form action="" method="post">
              <input type="text" placeholder="Name" name="contact_name">
              <input type="text" placeholder="Phone number" name="contact_phone">
              <input type="text" placeholder="Message" class="message_input" name="contact_message">
              <button name="submit" placeholder="submit">Send</button>
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