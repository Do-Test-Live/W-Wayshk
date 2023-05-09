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
        p{
            font-size: 18px !important;
        }
        #image-section-one{
            display: none;
        }

        @media only screen and (max-width: 490px) {
            #three-section{
                display: none;
            }
            #image-section-one{
                display: block;
            }
            #image-section-two{
                display: none;
            }
            .header-title{
                font-size: 25px !important;
                line-height: 30px !important;
            }
            .become-service .service-box{
                height: 725px;
            }
            .mb-sm-3{
                margin-bottom: 20px;
            }
            .seller-title h2{
                font-size: 20px !important;
            }
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

<!-- Service Section Start -->
<section class="become-service section-b-space" >
    <div class="container-fluid-lg">
        <div class="seller-title text-center">
            <h2>Order Method</h2>
        </div>

        <div class="row" id="three-section">
            <div class="col-xl-4">
                <div class="service-box" style="height: 230px !important;">
                    <div class="service-svg">
                        <img src="assets/images/order/order.png" />
                    </div>

                    <div class="service-detail">
                        <h4>Online Order</h4>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="service-box" style="height: 230px !important;">
                    <div class="service-svg">
                        <img src="assets/images/order/payment.png" />
                    </div>

                    <div class="service-detail">
                        <h4>Payment Method</h4>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="service-box" style="height: 230px !important;">
                    <div class="service-svg">
                        <img src="assets/images/order/shipping.png" />
                    </div>

                    <div class="service-detail">
                        <h4>Shipping</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Service Section End -->

<!-- About Section Start -->
<section class="saller-poster-section">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xl-4">
                <div class="poster-box">
                    <div class="poster-image">
                        <img src="assets/images/order/online-order.png"
                             class="img-fluid" alt="">
                    </div>
                </div>
            </div>

            <div class="col-xl-7 order-lg-2">
                <div class="seller-title h-100 d-flex justify-content-end">
                    <div>
                        <h2 class="header-title">Online Order</h2>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">1. Put
                            the required items into the shopping cart</h2>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">2.
                            Check out as a Guest or as Member</h2>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">3.
                            Select the shipping method:</h2>
                        <p style="padding-left: 20px;">A. S.F. Express to pay on delivery (Free shipping over $2000)</p>
                        <p style="padding-left: 20px;">B. Self-pickup at Tai Wai Warehouse (Please make an
                            appointment)</p>
                        <p style="padding-left: 20px;">C. Self-pickup at the Wanchai cooperation point (please make an
                            appointment)</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- About Section Start -->
<section class="saller-poster-section">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xl-4 my-auto" id="image-section-one">
                <div class="poster-box">
                    <div class="poster-image">
                        <img src="assets/images/order/payment-mathod.png"
                             class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="seller-title h-100 d-flex align-items-center">
                    <div>
                        <h2 class="header-title">Select Payment Method</h2>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">A. Pay
                            by cash when picking up</h2>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">B.
                            PayMe (Tel: +852 5265 7359)</h2>
                        <p style="padding-left: 20px;">* Send proof of payment to +852 5605 8389 via Whatsapp</p>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">C.
                            Transfer FPS (Tel: +852 5265 7359)</h2>
                        <p style="padding-left: 20px;">* Send proof of payment to +852 5605 8389 via Whatsapp</p>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">D.
                            Bank deposit</h2>
                        <p style="padding-left: 20px;">Account number : 769-334699-883 (Hang Seng Bank)</p>
                        <p style="padding-left: 20px;">Account name : Wayshk</p>
                        <p style="padding-left: 20px;">* After payment, send the deposit proof to +852 5605 8389 via
                            Whatsapp</p>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">E.
                            Credit card payment [an additional 5% handling fee is required]</h2>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">F.
                            Payment by Check (for Institutional/School Orders Only)</h2>
                        <p style="padding-left: 20px;">Please make the check payable to "Wayshk", and indicate Attn:
                            Wayshk on the envelope. Mail the check to RM1, 3/F, Kinglet Industrial Building, 21-23 Shing
                            Wan Rd, Tai Wai</p>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">There
                            Are Electronic Documents For All Orders Placed Online; If You Need The True Copy Of Company
                            Stamp On The Quotation/Invoice/Receipt, Please Specify Before Placing The Order.</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 my-auto" id="image-section-two">
                <div class="poster-box">
                    <div class="poster-image">
                        <img src="assets/images/order/payment-mathod.png"
                             class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- About Section Start -->
