<?php
include("includes/main_header.php");
?>
<?php
if (isset($_POST['submit'])) {
  function getCoordinates($place)
  {
    // URL encode the place name
    $place = urlencode($place);

    // OpenStreetMap Nominatim API URL for geocoding
    $url = "https://nominatim.openstreetmap.org/search?q=$place&format=json&limit=1";

    // Initialize cURL
    $ch = curl_init();
  

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'LatitudeLongitudeFinder');  // Required User-Agent header

    // Execute cURL request
    $response = curl_exec($ch);

    // Close cURL session
    curl_close($ch);

    // Decode the JSON response
    $data = json_decode($response, true);

    // Check if data is returned
    if (!empty($data)) {
      $latitude = $data[0]['lat'];
      $longitude = $data[0]['lon'];
      return [$latitude, $longitude];
    } else {
      return [null, null];
    }
  }


  function getDistance($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = 2)
  {
    // Calculate the distance in degrees
    $degrees = rad2deg(acos((sin(deg2rad($point1_lat)) * sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat)) * cos(deg2rad($point2_lat)) * cos(deg2rad($point1_long - $point2_long)))));

    // Convert the distance in degrees to the chosen unit (kilometres, miles or nautical miles)
    switch ($unit) {
      case 'km':
        $distance = $degrees * 111.13384; // 1 degree = 111.13384 km, based on the average diameter of the Earth (12,735 km)
        break;
      case 'mi':
        $distance = $degrees * 69.05482; // 1 degree = 69.05482 miles, based on the average diameter of the Earth (7,913.1 miles)
        break;
      case 'nmi':
        $distance =  $degrees * 59.97662; // 1 degree = 59.97662 nautic miles, based on the average diameter of the Earth (6,876.3 nautical miles)
    }
    return round($distance, $decimals);

  }
  


  $type_id = $_POST['type_id'];
  $type_query = mysqli_query($conn, "select * from tripy_type where type_title='$type_id'");
  $type_row = mysqli_fetch_array($type_query);
  $new_type_id = $type_row['type_id'];

  $login_id = $_SESSION['login_id'];
  $no_of_person = $_POST['no_of_person'];
  $trip_user_name = $_POST['trip_user_name'];
  $trip_user_address = $_POST['trip_user_address'];
  $trip_user_phone = $_POST['trip_user_phone'];
  $trip_user_email = $_POST['trip_user_email'];

  $trip_user_idproof_org = $_FILES["trip_user_idproof"]["name"];
  $trip_user_idproof_tmp = $_FILES["trip_user_idproof"]["tmp_name"];
  $targetfile = "uploads/" . $trip_user_idproof_org;
  move_uploaded_file($trip_user_idproof_tmp, $targetfile);

  $trip_pickup_place = $_POST['trip_pickup_place'];
  list($pickup_latitude, $pickup_longitude) = getCoordinates($trip_pickup_place);



  $trip_pickup_time = $_POST['trip_pickup_time'];
  $trip_pickup_date = $_POST['trip_pickup_date'];
  $trip_drop_place = $_POST['trip_drop_place'];
  list($drop_latitude, $drop_longitude) = getCoordinates($trip_drop_place);


  $distance = getDistance($pickup_latitude, $pickup_longitude, $drop_latitude, $drop_longitude);
  
  $trip_drop_time = $_POST['trip_drop_time'];
  $trip_drop_date = $_POST['trip_drop_date'];

  $trip_type=$_POST['trip_type'];
  $per_usd=83.50;
    if($trip_type=='AC')
    {
      $per_km_price=15;
      $trip_payment_inr=$distance*$per_km_price;
      $trip_payment=$trip_payment_inr/$per_usd;
    }
    else if($trip_type=='NON-AC')
    {
      $per_km_price=12;
      $trip_payment_inr=$distance*$per_km_price;
      $trip_payment=$trip_payment_inr/$per_usd;
    }
    else
    {
      echo "please select option";
    }

    

  $query = mysqli_query($conn, "insert into tripy_ride (type_id,login_id,no_of_person,trip_user_name,trip_user_address,trip_user_phone,trip_user_email,trip_user_idproof,trip_pickup_place,trip_pickup_time,trip_pickup_date,trip_drop_place,trip_drop_time,trip_drop_date,trip_type,trip_payment) values ($new_type_id,$login_id,$no_of_person,'$trip_user_name','$trip_user_address',$trip_user_phone,'$trip_user_email','$trip_user_idproof_org','$trip_pickup_place','$trip_pickup_time','$trip_pickup_date','$trip_drop_place','$trip_drop_time','$trip_drop_date','$trip_type',$trip_payment)");


  if ($query) {
    $notification_query=mysqli_query($conn,"insert into tripy_notification(login_id,notification_message) values ($login_id,'New Ride is Booked'),(1,'New Ride is Booked')");


    $last_id = mysqli_insert_id($conn);
    $result = '<div class="alert alert-success alert-dismissable fade show mb-0 result_msg">
                                    <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Success!</strong> Ride Booked Successfully. Please complete your payment with this link <a href="payment.php?ride_id='.$last_id.'">Click Here</a></div>';
  } else {
    $result = '<div class="alert alert-danger alert-dismissable fade show mb-0">
                                    <button class="close" data-dismiss="alert" aria-label="Close">×</button><strong>Attention!</strong> Ride Not Booked.</div>';
  }
}
$type_data = mysqli_query($conn, "select * from tripy_type");
?>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <?php
    include("includes/navbar.php");
    ?>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section ">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-7 ">
            <div class="box">
              <div class="detail-box">
                <h4>
                  Welcome to
                </h4>
                <h1>
                  Tripy
                </h1>
              </div>
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">

                    <div class="img-box">
                      <img src="images/slider-img.png" alt="">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="img-box">
                      <img src="images/slider-img.png" alt="">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="img-box">
                      <img src="images/slider-img.png" alt="">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="img-box">
                      <img src="images/slider-img.png" alt="">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="img-box">
                      <img src="images/slider-img.png" alt="">
                    </div>
                  </div>
                </div>
              </div>

              <div class="btn-box">
                <a href="" class="btn-1">
                  Read More
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <!-- about section -->

  <section class=" slider_section ">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-7 ">
          <div class="box">
            <div class="slider_form" style="margin-left: 300px;  width: 600px;">
              <h4>
                Get A Taxi Now
              </h4>
              <?php
                if (isset($result)) {
                    echo $result;
                }
                ?>
              <select class="form-control trip_usertype mb-3 mt-3" name="type_id">
                <option value="0">Select Type</option>
                <?php
                while ($type_row = mysqli_fetch_array($type_data)) {
                ?>
                  <tr>
                    <option value="<?php echo $type_row['type_title']; ?>">
                      <td><?php echo $type_row['type_title']; ?></td>
                    </option>
                  </tr>
                <?php
                }
                ?>
              </select>

              <div id="personal_form" class="mt-3">
                <form action="" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="" name="type_id" class="type_record">
                  <input type="number" placeholder="Number Of Person" name="no_of_person">
                  <input type="text" placeholder="User Name" name="trip_user_name">
                  <input type="text" placeholder="User Address" name="trip_user_address">
                  <input type="number" placeholder="User Phone" name="trip_user_phone">
                  <input type="email" placeholder="User Email" name="trip_user_email">
                  <input class="form-control" type="file" placeholder="User IDproof" name="trip_user_idproof">
                  <input type="text" placeholder="Pickup Place" name="trip_pickup_place">
                  <input type="time" placeholder="Pickup Time" name="trip_pickup_time">
                  <input type="date" placeholder="Pickup Date" name="trip_pickup_date">
                  <input type="text" placeholder="Drop Place" name="trip_drop_place">
                  <input type="time" placeholder="Drop Time" name="trip_drop_time">
                  <input type="date" placeholder="Drop Date" name="trip_drop_date">
                  <select name="trip_type" class="form-control mb-3">
                        <option value="0">Select Type</option>
                        <option value="AC">AC</option>
                        <option value="NON-AC">NON-AC</option>
                      </select>
                  <div class="btm_input">
                    <button class="submit" name="submit" value="submit" style="padding-top: 5px; padding-bottom: 5px">Book Now</button>
                  </div>
                </form>
              </div>

              <div id="group_form">
                <form action="" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="" name="type_id" class="type_record">
                  <input type="number" placeholder="Number Of Person" name="no_of_person">
                  <input type="text" placeholder="Group Name" name="trip_user_name">
                  <input type="text" placeholder="Group Address" name="trip_user_address">
                  <input type="number" placeholder="Group Phone" name="trip_user_phone">
                  <input type="email" placeholder="Group Email" name="trip_user_email">
                  <input class="form-control" type="file" placeholder="Group IDproof" name="trip_user_idproof">
                  <input type="text" placeholder="Group Pickup Place" name="trip_pickup_place">
                  <input type="time" placeholder="Group Pickup Time" name="trip_pickup_time">
                  <input type="date" placeholder="Group Pickup Date" name="trip_pickup_date">
                  <input type="text" placeholder="Group Drop Place" name="trip_drop_place">
                  <input type="time" placeholder="Group Drop Time" name="trip_drop_time">
                  <input type="date" placeholder="Group Drop Date" name="trip_drop_date">
                  <select name="trip_type" class="form-control mb-3">
                        <option value="0">Select Type</option>
                        <option value="AC">AC</option>
                        <option value="NON-AC">NON-AC</option>
                      </select>
                  <div class="btm_input">
                    <button class="submit" name="submit" value="submit" style="padding-top: 5px; padding-bottom: 5px">Book Now</button>
                  </div>
                </form>
              </div>

              <div id="parents_form">
                <form action="" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="" name="type_id" class="type_record">
                  <input type="number" placeholder="Number Of Person" name="no_of_person">
                  <input type="text" placeholder="parents Name" name="trip_user_name">
                  <input type="text" placeholder="parents Address" name="trip_user_address">
                  <input type="number" placeholder="parents Phone" name="trip_user_phone">
                  <input type="email" placeholder="parents Email" name="trip_user_email">
                  <input class="form-control" type="file" placeholder="parents IDproof" name="trip_user_idproof">
                  <input type="text" placeholder="parents Pickup Place" name="trip_pickup_place">
                  <input type="time" placeholder="parents Pickup Time" name="trip_pickup_time">
                  <input type="date" placeholder="parents Pickup Date" name="trip_pickup_date">
                  <input type="text" placeholder="parents Drop Place" name="trip_drop_place">
                  <input type="time" placeholder="parents Drop Time" name="trip_drop_time">
                  <input type="date" placeholder="parents Drop Date" name="trip_drop_date">
                  <select name="trip_type" class="form-control mb-3">
                        <option value="0">Select Type</option>
                        <option value="AC">AC</option>
                        <option value="NON-AC">NON-AC</option>
                      </select>
                  <div class="btm_input">
                    <button class="submit" name="submit" value="submit" style="padding-top: 5px; padding-bottom: 5px">Book Now</button>
                  </div>
                </form>
              </div>

              <div id="school_college_form">
                <form action="" method="post" enctype="multipart/form-data">
                  <input type="hidden" value="" name="type_id" class="type_record">
                  <input type="number" placeholder="Number Of Student" name="no_of_person">
                  <input type="text" placeholder="School/College Name" name="trip_user_name">
                  <input type="text" placeholder="School/College Address" name="trip_user_address">
                  <input type="number" placeholder="School/College Phone" name="trip_user_phone">
                  <input type="email" placeholder="School/College Email" name="trip_user_email">
                  <input class="form-control" type="file" placeholder="School/College IDproof" name="trip_user_idproof">
                  <input type="text" placeholder="School/College Pickup Place" name="trip_pickup_place">
                  <input type="time" placeholder="School/College Pickup Time" name="trip_pickup_time">
                  <input type="date" placeholder="School/College Pickup Date" name="trip_pickup_date">
                  <input type="text" placeholder="School/College Drop Place" name="trip_drop_place">
                  <input type="time" placeholder="School/College Drop Time" name="trip_drop_time">
                  <input type="date" placeholder="School/College Drop Date" name="trip_drop_date">
                  <select name="trip_type" class="form-control mb-3">
                        <option value="0">Select Type</option>
                        <option value="AC">AC</option>
                        <option value="NON-AC">NON-AC</option>
                      </select>
                  <div class="btm_input">
                    <button class="submit" name="submit" value="submit" style="padding-top: 5px; padding-bottom: 5px">Book Now</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- service section -->

  <section class="service_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Our <br>
          Taxi Services
        </h2>
      </div>
      <div class="service_container">
        <div class="box">
          <div class="img-box">
            <img src="images/delivery-man.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Private Driver
            </h5>
            <p>
              Lorem ipsum dolor sit ame
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/airplane.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Airport Transfer
            </h5>
            <p>
              Lorem ipsum dolor sit ame
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/backpack.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Luggage Transfer
            </h5>
            <p>
              Lorem ipsum dolor sit ame
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end service section -->

  <!-- news section -->

  <section class="news_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Our <br>
          News
        </h2>
      </div>
      <div class="news_container">
        <div class="box">
          <div class="date-box">
            <h6>
              01 Nov 2019
            </h6>
          </div>
          <div class="img-box">
            <img src="images/news-img.jpg" alt="">
          </div>
          <div class="detail-box">
            <h6>
              Eiusmod tempor incididunt
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
            </p>
          </div>
        </div>
        <div class="box">
          <div class="date-box">
            <h6>
              01 Nov 2019
            </h6>
          </div>
          <div class="img-box">
            <img src="images/news-img.jpg" alt="">
          </div>
          <div class="detail-box">
            <h6>
              Eiusmod tempor incididunt
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
            </p>
          </div>
        </div>
        <div class="box">
          <div class="date-box">
            <h6>
              01 Nov 2019
            </h6>
          </div>
          <div class="img-box">
            <img src="images/news-img.jpg" alt="">
          </div>
          <div class="detail-box">
            <h6>
              Eiusmod tempor incididunt
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end news section -->

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          What <br>
          Client <br>
          Says
        </h2>
      </div>
      <div class="client_container">
        <div class="carousel-wrap ">
          <div class="owl-carousel">
            <div class="item">
              <div class="box">
                <div class="img-box">
                  <img src="images/client-1.png" alt="">
                </div>
                <div class="detail-box">
                  <h3>
                    Aliqua
                  </h3>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et amet, consectetur adipiscing
                  </p>
                  <img src="images/quote.png" alt="">
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box">
                <div class="img-box">
                  <img src="images/client-2.png" alt="">
                </div>
                <div class="detail-box">
                  <h3>
                    Liqua
                  </h3>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et amet, consectetur adipiscing
                  </p>
                  <img src="images/quote.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- contact section -->

  <section class="contact_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          Any Problems <br>
          Any Questions
        </h2>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5  offset-md-1">
          <div class="contact_form">
            <h4>
              Get In touch
            </h4>
            <form action="">
              <input type="text" placeholder="Name">
              <input type="text" placeholder="Phone Number">
              <input type="text" placeholder="Message" class="message_input">
              <button>Send</button>
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

  <!-- app section -->

  <section class="app_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <h2>
              Download Our app
            </h2>
            <div class="text-box">
              <h5>
                details
              </h5>
              <p>
                It is a long established fact that a reader will be distracted by the readable content of a page when distribution of letters
              </p>
            </div>
            <div class="text-box">
              <h5>
                How it works
              </h5>
              <p>
                It is a long established fact that a reader will be distracted by the readable content of a page when distribution of letters
              </p>
            </div>
            <div class="btn-box">
              <a href="">
                <img src="images/playstore.png" alt="">
              </a>
              <a href="">
                <img src="images/appstore.png" alt="">
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/mobile.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end app section -->

  <!-- why section -->

  <section class="why_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Why <br>
          Choose Us
        </h2>
      </div>
      <div class="why_container">
        <div class="box">
          <div class="img-box">
            <img src="images/delivery-man-white.png" alt="" class="img-1">
            <img src="images/delivery-man-black.png" alt="" class="img-2">
          </div>
          <div class="detail-box">
            <h5>
              Best Drivers
            </h5>
            <p>
              It is a long established fact that a reader will be distracted by the readable content of a page when looking at its
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/shield-white.png" alt="" class="img-1">
            <img src="images/shield-black.png" alt="" class="img-2">
          </div>
          <div class="detail-box">
            <h5>
              Safe and Secure
            </h5>
            <p>
              It is a long established fact that a reader will be distracted by the readable content of a page when looking at its
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/repairing-service-white.png" alt="" class="img-1">
            <img src="images/repairing-service-black.png" alt="" class="img-2">
          </div>
          <div class="detail-box">
            <h5>
              24x7 support
            </h5>
            <p>
              It is a long established fact that a reader will be distracted by the readable content of a page when looking at its
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end why section -->

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