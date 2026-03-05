<?php
$conn=mysqli_connect("localhost","root","","tripy_db");
$ride_id=$_GET['ride_id'];
$ride_data=mysqli_query($conn,"select * from tripy_ride where ride_id=$ride_id");
$ride_row=mysqli_fetch_array($ride_data);

$driver_data=mysqli_query($conn,"select * from tripy_login where login_id=$ride_row[login_id]");
$driver_row=mysqli_fetch_array($driver_data);

$car_data=mysqli_query($conn,"select * from tripy_driver where login_id=$ride_row[login_id]");
$car_row=mysqli_fetch_array($car_data);

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

  list($pickup_latitude, $pickup_longitude) = getCoordinates($ride_row['trip_pickup_place']);


  list($drop_latitude, $drop_longitude) = getCoordinates($ride_row['trip_drop_place']);

  $distance = getDistance($pickup_latitude, $pickup_longitude, $drop_latitude, $drop_longitude);

require_once('tcpdf/tcpdf.php');

// Create new PDF document
$pdf = new TCPDF();

// Add a page
$pdf->AddPage();

// Custom HTML content
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ride Booking Receipt</title>
    <style>
        body {
            font-family: Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f5f9;
            background-image: linear-gradient(to bottom right, #eaf1f9, #f9fafc);
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }
        .receipt-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            max-width: 480px;
            width: 100%;
            border-top: 4px solid #4CAF50;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 15px;
            font-size: 1.6em;
        }
        .receipt-item {
            display: flex;
            justify-content: space-between;
            margin: 8px 0;
            font-size: 0.9em;
        }
        .receipt-item strong {
            color: #333;
        }
        .highlight {
            background-color: #f8faff;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #e1e5eb;
            margin-bottom: 15px; 
        }
        .total {
            font-weight: bold;
            color: #333;
            font-size: 1.1em;
            border-top: 1px solid #e0e0e0;
            padding-top: 8px;
            margin-top: 8px;
        }
        p {
            margin: 8px 0;
            color: #666;
            font-size: 0.9em;
        }
        h3 {
            text-align: left;
            color: #4CAF50;
            margin-top: 10px;
            font-size: 1em;
        }
        .info-item {
            display: flex;
            justify-content: space-between;
            margin: 5px 0;
            padding: 5px 0;
            font-size: 0.9em;
        }

        .greeting-message {
            background-color: #f1f9f4;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #d7e8dc;
            margin-top: 15px;
            text-align: center;
            color: #2d7b4d;
            font-size: 0.95em;
        }
            .col-6{
            width:45%;
            display:inline-block;
            float:left;
            padding: 10px;
}
    </style>
</head>
<body>
    <div class="receipt-container">
        <h1>Ride Booking Receipt</h1>
        <p><strong>Booking ID:</strong>'.$ride_row['ride_id'].'</p>
        <p><strong>Date:</strong>'.date('F d, Y').'</p>

        <div class="highlight">
        <h3>Trip Information</h3>
            <div class="row">
            <table>
            <tr>
            <td><span><strong>Pickup Location:</strong></span>
                <span>'.$ride_row['trip_pickup_place'].'</span>
            </td>
            <td>
                <span><strong>Drop Location:</strong></span>
                <span>'.$ride_row['trip_drop_place'].'</span>
            </td>
            </tr>
            <tr>
            <td>
                <span><strong>Pickup Time:</strong></span>
                <span>'.$ride_row['trip_pickup_time'].'</span>
            </td>
            <td>
                <span><strong>Drop Time:</strong></span>
                <span>'.$ride_row['trip_drop_time'].'</span>
            </td>
            </tr>
            <tr>
            <td>
                <span><strong>Pickup Date:</strong></span>
                <span>'.$ride_row['trip_pickup_date'].'</span>
            </td>
            <td>
                <span><strong>Drop Date:</strong></span>
                <span>'.$ride_row['trip_drop_date'].'</span>
            </td>
            </tr>
            <tr>
            <td>
                <span><strong>Distance:</strong></span>
                <span>'.$distance.'</span>
            </td>
            <td>
                <span><strong>Total Fare:</strong></span>
                <span>'.$ride_row['trip_payment'].'</span>
            </td>
            </tr>
            </table>
        </div>
        <br/>
        <div class="driver-info">
            <h3>Driver Information</h3>
            <div class="info-item">
                <span><strong>Driver Name:</strong></span>
                <span>'.$driver_row['login_fname'].'</span>
            </div>
            <div class="info-item">
                <span><strong>Car Model:</strong></span>
                <span>'.$car_row['vehicle_name'].'</span>
            </div>
        </div>

        <div class="payment-info">
            <h3>Payment Details</h3>
            <div class="info-item">
                <span><strong>Payment Method:</strong></span>
                <span>Credit Card (Visa **** 1234)</span>
            </div>
            <div class="info-item">
                <span><strong>Transaction ID:</strong></span>
                <span>TXN789654</span>
            </div>
        </div>

        <h3>Thank you for choosing our service!</h3>

        <div class="greeting-message">
            <p>We truly appreciate you booking a ride with us. We hope you had a great experience! Have a wonderful day and we look forward to serving you again soon.</p>
        </div>
    </div>
</body>
</html>
';

// Write HTML content
$pdf->writeHTML($html);

// Output PDF
$pdf->Output('custom.pdf', 'I');
?>