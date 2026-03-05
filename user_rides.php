<?php
include("includes/main_header.php");

if (isset($_POST['submit'])) {
  $type_id = $_POST['type_id'];
  $type_query = mysqli_query($conn, "select * from tripy_type where type_title='$type_id'");
  $type_row = mysqli_fetch_array($type_query);
  $new_type_id = $type_row['type_id'];

  $login_id = $_SESSION['login_id'];
  $trip_user_name = $_POST['trip_user_name'];
  $trip_user_address = $_POST['trip_user_address'];
  $trip_user_phone = $_POST['trip_user_phone'];

  $trip_pickup_place = $_POST['trip_pickup_place'];
  list($pickup_latitude, $pickup_longitude) = getCoordinates($trip_pickup_place);

  $trip_pickup_time = $_POST['trip_pickup_time'];
  $trip_pickup_date = $_POST['trip_pickup_date'];
  $trip_drop_place = $_POST['trip_drop_place'];
  list($drop_latitude, $drop_longitude) = getCoordinates($trip_drop_place);

  $distance = getDistance($pickup_latitude, $pickup_longitude, $drop_latitude, $drop_longitude);
  
  $trip_drop_time = $_POST['trip_drop_time'];
  $trip_drop_date = $_POST['trip_drop_date'];

}
//   if ($query) 
//   {
//     $last_id = mysqli_insert_id($conn);
//     $result = '<div class="alert alert-success alert-dismissable fade show mb-0 result_msg">
//                                     <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Success!</strong> Ride Booked Successfully. Please complete your payment with this link <a href="payment.php?ride_id='.$last_id.'">Click Here</a></div>';
//   } 
//   else 
//   {
//     $result = '<div class="alert alert-danger alert-dismissable fade show mb-0">
//                                     <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Attention!</strong> Ride Not Booked.</div>';
//   }

$ride_data = mysqli_query($conn, "select * from tripy_ride where login_id=$_SESSION[login_id]");
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
    <?php
        if (isset($result)) 
        {
            echo $result;
        }
    ?>
    <!-- <div class="container"> -->
    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">

        <tr>
            <th>Type Title</th>
            <th>User Name</th>
            <th>User Address</th>
            <th>User Phone</th>
            <th>Pickup Place</th>
            <th>Pickup Time</th>
            <th>Pickup Date</th>
            <th>Drop Place</th>
            <th>Drop Time</th>
            <th>Drop Date</th>    
            <th>Get Receipt</th>
            <th>Cancel Trip</th>    
        </tr>
        <?php
            while($ride_row=mysqli_fetch_array($ride_data))
            {
              $type_query=mysqli_query($conn,"select * from tripy_type where type_id=$ride_row[type_id]");
              $type_row=mysqli_fetch_array($type_query);
        ?>
            <tr>
              <td><?php echo $type_row['type_title']; ?></td>
              <td><?php echo $ride_row['trip_user_name']; ?></td>
              <td><?php echo $ride_row['trip_user_address']; ?></td>
              <td><?php echo $ride_row['trip_user_phone']; ?></td>
              <td><?php echo $ride_row['trip_pickup_place']; ?></td>
              <td><?php echo $ride_row['trip_pickup_time']; ?></td>
              <td><?php echo $ride_row['trip_pickup_date']; ?></td>
              <td><?php echo $ride_row['trip_drop_place']; ?></td>
              <td><?php echo $ride_row['trip_drop_time']; ?></td>
              <td><?php echo $ride_row['trip_drop_date']; ?></td>  
              <td><a href="get_receipt.php?ride_id=<?php echo $ride_row['ride_id']; ?>"O>Receipt</a></td>
              <td><?php
              if($ride_row['status']==1){
              ?>
                <button style="background-color: yellow;" class="status" data_id="<?php echo $ride_row['ride_id']; ?>" ><b>Cancelled</b></button>
              <?php
              }
              else
              {
                echo "<b>Cancelled</b>";
              }
              ?></td>
            </tr>
          <?php
            }
          ?>
    </table>
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