<section class="saller-poster-section">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xl-4">
                <div class="poster-box">
                    <div class="poster-image">
                        <img src="assets/images/order/shipping-1.png"
                             class="img-fluid" alt="">
                    </div>
                </div>
            </div>

            <div class="col-xl-7 order-lg-2">
                <div class="seller-title h-100 d-flex justify-content-end">
                    <div>
                        <h2 class="header-title">Shipping</h2>
                        <p style="font-weight: 700;">1. The delivery period of stock products is 0-7 days; and uncertain for pre-order products is uncertain. Welcome to contact us for details.</p></br>
                        <p style="font-weight: 700;">2. The color and style of the products will be distributed randomly. If you have any requirements for the color/style of the product. Please fill in the description box. Wayshk will try to meet your request. There is no return or exchange once the products are delivered.</p></br>
                        <p style="font-weight: 700;">3. If you accidentally fill in the wrong address, please contact us as soon as possible for amendment. If the shipment has been arranged, you will not be able to change the address.</p></br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Service Section Start -->
<section class="become-service section-b-space">
    <div class="container-fluid-lg">
        <div class="seller-title mb-5 text-center">
            <h2 class="header-title">Self Pickup</h2>
        </div>

        <div class="row">
            <div class="col-xl-6 mb-sm-3">
                <div class="service-box">
                    <div class="service-svg">
                        <img src="assets/images/order/warehouse-1.png">
                    </div>

                    <div class="service-detail">
                        <h4>Tai Wai Warehouse</h4>
                        <p>Turn right at Exit A of Tai Wai Station and walk for about 5 minutes</p>
                        <p>Opening hours: Variable (10:30 – 18:15)</p>
                        <p>There is no on-site selection of goods. Make an appointment to pick up the goods in advance and confirm the pick-up time with us. When you arrive, please call and we will bring to you at the door.</p>
                        <p>Cooperation point --- Eporh Child Learning and Development Center</p>
                        <p>Address: 25/F, 237-239 Hennessy Road, Wan Chai</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="service-box">
                    <div class="service-svg">
                        <img src="assets/images/order/warehouse-2.png">
                    </div>

                    <div class="service-detail">
                        <h4>Eporh Child Learning and Development Center</h4>
                        <p>Address: 25/F, 237-239 Hennessy Road, Wan Chai</p>
                        <p>Exit A2 of Wanchai MTR Station and walk for about 5 minutes</p>
                        <p>Exhibition Station Exit A3, walk for about 6 minutes</p>
                        <p>Opening hours: Monday to Friday 09:00 - 18:00; Saturday 09:00 - 16:00</p>
                        <p>【Closed during lunch time 12:30-13:45】. Tel: 2877 8787</p>
                        <p>Please check the stock with us first and make an appointment in advance.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Service Section End -->


<!-- Business Section Start -->
<section class="business-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xl-7">
                <div class="seller-title h-100 d-flex align-items-center">
                    <div>
                        <h2 class="header-title">Overseas Orders</h2>
                        <p>Overseas orders are delivered by SF EXPRESS, and the shipping fee will be paid on delivery</p>
                        <p>Currently accept orders from: <span style="font-weight: 700;">Macau, Taiwan, Singapore, Malaysia, China</span></p>
                        <p>Overseas orders can only be settled by credit card. The transaction fee, exchange rate and refund fee are in accordance with the regulations of the issuing bank. If you have any questions, please contact your credit card issuing bank</p>
                        <p>Overseas orders do not apply to free shipping activities</p>
                        <p>Import tariffs vary from country to country. If you need to collect tariffs when you pick up the package, the tariffs must be paid by the buyer</p>
                        <p>It is recommended to confirm whether the product can be delivered to the designated country before purchasing. If the product is detained during entry no refund will be issued.</p>
                        <p>Returns and exchanges are not accepted for overseas orders.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 my-auto order-lg-2">
                <div class="poster-box">
                    <div class="poster-image">
                        <img src="assets/images/order/Overseas-Orders.png"
                             class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Business Section End -->


<!-- Footer Section Start -->
<?php
include('include/footer.php');
?>
<!-- Footer Section End -->

<!-- Deal Box Modal Start -->
<?php include ('include/deal.php');?>
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
