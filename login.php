<?php
include("includes/main_header.php");
?>
<?php
if(isset($_SESSION['front_login_id']))
{
    header("Location:index.php");
}
if(isset($_POST['submit']))
{
    $login_email=$_POST['login_email'];
    $login_password=md5($_POST['login_password']);
    $query=mysqli_query($conn,"select * from tripy_login where login_email='$login_email' AND login_password='$login_password'");
    
    
    if(mysqli_num_rows($query)>0)
    {
        $login_row=mysqli_fetch_array(($query));
        $_SESSION['front_login_id']=$login_row['login_id'];
        $_SESSION['login_id']=$login_row['login_id'];
        $_SESSION['login_fname']=$login_row['login_fname'];
        $_SESSION['login_lname']=$login_row['login_lname'];
        $_SESSION['login_email']=$login_row['login_email'];
        $_SESSION['login_password']=$login_row['login_password'];
        $_SESSION['user_phone']=$user_row['user_phone'];
        $_SESSION['user_type_id']=$user_row['user_type_id'];
        $_SESSION['user_id_proof']=$user_row['user_id_proof'];
        $_SESSION['user_adhar_card']=$user_row['user_adhar_card'];
        if($_SESSION['role_id'] ==2)
        {
            $user_data=mysqli_query($conn, "SELECT * from tripy_user WHERE login_id=$_SESSION[login_id]");
            $user_row=mysqli_fetch_array($user_data);
            $_SESSSION['user_id'] = $user_row['user_id'];
        }

        if($_SESSION['role_id'] ==3)
        {
            $driver_data=mysqli_query($conn, "SELECT * from tripy_driver WHERE login_id=$_SESSION[login_id]");
            $driver_row=mysqli_fetch_array($driver_data);
            $_SESSION['driver_id'] = $driver_row['driver_id'];
        }
        header("Location:index.php");
    }
    else
    {
      $result='<div class="alert alert-danger alert-dismissable fade show mb-0">
      <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Warning!</strong> User Login Failed.</div>';    
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
             USER LOGIN
            </h4>
            <?php
                if(isset($result))
                {
                echo $result;
                }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
           
              <input type="text" placeholder="email"  name="login_email">
              <input type="text" placeholder="password"  name="login_password">

              <a  href="forgot_password.php"> <div style="color: white;
    text-align: right;
    margin-bottom: 10px;"> Forgot password?</div></a>

              
              <input style="color: black;background-color: #f8f85c;" type="submit" name="submit" >
              <div class="text-center not" style="color:white" >Not a member?
                <a class="color-blue blue" style="color:blue" href="user_register.php">Create account</a>
            </div>

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