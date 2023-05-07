<?php
include('admin/include/dbController.php');
$db_handle = new DBController();

$coupon = $_GET['coupon'];
$totalAmount = $_GET['totalAmount'];

$query="SELECT * FROM promo_code where code='$coupon' and status=1";
$data = $db_handle->runQuery($query);
$row_count = $db_handle->numRows($query);
if($row_count==1){
    $coupon_type=$data[0]['coupon_type'];
    $minimum_order=$data[0]['minimum_order'];
    $amount=$data[0]['amount'];

    if($totalAmount>=$minimum_order){
        if($coupon_type==1){
            $amount=(int)($totalAmount/100)*$amount;
        }

        echo json_encode(
            array('message' => "Coupon Apply Successfully.", 'alertType' => "success",'amount'=>$amount)
        );
    }else{
        echo json_encode(
            array('message' => "Add more product to apply this Coupon.", 'alertType' => "error",'amount'=>0)
        );
    }
}else{
    echo json_encode(
        array('message' => "Coupon code not valid.", 'alertType' => "error",'amount'=>0)
    );
}
