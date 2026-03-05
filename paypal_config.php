<?php 
/* 
 * This is - PayPal and database configuration -  
*/ 
  
// PayPal configuration 
define('PAYPAL_ID', 'sb-kza43x33289444@business.example.com'); 
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE 
 
define('PAYPAL_RETURN_URL', 'http://localhost/tripy/paypal_success.php'); 
define('PAYPAL_CANCEL_URL', 'http://localhost/tripy/paypal_cancel.php'); 
define('PAYPAL_NOTIFY_URL', 'http://localhost/tripy/paypal_ipn.php'); 
define('PAYPAL_CURRENCY', 'USD'); 

// Database configuration 
define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'tripy_db'); 

// Change not required 
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");

// [ b_boy@gmail.com ]