<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
// fetch_unit_price.php

// Assuming you have a database connection already established
$productId = $_POST['productId'];

// Fetch the unit price from the database based on the product ID
$query = "SELECT product_price FROM product WHERE id = $productId";
$result = $db_handle->runQuery($query);

// Check if a valid result is obtained
if (!empty($result)) {
    // Send the unit price as the response
    echo $result[0]['product_price'];
} else {
    // Send an error message if the result is empty or invalid
    echo "Error: Unit price not found";
}
?>
