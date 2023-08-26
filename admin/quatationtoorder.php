<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
if (!isset($_SESSION['userid'])) {
    header("Location: Login");
}

$id = $_GET['id'];

$insert_billing = $db_handle->insertQuery("INSERT INTO `billing_details`(`customer_id`, `f_name`, `l_name`, `organization_name`, `email`, `phone`, `address`, `city`, `zip_code`, `payment_type`, `shipping_method`, `discount`, `note`, `platform`, `total_purchase`, `delivery_charges`, `approve`, `purchase_points`, `delivery_date`, `updated_at`) SELECT `customer_id`, `f_name`, `l_name`, `organization_name`, `email`, `phone`, `address`, `city`, `zip_code`, `payment_type`, `shipping_method`, `discount`, `note`, `platform`, `total_purchase`, `delivery_charges`, `approve`, `purchase_points`, `delivery_date`, `updated_at` FROM `quotation_details` WHERE `id` = '$id'");
if($insert_billing){
    $delete1 = $db_handle->insertQuery("DELETE FROM `quotation_details` WHERE id = '$id'");
}

$fetch_products = $db_handle->runQuery("SELECT * FROM `quatation_products` WHERE `billing_id` = '$id'");
$no_fetch_products = $db_handle->numRows("SELECT * FROM `quatation_products` WHERE `billing_id` = '$id'");

for ($i = 0; $i < $no_fetch_products; $i++){
    $pid = $fetch_products[$i]['id'];
    $insert_product = $db_handle->insertQuery("INSERT INTO `invoice_details`(`customer_id`, `billing_id`, `product_id`, `product_name`, `product_quantity`, `product_unit_price`, `product_total_price`, `updated_at`) SELECT `customer_id`, `billing_id`, `product_id`, `product_name`, `product_quantity`, `product_unit_price`, `product_total_price`, `updated_at` FROM `quatation_products` WHERE `id` = '$pid'");
    if($insert_product){
        $delete2 = $db_handle->insertQuery("DELETE FROM `quatation_products` WHERE id = '$pid'");
    }
}

echo "
<script>
alert('The quotation is successfully converted to order');
window.location.href = 'View-Quotation'
</script>
";