<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the new order from the POST request
    $postData = json_decode(file_get_contents("php://input"), true);
    $newOrder = $postData["order"];

    // Update the "order" column in the "product" table
    foreach ($newOrder as $index => $productId) {
        $update = $db_handle->insertQuery("UPDATE product SET `order_no` = $index WHERE id = $productId");
        if (!$update) {
            http_response_code(500);
            exit;
        }
    }

    // Respond with a success message
    $response = ["message" => "Order updated successfully"];
    header("Content-Type: application/json");
    echo json_encode($response);
} else {
    // Invalid request method
    http_response_code(405);
    echo json_encode(["error" => "Method Not Allowed"]);
}

