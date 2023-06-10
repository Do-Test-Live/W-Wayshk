<?php
session_start();
include('admin/include/dbController.php');
$db_handle = new DBController();
$flag = 0;

if (isset($_SESSION['id'])) {
    $flag = 1;
    $customer_id = $_SESSION['id'];
    $fetch_customer_details = $db_handle->runQuery("select * from customer where id = '$customer_id'");
}


if (!isset($_SESSION["cart_item"])) {
    echo "<script>
            window.location.href='Cart';
        </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Wayshk">
    <meta name="keywords" content="Wayshk">
    <meta name="author" content="Wayshk">
    <link rel="icon" href="assets/images/favicon/2.png" type="image/x-icon">
    <title>Checkout</title>

    <?php include('include/css.php'); ?>
    <style>
        header .header-top .about-list .right-nav-list .theme-form-select .dropdown-toggle.hkd::before {
            content: " ";
            position: absolute;
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            right: 0;
            color: #fff;
        }
    </style>
</head>

<body>
<!-- Loader Start -->
<div class="fullpage-loader">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>
<!-- Loader End -->

<!-- Header Start -->
<?php
include('include/header.php');
?>
<!-- Header End -->


<!-- Breadcrumb Section Start -->
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2><?php if($_SESSION['language'] === 'CN') echo '查看'; else echo 'Checkout';?></h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><?php if($_SESSION['language'] === 'CN') echo '查看'; else echo 'Checkout';?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout section Start -->
<section class="checkout-section-2 section-b-space">
    <div class="container-fluid-lg">
        <form action="Payment" method="post">
            <div class="row g-sm-4 g-3">
                <div class="col-lg-8">
                    <div class="left-sidebar-checkout">
                        <div class="checkout-detail-box">
                            <ul>
                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ggihhudh.json"
                                                   trigger="loop-on-hover"
                                                   colors="primary:#121331,secondary:#646e78,tertiary:#0baf9a"
                                                   class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box" style="height: 100%;">
                                        <div class="checkout-title">
                                            <h4><?php if($_SESSION['language'] === 'CN') echo '顧客資料'; else echo 'Customer Information';?></h4>
                                        </div>

                                        <div class="checkout-detail">
                                            <div class="row g-4">
                                                <div class="col-xxl-12">
                                                    <div class="delivery-address-box">
                                                        <div class="row">
                                                            <div class="form-group col-md-6 mb-3">
                                                                <input type="text" class="form-control" name="f_name"
                                                                       value="<?php if($flag == '1') echo $fetch_customer_details[0]['customer_name'];?>" placeholder="<?php if($_SESSION['language'] === 'CN') echo '名'; else echo 'First Name';?>" required="">
                                                            </div>
                                                            <div class="form-group col-md-6 mb-3">
                                                                <input type="text" class="form-control" name="l_name"
                                                                       value="" placeholder="<?php if($_SESSION['language'] === 'CN') echo '姓'; else echo 'Last Name';?>" required="">
                                                            </div>
                                                            <div class="form-group col-md-12 mb-3">
                                                                <input type="text" class="form-control" name="email"
                                                                       value="<?php if($flag == '1') echo $fetch_customer_details[0]['email'];?>" placeholder="<?php if($_SESSION['language'] === 'CN') echo '電子郵件'; else echo 'Email';?>" required="">
                                                            </div>
                                                            <div class="form-group col-md-12 mb-3">
                                                                <input type="text" class="form-control" name="phone_number"
                                                                       value="<?php if($flag == '1') echo $fetch_customer_details[0]['number'];?>" placeholder="<?php if($_SESSION['language'] === 'CN') echo '電話號碼'; else echo 'Phone Number';?>"
                                                                       required="">
                                                            </div>
                                                            <div class="form-group col-md-12 mb-3">
                                                                <input type="text" class="form-control" name="address"
                                                                       value="<?php if($flag == '1') echo $fetch_customer_details[0]['address'];?>" placeholder="<?php if($_SESSION['language'] === 'CN') echo '街道地址（自取客人請填寫 自取）'; else echo 'Street Address (For self-pickup customers, fill in self-pickup)';?>" required="">
                                                            </div>
                                                            <div class="form-group col-md-12 mb-3">
                                                                <input type="text" class="form-control" name="city" value="<?php if($flag == '1') echo $fetch_customer_details[0]['city'];?>"
                                                                       placeholder="<?php if($_SESSION['language'] === 'CN') echo '城市'; else echo 'City';?>" required="">
                                                            </div>
                                                            <div class="form-group col-md-12 mb-3">
                                                                <input type="text" class="form-control" name="zip_code"
                                                                       value="<?php if($flag == '1') echo $fetch_customer_details[0]['zip_code'];?>" placeholder="<?php if($_SESSION['language'] === 'CN') echo '郵政編碼（香港顧客請填寫 00000）'; else echo 'Zip Code (For customers from Hong Kong, fill in 00000)';?>"
                                                                        required="">
                                                            </div>
                                                            <div class="form-group col-md-12 mb-3">
                                                                <input type="text" class="form-control" name="note"
                                                                       value="" placeholder="<?php if($_SESSION['language'] === 'CN') echo '筆記  (如有任何指示或特別要求，請在此新增)'; else echo 'Notes  (Add any instructions or special requests here)';?>">
                                                            </div>
                                                            <div class="form-group col-md-6 mb-3">
                                                                <input class="form-check-input card-class" name="addInfo" type="checkbox"
                                                                       value="" id="flexCheckChecked">
                                                                <label class="form-check-label ms-2" for="flexCheckChecked">
                                                                    <?php if($_SESSION['language'] === 'CN') echo '將此數據添加到客戶信息'; else echo 'Add this data to customer info';?>
                                                                </label>

                                                                <?php
                                                                if(isset($_GET['discount'])){
                                                                    ?>
                                                                    <input name="discount" type="hidden" value="<?php echo $_GET['discount']; ?>">
                                                                    <?php
                                                                }
                                                                ?>

                                                                <?php
                                                                if(isset($_GET['points'])){
                                                                    ?>
                                                                    <input name="points" type="hidden" value="<?php echo $_GET['points']; ?>">
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/qmcsqnle.json"
                                                   trigger="loop-on-hover" colors="primary:#0baf9a,secondary:#0baf9a"
                                                   class="lord-icon">
                                        </lord-icon>
                                    </div>

                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4><?php if($_SESSION['language'] === 'CN') echo '郵寄方式'; else echo 'Shipping Method';?></h4>
                                        </div>
                                        <div class="checkout-detail">
                                            <div class="accordion accordion-flush custom-accordion"
                                                 id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-heading-One">
                                                        <div class="accordion-button collapsed"
                                                             data-bs-toggle="collapse"
                                                             data-bs-target="#flush-collapseOne">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="express"><input
                                                                            class="form-check-input mt-0" type="radio"
                                                                            name="shipping" value="S.F. Express" id="express" checked>
                                                                    <?php if($_SESSION['language'] === 'CN') echo '順豐速遞到付 （滿$2000免費送貨）'; else echo 'S.F. Express to pay on delivery (Free shipping over $2000)';?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-heading-Two">
                                                        <div class="accordion-button collapsed"
                                                             data-bs-toggle="collapse"
                                                             data-bs-target="#flush-collapseTwo">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="taiwai"><input
                                                                            class="form-check-input mt-0" type="radio"
                                                                            name="shipping" value="Tai Wai Warehouse" id="taiwai">
                                                                    <?php if($_SESSION['language'] === 'CN') echo '大圍倉庫自取'; else echo 'Self-pickup at Tai Wai Warehouse';?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-heading-Three">
                                                        <div class="accordion-button collapsed"
                                                             data-bs-toggle="collapse"
                                                             data-bs-target="#flush-collapseThree">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="Wanchai"><input
                                                                            class="form-check-input mt-0" type="radio"
                                                                            name="shipping" value="Wanchai cooperation point" id="Wanchai">
                                                                    <?php if($_SESSION['language'] === 'CN') echo '灣仔合作點自取'; else echo 'Self-pickup at the Wanchai cooperation point';?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4><?php if($_SESSION['language'] === 'CN') echo '付款方式'; else echo 'Payment Option';?></h4>
                                        </div>
                                        <div class="checkout-detail">
                                            <div class="accordion accordion-flush custom-accordion"
                                                 id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-heading-One">
                                                        <div class="accordion-button collapsed"
                                                             data-bs-toggle="collapse"
                                                             data-bs-target="#flush-collapseOne">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="cash"><input
                                                                            class="form-check-input mt-0" type="radio"
                                                                            name="payment" value="Pay by cash when picking up" id="cash" checked>
                                                                    <?php if($_SESSION['language'] === 'CN') echo '自取時以現金付款'; else echo 'Pay by cash when picking up';?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-heading-Two">
                                                        <div class="accordion-button collapsed"
                                                             data-bs-toggle="collapse"
                                                             data-bs-target="#flush-collapseTwo">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="PayMe"><input
                                                                            class="form-check-input mt-0" type="radio"
                                                                            name="payment" value="PayMe" id="PayMe">
                                                                    <?php if($_SESSION['language'] === 'CN') echo ' PayMe<br>電話：+852 5265 7359'; else echo 'PayMe (Tel: +852 5265 7359)';?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-heading-Three">
                                                        <div class="accordion-button collapsed"
                                                             data-bs-toggle="collapse"
                                                             data-bs-target="#flush-collapseThree">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="fps"><input
                                                                            class="form-check-input mt-0" type="radio"
                                                                            name="payment" value="Transfer FPS" id="fps">
                                                                    <?php if($_SESSION['language'] === 'CN') echo '轉數款 FPS <br> 電話： +852 5265 7359'; else echo 'Transfer FPS (Tel: +852 5265 7359)';?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-heading-Four">
                                                        <div class="accordion-button collapsed"
                                                             data-bs-toggle="collapse"
                                                             data-bs-target="#flush-collapseFour">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="Bank"><input
                                                                            class="form-check-input mt-0" type="radio"
                                                                            name="payment" value="Bank Deposit" id="Bank">
                                                                    <?php if($_SESSION['language'] === 'CN') echo '銀行入數戶口號碼為 <br>769-334699-883 (恆生銀行) <br>戶口名稱: Wayshk'; else echo 'Bank deposit Account number : 769-334699-883 (Hang Seng Bank) Account name : Wayshk';?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-heading-Five">
                                                        <div class="accordion-button collapsed"
                                                             data-bs-toggle="collapse"
                                                             data-bs-target="#flush-collapseFive">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="card"><input
                                                                            class="form-check-input mt-0" type="radio"
                                                                            name="payment" value="Credit Card" id="card" onclick="applyExtraFee();">
                                                                    <?php if($_SESSION['language'] === 'CN') echo '信用卡支付 <br>需支付額外5% 手續費'; else echo 'Credit card payment [an additional 5% handling fee is required]';?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-heading-Six">
                                                        <div class="accordion-button collapsed"
                                                             data-bs-toggle="collapse"
                                                             data-bs-target="#flush-collapseSix">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="Check"><input
                                                                            class="form-check-input mt-0" type="radio"
                                                                            name="payment" value="Check" id="Check">
                                                                    <?php if($_SESSION['language'] === 'CN') echo '支票付款 <br> 只限機構/學校訂單'; else echo 'Payment by Check (for Institutional/School Orders Only)';?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="right-side-summery-box">
                        <div class="summery-box-2">
                            <div class="summery-header">
                                <h3><?php if($_SESSION['language'] === 'CN') echo '訂單摘要'; else echo 'Order Summary';?></h3>
                            </div>

                            <ul class="summery-contain">
                                <?php
                                $total_quantity_new = 0;
                                $total_price_new = 0;
                                $total_weight = 0;
                                if (isset($_SESSION["cart_item"])) {
                                    foreach ($_SESSION["cart_item"] as $item) {
                                        $item_price = $item["quantity"] * $item["price"];
                                        ?>
                                        <li>
                                            <img src="admin/<?php echo str_replace("650", "250", strtok($item['image'],',')); ?>"
                                                 class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                            <h4><?php if($_SESSION['language'] === 'CN') echo $item["name"]; else echo $item["en_name"];?> <span>X <?php echo $item["quantity"]; ?></span></h4>
                                            <h4 class="price"><?php echo "HKD " . number_format($item_price, 2); ?></h4>
                                        </li>
                                        <?php
                                        $total_quantity_new += $item["quantity"];
                                        $total_price_new += ($item["price"] * $item["quantity"]);
                                        $total_weight += ($item["weight"] * $item['quantity']);
                                    }
                                }
                                ?>
                            </ul>

                            <ul class="summery-total">
                                <li>
                                    <h4><?php if($_SESSION['language'] === 'CN') echo '小計'; else echo 'Subtotal';?></h4>
                                    <h4 class="price"><?php echo "HKD " . number_format($total_price_new, 2); ?></h4>
                                </li>
                                <li>
                                    <h4><?php if($_SESSION['language'] === 'CN') echo '折扣'; else echo 'Discount';?></h4>
                                    <h4 class="price">
                                        <?php
                                        $discount=0;
                                        if(isset($_GET['points'])){
                                            $discount=(int)$_GET['points']/40;

                                            if($total_price_new<=$discount){
                                                $discount=$total_price_new;
                                            }
                                        }
                                        if(isset($_GET['discount'])){
                                            echo "HKD " . number_format($_GET['discount']+$discount, 2);
                                        }else{
                                            echo "HKD " . number_format($discount, 2);
                                        }
                                        ?>
                                    </h4>
                                </li>
                                <li>
                                    <h4><?php if($_SESSION['language'] === 'CN') echo '運費'; else echo 'Shipping'?></h4>
                                    <h4 class="price text-end" id="price">
                                        <?php
                                        $delivery_charges = $db_handle->runQuery("select * from delivery_charges");
                                        if ($total_price_new >= $delivery_charges[0]['min_order_free_delivery']){
                                            $dCharge = 0;
                                        }elseif($total_weight <= $delivery_charges[0]['weight_upto']){
                                            $dCharge = $delivery_charges[0]['min_delivery_charge'];
                                        }else{
                                            $d_weight = $total_weight - $delivery_charges[0]['weight_upto'];
                                            $dAdditional = $d_weight * $delivery_charges[0]['next_per_kg_weight'];
                                            $dCharge = $dAdditional +  $delivery_charges[0]['min_delivery_charge'];
                                        }
                                        /*echo $dCharge;*/
                                        if(isset($_GET['discount'])) {
                                            $discount = $_GET['discount'];
                                        }
                                        $totalPriceNew = $total_price_new + $dCharge - $discount;
                                        ?>
                                        <input type="hidden" id="shippingInput" value="<?php echo $dCharge;?>" name="delivery_charge">
                                    </h4>
                                </li>
                                <li class="list-total">
                                    <h4><?php if($_SESSION['language'] === 'CN') echo '全部的 (HKD)'; else echo 'Total (HKD)';?></h4>
                                    <h4 class="price" id="total_value"><?php echo "HKD " . number_format($totalPriceNew, 2); ?></h4>
                                </li>
                            </ul>
                        </div>
                        <input class="form-check-input card-class" name="addInfo" type="checkbox"
                               value="" id="termsandconditions" required>
                        <label class="form-check-label ms-2" for="termsandconditions">
                            <?php if($_SESSION['language'] === 'CN') echo '<a href="terms_condition.php" target="_blank">本人已閱讀並同意遵守此條款及細則</a>'; else echo '<a href="terms_condition_en.php" target="_blank">I have read and agreed to be bound by these <br/> terms and conditions</a>';?>
                        </label>
                        <button class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold" name="placeOrder" type="submit">
                            <?php if($_SESSION['language'] === 'CN') echo '下訂單'; else echo 'Place Order';?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Checkout section End -->

<!-- Footer Section Start -->
<?php
include('include/footer.php');
?>
<!-- Footer Section End -->

<!-- Tap to top start -->
<div class="theme-option">
    <div class="back-to-top">
        <a id="back-to-top" href="#">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
</div>
<!-- Tap to top end -->

<!-- Bg overlay Start -->
<div class="bg-overlay"></div>
<!-- Bg overlay End -->

<!-- Deal Box Modal Start -->
<?php include ('include/deal.php');?>
<!-- Deal Box Modal End -->


<!-- latest jquery-->
<script src="assets/js/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize the value of the hidden input field
        var deliveryCharges = <?php echo $dCharge; ?>;
        var totalprice = <?php echo $total_price_new; ?>;
        var discount = <?php echo $discount; ?>;
        $('#shippingInput').val(deliveryCharges);
        $('#price').text(deliveryCharges);
        $('#total_value').text(deliveryCharges + totalprice - discount);
        console.log(deliveryCharges);
        console.log(totalprice);
        console.log(discount);

        // Function to update the value and display it in the <h4> tag
        function updateValue(value) {
            $('#shippingInput').val(value);
            $('#price').text(value);
            $('#total_value').text(value + totalprice - discount);
        }

        // Handle radio button change event
        $('input[type="radio"][name="shipping"]').change(function() {
            if ($(this).attr('id') === 'express') {
                // Update value to the PHP variable if "S.F. Express" is selected
                updateValue(deliveryCharges);
            } else {
                // Set value to 0 for other options
                updateValue(0);
            }
        });
    });
</script>





<!-- jquery ui-->
<script src="assets/js/jquery-ui.min.js"></script>

<!-- Lordicon Js -->
<script src="assets/js/lusqsztk.js"></script>

<!-- Bootstrap js-->
<script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap/popper.min.js"></script>
<script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

<!-- feather icon js-->
<script src="assets/js/feather/feather.min.js"></script>
<script src="assets/js/feather/feather-icon.js"></script>

<!-- Lazyload Js -->
<script src="assets/js/lazysizes.min.js"></script>

<!-- Delivery Option js -->
<script src="assets/js/delivery-option.js"></script>

<!-- Slick js-->
<script src="assets/js/slick/slick.js"></script>
<script src="assets/js/slick/custom_slick.js"></script>

<!-- Quantity js -->
<script src="assets/js/quantity.js"></script>

<!-- script js -->
<script src="assets/js/script.js"></script>

<!-- thme setting js -->
<script src="assets/js/theme-setting.js"></script>



</body>
</html>
