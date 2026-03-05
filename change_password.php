<?php
include("includes/main_header.php");

$login_id=$_SESSION['login_id'];
if(isset($_POST['submit']))
{
    $login_oldpassword=md5($_POST['login_oldpassword']);
    $login_newpassword=md5($_POST['login_newpassword']);
    $login_conpassword=md5($_POST['login_conpassword']);

    $query=mysqli_query($conn,"SELECT * FROM tripy_login WHERE login_password='$login_oldpassword'");
    // echo "SELECT * FROM tripy_user WHERE user_password='$user_oldpassword'";
    // exit;

    if(mysqli_num_rows($query)>0)
    {
        if($login_newpassword==$login_conpassword)
        {
            $query=mysqli_query($conn,"update tripy_login set login_password='$login_newpassword' where login_id=$login_id" );
            if($query)
            {
              $result='<div class="alert alert-success alert-dismissable fade show mb-0 result_msg">
              <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Success!</strong> Password Changed.</div>';
            }
        }
        else
        {
          $result='<div class="alert alert-danger alert-dismissable fade show mb-0">
          <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Warning!</strong> New Password And Conform Password Did Not Match</div>';
        }
    }
    else
    {
      $result='<div class="alert alert-danger alert-dismissable fade show mb-0">
      <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Warning!</strong> Old Password Does Not Match.</div>';
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
              CHANGE PASSWORD
            </h4>
            <h6 style="color: wheat">Enter your email address below and we'll send you password reset instructions.</h6>
            <?php
              if(isset($result))
              {
              echo $result;
              }
            ?>
            <form action="" method="post" >
           
            <input  type="text" placeholder="old password" name="login_oldpassword">
            <input type="text" placeholder=" new password" name="login_newpassword">
            <input type="text" placeholder="con password" name="login_conpassword">       
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