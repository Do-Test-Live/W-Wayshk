<?php

// Product Details
// Minimum amount is $0.50 US
$productName = "1小時30分鐘租場服務";
$productID = "DP12345";
$productPrice = 190;
$currency = "hkd";

/*
 * Stripe API configuration
 * Remember to switch to your live publishable and secret key in production!
 * See your keys here: https://dashboard.stripe.com/account/apikeys
 */
define('STRIPE_API_KEY', 'sk_test_51Mb0kLCx2OyxlMM1Y6SQXMOJwhgvfopAE9uOV9rk98skPq1iMKH42NM0MsiWJjlaj6ZyzgCZPK95bQeKFgi7ajAI00e1cuwZaj');
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51Mb0kLCx2OyxlMM1Fi0xLpDM3tbE7HQu5k2VdaWTooiHBMPf4NIS47hjtj5nGYZmrE91STnXUjzUhWXY5njF9skH0056LqRXCv');
define('STRIPE_SUCCESS_URL', 'https://localhost/W-Wayshk/payment-success.php'); //Payment success URL
define('STRIPE_CANCEL_URL', 'https://localhost/W-Wayshk/payment-cancel.php'); //Payment cancel URL

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'wayshk');

