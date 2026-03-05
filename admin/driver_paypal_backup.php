<?php
include("includes/main_header.php");
include_once 'paypal_config.php';
$ride_id = $_GET['ride_id'];
$query = mysqli_query($conn, "select * from tripy_ride where ride_id=$ride_id");
$row = mysqli_fetch_array($query);
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
                                Make Your Payment
                            </h4>



                            <div class="mt-3">
                                <form action="<?php echo PAYPAL_URL; ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">

                                    <!-- Buy Now button. -->
                                    <input type="hidden" name="cmd" value="_xclick">

                                    <!-- Details about the item that buyers will purchase. -->
                                    <input type="hidden" name="item_name" value="<?php echo $row['trip_user_name']; ?>">
                                    <input type="hidden" name="item_number" value="<?php echo $row['ride_id']; ?>">
                                    <input type="hidden" name="amount" value="<?php echo $row['trip_payment']; ?>">
                                    <input type="hidden" name="id" value="<?php echo $row['login_id']; ?>" />

                                    <!-- Paypal currency -->
                                    <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">

                                    <!-- Success and cancel URLs -->
                                    <input type='hidden' name='cancel_return' value='<?php echo PAYPAL_CANCEL_URL; ?>'>
                                    <input type='hidden' name='return' value='<?php echo PAYPAL_RETURN_URL; ?>'>
                                    <div class="btm_input">
                                        <button class="submit" name="submit" value="submit"
                                            style="padding-top: 5px; padding-bottom: 5px" role="button">Click
                                            Here</button>
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
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
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
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
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
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
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
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et amet, consectetur adipiscing
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
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et amet, consectetur adipiscing
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
                                It is a long established fact that a reader will be distracted by the readable content
                                of a page when distribution of letters
                            </p>
                        </div>
                        <div class="text-box">
                            <h5>
                                How it works
                            </h5>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable content
                                of a page when distribution of letters
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
                            It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its
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
                            It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its
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
                            It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its
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