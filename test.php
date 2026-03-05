<!DOCTYPE html>
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
            /* margin-bottom: 15px; */
            height: 210px;
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
        <p><strong>Date:</strong>111</p>

        <div class="highlight">
            <div class="row">
                <div class="col-6">
                    <div class="receipt-item">
                        <span><strong>Pickup Location:</strong></span>
                        <span>hkhkh</span>
                    </div>
                    <div class="receipt-item">
                        <span><strong>Pickup Date:</strong></span>
                        <span>khkh</span>
                    </div>
                    <div class="receipt-item">
                        <span><strong>Pickup Time:</strong></span>
                        <span>jjg</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="receipt-item">
                        <span><strong>Drop Location:</strong></span>
                        <span>gkugj</span>
                    </div>
                    <div class="receipt-item">
                        <span><strong>Drop Date:</strong></span>
                        <span>kgkjg</span>
                    </div>
                    <div class="receipt-item">
                        <span><strong>Drop Time:</strong></span>
                        <span>jhjugk</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="receipt-item">
                        <span><strong>Distance:</strong></span>
                        <span>jhkjh</span>
                    </div>
                    <div class="receipt-item">
                        <span><strong>Duration:</strong></span>
                        <span>30 mins</span>
                    </div>
                    <div class="receipt-item total">
                        <span>Total Fare:</span>
                        <span>hfhyfj</span>
                    </div>
                </div>
            </div>
        </div>
        <br/>

        <div class="driver-info">
            <h3>Driver Information</h3>
            <div class="info-item">
                <span><strong>Driver Name:</strong></span>
                <span>fhfhf</span>
            </div>
            <div class="info-item">
                <span><strong>Car Model:</strong></span>
                <span>jgkug</span>
            </div>
            <div class="info-item">
                <span><strong>License Plate:</strong></span>
                <span>ABC1234</span>
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