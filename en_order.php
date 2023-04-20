<?php
session_start();
if (isset($_SESSION['id'])) {
    $customer_id = $_SESSION['id'];
}
include('admin/include/dbController.php');
$db_handle = new DBController();
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
    <title>Order Method | Wayshk</title>

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

        .about-us-title .second::before {
            content: "";
            position: absolute;
            width: calc(106px + (175 - 106) * ((100vw - 320px) / (1920 - 320)));
            height: 3px;
            bottom: calc(-7px + (6 - 7) * ((100vw - 320px) / (1920 - 320)));
            left: 0;
            background: rgba(0, 0, 0, 0);
        }

        .about-us-title .second {
            margin-bottom: 17px;
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

<!-- Client Section Start -->
<section class="client-section section-lg-space">
    <div class="container-fluid-lg">
        <!-- come oder page-->
        <div class="row">
            <div class="col-12">
                <div class="about-us-title text-center">
                    <h2 class="center inner-header">Order method</h2>
                </div>

                <div class="slider-3_1 product-wrapper">
                    <div>
                        <div class="clint-contain" style="background: #f8eab3">
                            <h4>Online order</h4>
                            <p>
                                1. Put the required items into the shopping cart<br/>
                                2. Check out as a Guest or as Member
                            </p>
                            <p style="font-weight: bold;">3. Select the shipping method: </p>
                            <p style="padding-left: 10px;">A. S.F. Express to pay on delivery (Free shipping over
                                $2000)</p>
                            <p style="padding-left: 10px;">B. Self-pickup at Tai Wai Warehouse (Please make an
                                appointment)</p>
                            <p style="padding-left: 10px;">C. Self-pickup at the Wanchai cooperation point (please make
                                an appointment)</p>
                        </div>
                    </div>
                    <div>
                        <div class="clint-contain" style="background: #f8eab3">
                            <h4>Select payment method</h4>
                            <p>A. Pay by cash when picking up</p>
                            <p>B. PayMe (Tel: +852 5265 7359)</p>
                            <p style="padding-left: 10px;">* Send proof of payment to +852 5605 8389 via Whatsapp</p>
                            <p>C. Transfer FPS (Tel: +852 5265 7359)</p>
                            <p style="padding-left: 10px;">* Send proof of payment to +852 5605 8389 via Whatsapp</p>
                            <p>D. Bank deposit</p>
                            <p style="padding-left: 10px;">Account number : 769-334699-883 (Hang Seng Bank)<br>
                                Account name : Wayshk</p>
                            <p style="padding-left: 10px;">* After payment, send the deposit proof to +852 5605 8389 via
                                Whatsapp</p>
                            <p>E. Credit card payment [an additional 5% handling fee is required]</p>
                            <p>F. Payment by Check (for Institutional/School Orders Only)</p>
                            <p>Please make the check payable to "Wayshk", and indicate Attn: Wayshk on the envelope.
                                Mail the check to RM1, 3/F, Kinglet Industrial Building, 21-23 Shing Wan Rd, Tai Wai</p>
                        </div>
                    </div>
                </div>
                <div class="about-us-title text-center mt-5 mb-5">
                    <h2 class="center second inner-header">There are electronic documents for all orders
                        placed online; if you need
                        the true copy of company stamp on the quotation/invoice/receipt, please specify before placing
                        the order.</h2>
                </div>
                <div class="slider-3_1 product-wrapper mt-1">
                    <div>
                        <div class="clint-contain" style="background: #e1e193">
                            <h4>Shipping</h4>
                            <p>1. The delivery period of stock products is 0-7 days; and uncertain for pre-order
                                products is uncertain. Welcome to contact us for details.</p>
                            <p>2. The color and style of the products will be distributed randomly. If you have any
                                requirements for the color/style of the product. Please fill in the description box.
                                Wayshk will try to meet your request. There is no return or exchange once the products
                                are delivered. </p>
                            <p>3. If you accidentally fill in the wrong address, please contact us as soon as possible
                                for amendment. If the shipment has been arranged, you will not be able to change the
                                address.</p>
                        </div>
                    </div>
                </div>
                <div class="about-us-title text-center mt-5">
                    <h2 class="center second inner-header">Self - Pick up </h2>
                </div>
                <div class="slider-3_1 product-wrapper mt-1">
                    <div>
                        <div class="clint-contain" style="background: #ddf0ff">
                            <h4>Tai Wai Warehouse</h4>
                            <p>Address: RM1, 3/F, Kinglet Industrial Building, 21-23 Shing Wan Rd, Tai Wai</p>
                            <p style="font-weight: bold;">How to get there: </p>
                            <p>Turn right at Exit A of Tai Wai Station and walk for about 5 minutes</p>
                            <p>Opening hours: Variable (10:30 – 18:15)</p>
                            <p>There is no on-site selection of goods. Make an appointment to pick up the goods in
                                advance and confirm the pick-up time with us. When you arrive, please call and we will
                                bring to you at the door.</p>
                        </div>
                    </div>
                    <div>
                        <div class="clint-contain" style="background: #ddf0ff">
                            <h4>Cooperation point --- Eporh Child Learning and Development Center</h4>
                            <p>Address: 25/F, 237-239 Hennessy Road, Wan Chai</p>
                            <p style="font-weight: bold;">How to get there: </p>
                            <p>Exit A2 of Wanchai MTR Station and walk for about 5 minutes</p>
                            <p>Exhibition Station Exit A3, walk for about 6 minutes</p>
                            <p>Opening hours: Monday to Friday 09:00 - 18:00; Saturday 09:00 - 16:00</p>
                            <p>【Closed during lunch time 12:30-13:45】.    Tel: 2877 8787</p>
                            <p>Please check the stock with us first and make an appointment in advance. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Client Section End -->

<!-- Fresh Vegetable Section Start -->
<section class="fresh-vegetable-section section-lg-space">
    <div class="container-fluid-lg">
        <div class="row gx-xl-5 gy-xl-0 g-3 ratio_148_1">
            <!--  come from demo website about us page-->
            <div class="col-12">
                <div class="fresh-contain">
                    <div>
                        <div class="review-title text-center">
                            <p class="inner-header">Overseas orders</p>
                        </div>

                        <div class="delivery-list">
                            <p class="text-content">
                                Overseas orders are delivered by SF EXPRESS, and the shipping fee will be paid on delivery
                                <br/>
                                Currently accept orders from: Macau, Taiwan, Singapore, Malaysia, China
                                <br/>
                                Overseas orders can only be settled by credit card. The transaction fee, exchange rate and refund fee are in accordance with the regulations of the issuing bank. If you have any questions, please contact your credit card issuing bank
                                <br/>
                                Overseas orders do not apply to free shipping activities
                                <br/>
                                Import tariffs vary from country to country. If you need to collect tariffs when you pick up the package, the tariffs must be paid by the buyer
                                <br/>
                                It is recommended to confirm whether the product can be delivered to the designated country before purchasing. If the product is detained during entry no refund will be issued.
                                <br/>
                                Returns and exchanges are not accepted for overseas orders
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fresh Vegetable Section End -->


<!-- Footer Section Start -->
<?php
include('include/footer.php');
?>
<!-- Footer Section End -->

<!-- Deal Box Modal Start -->
<div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title w-100" id="deal_today">Deal Today</h5>
                    <p class="mt-1 text-content">Recommended deals for you.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="deal-offer-box">
                    <ul class="deal-offer-list">
                        <?php
                        $product = $db_handle->runQuery("select * from product WHERE status= '1' order by rand() limit 5");
                        $row = $db_handle->numRows("select * from product WHERE status= '1' order by rand() limit 5");
                        for ($i = 0; $i < $row; $i++) {
                            $image = explode(',', $product[$i]['p_image'])
                            ?>
                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop.php" class="deal-image">
                                        <img src="admin/<?php echo $image[0]; ?>" class="blur-up lazyload"
                                             alt="">
                                    </a>

                                    <a href="shop.php" class="deal-contain">
                                        <h5><?php echo $product[$i]['p_name'] ?></h5>
                                        <h6><?php echo $product[$i]['product_price'] ?></h6>
                                    </a>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Deal Box Modal End -->

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

<!-- latest jquery-->
<script src="assets/js/jquery-3.6.0.min.js"></script>

<!-- jquery ui-->
<script src="assets/js/jquery-ui.min.js"></script>

<!-- Bootstrap js-->
<script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap/popper.min.js"></script>
<script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

<!-- feather icon js-->
<script src="assets/js/feather/feather.min.js"></script>
<script src="assets/js/feather/feather-icon.js"></script>

<!-- Lazyload Js -->
<script src="assets/js/lazysizes.min.js"></script>

<!-- Slick js-->
<script src="assets/js/slick/slick.js"></script>
<script src="assets/js/slick/slick-animation.min.js"></script>
<script src="assets/js/slick/custom_slick.js"></script>

<!-- script js -->
<script src="assets/js/script.js"></script>

<!-- thme setting js -->
<script src="assets/js/theme-setting.js"></script>
</body>
</html>
