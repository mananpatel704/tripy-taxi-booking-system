<?php
include("includes/main_header.php");
?>
<?php

if(isset($_POST['submit']))
{
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password =md5($_POST['user_password']);

    $user_thumb_org=$_FILES["user_thumb"]["name"];
    $user_thumb_tmp=$_FILES["user_thumb"]["tmp_name"];
    $targetfile="uploads/".$user_thumb_org;
    move_uploaded_file($user_thumb_tmp,$targetfile);

    $role_id = $_POST['role_id'];
    $user_phone = $_POST['user_phone'];
    $user_type_id = $_POST['user_type_id'];

    $user_id_proof_org=$_FILES["user_id_proof"]["name"];
    $user_id_proof_tmp=$_FILES["user_id_proof"]["tmp_name"];
    $targetfile="uploads/".$user_id_proof_org;
    move_uploaded_file($user_id_proof_tmp, $targetfile);

    $user_adhar_card_org=$_FILES["user_adhar_card"]["name"];
    $user_adhar_card_tmp=$_FILES["user_adhar_card"]["tmp_name"];
    $targetfile="uploads/".$user_adhar_card_org;
    move_uploaded_file($user_adhar_card_tmp,$targetfile);
   
    
  // // INNER JOIN
  //   $login_query=mysqli_query($conn,"SELECT l.login_fname,l.login_lname,l.login_username,l.login_email,l.login_password,l.login_thumb,l.role_id,u.login_id,u.user_phone,u.user_type_id,u.user_id_proof,u.user_adhar_card FROM tripy_login AS l INNER JOIN tripy_user AS u ON l.login_id=u.login_id");

  //   if($login_query){

  //     $result='<div class="alert alert-success alert-dismissable fade show mb-0 result_msg">
  //     <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Success!</strong> User Register Successfully.</div>';

  //   }else{
  //     $result='<div class="alert alert-danger alert-dismissable fade show mb-0">
  //     <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Warning!</strong> Better check yourself, youre not looking too good.</div>';  
  //   }
  // }


$login_query=mysqli_query($conn,"insert into tripy_login (login_fname,login_lname,login_username,login_email,login_password,login_thumb,role_id) values ('$user_fname','$user_lname','$user_username','$user_email','$user_password','$user_thumb_org',$role_id)");
    
    $login_id = mysqli_insert_id($conn);
    if($login_query)
    {
        $user_query = mysqli_query($conn, "insert into tripy_user (login_id,user_phone,user_type_id,user_id_proof,user_adhar_card) values ($login_id,$user_phone,$user_type_id,'$user_id_proof_org','$user_adhar_card_org')");

        if($user_query)
        {
          $result='<div class="alert alert-success alert-dismissable fade show mb-0 result_msg">
          <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Success!</strong> User Register Successfully.</div>';        
        }
        else
        {
          $result='<div class="alert alert-danger alert-dismissable fade show mb-0">
          <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Warning!</strong> Better check yourself, youre not looking too good.</div>';        
        }
    }
}
$type_data=mysqli_query($conn,"select * from tripy_type");
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
             User Registration Form  
            </h4>
            <?php
                if(isset($result))
                {
                echo $result;
                }
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
              <input type="text" placeholder="first name" name="user_fname">
              <input type="text" placeholder="last name" name="user_lname">
              <input type="text" placeholder="User name" name="user_username">
              <input type="email" placeholder="email"  name="user_email">
              <input type="password" placeholder="password"  name="user_password">
              <input class="form-control" type="file" placeholder="file" name="user_thumb">
              <?php
                $role_query=mysqli_query($conn,"select * from tripy_role where role_title='user'");
                $role_data=mysqli_fetch_array($role_query);
              ?>
              <input type="hidden" name="role_id" placeholder="role_id" value="<?php echo $role_data['role_id']; ?>">
              <input type="text" placeholder="contact number"  name="user_phone">
              
              <select class="form-control"  name="user_type_id"> 
                             <?php
                                while($type_row=mysqli_fetch_array($type_data))
                                {
                              ?>
                              <tr>
                                <option value="<?php echo $type_row['type_id']; ?>"> <td><?php echo $type_row['type_title']; ?></td>  </option>
                              </tr>
                              <?php 
                                }
                              ?>  
              </select>
                                
       <p style="color: white;
    margin-top: 15px;
    margin-bottom: 0px;">Select Id Proof:</p>
       <input style="margin-top: 0px;" class="form-control "type="file" placeholder="select id proof"  name="user_id_proof">

       <p style="color: white;
    margin-top: 15px;
    margin-bottom: 0px;">Select AdharCard:</p> <input class="form-control"type="file" placeholder="select adhar card"  name="user_adhar_card">
              <input type="submit" style="color: black;background-color: #f8f85c;"name="submit" >
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