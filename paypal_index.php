<?php 
    /* coded by Rahul Barui ( https://github.com/Rahul-Barui ) */

    // Include paypal configuration file 
    include_once 'paypal_config.php';

    // Include database connection file 
    $conn = mysqli_connect("localhost","root","","tripy_db");
?>
<html>
    <head>
        <title>Tripy Payment</title>
        <!-- <title> Paypal Payment Gateway Integration in PHP </title> -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" type="text/css" href="css/design.css">
    </head>
    <body>

        <div class="container">
            <h2 style="text-align: center; color: blue;">Paypal Payment Gateway Integration in PHP </h2>

            <?php 

            // $ride_data=mysqli_query($conn,"select * from tripy_ride");
            // $ride_row=mysqli_fetch_array($ride_data);

            $sql = "SELECT * FROM `tripy_ride`";
            $res = mysqli_query($conn,$sql) or die("MySql Query Error".mysqli_error($conn));
            while($row=mysqli_fetch_assoc($res)){
            ?>
            
            <form action="<?php echo PAYPAL_URL; ?>" method="post">

                <div class="col-md-4 column productbox">

                    <!-- Paypal business test account email id so that you can collect the payments. -->
                    <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">

                    <!-- Buy Now button. -->
                    <input type="hidden" name="cmd" value="_xclick">

                    <!-- Details about the item that buyers will purchase. -->
                    <input type="hidden" name="item_name" value="<?php echo $row['trip_user_name']; ?>">
                    <input type="hidden" name="item_number" value="<?php echo $row['ride_id']; ?>">
                    <input type="hidden" name="amount" value="<?php echo $row['trip_payment']; ?>">
                    <input type="hidden" name="id" value="<?php echo $row['login_id'];?>"/>

                    <!-- Paypal currency -->
                    <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">

                    <!-- Success and cancel URLs -->
                    <input type='hidden' name='cancel_return' value='<?php echo PAYPAL_CANCEL_URL; ?>'>
                    <input type='hidden' name='return' value='<?php echo PAYPAL_RETURN_URL; ?>'>

                    <!-- <img src="images/<?php echo $row['image'];?>" class="img-responsive"> -->
                    <div class="producttitle">Name : <?php echo $row['trip_user_name'];?></div>
                    <div class="producttitle">ride_id : <?php echo $row['ride_id'];?></div>
                    <div class="producttitle">login_id : <?php echo $row['login_id'];?></div>
                    <div class="productprice">
                        <div class="pull-right">

                            <!-- payment button. -->
                            <button type="submit" class="btn btn-primary btn-sm" name="submit" role="button">Buy Now</button>

                        </div>
                        <div class="pricetext">price : $<?php echo $row['trip_payment'];?></div>
                    </div>
                </div>
            </form>
            <?php 
                }
             ?>
        </div>
       
    </body>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>

</html>