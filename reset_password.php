<?php
include("includes/main_header.php");
?>
<?php
$user_email=$_GET['user_email'];

if (isset($_POST['submit']))
 {

    $user_newpassword = md5($_POST['user_newpassword']);
    $user_conpassword = md5($_POST['user_conpassword']);

        if($user_newpassword==$user_conpassword) 
     {
        

         $query=mysqli_query($conn,"update tripy_user set user_password='$user_newpassword' where user_email='$user_email'");

        if ($query)
         {
            echo "password changed";
        }
         else
         {
            echo "error";
        }
    }
    
    else
    
    {
        echo "new password and confirm password did not match";
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
              RESET PASSWORD
            </h4>
            <form action="" method="post" >
            <input  type="password" name="user_newpassword" placeholder="enter new password"
            autocomplete="off">
            <input  type="password" name="user_conpassword" placeholder="confirm password"
            autocomplete="off">           
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