<?php
session_start();
if(isset($_SESSION['id'])){
    $customer_id = $_SESSION['id'];
}
include ('admin/include/dbController.php');
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

        .about-us-title .second{
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
                    <h2 class="center" style="color: #ffa53b">Ordering method and terms and conditions</h2>
                </div>
                <div class="about-us-title text-center">
                    <h2 class="center second">place an order</h2>
                </div>
                <div class="slider-3_1 product-wrapper">
                    <div>
                        <div class="clint-contain" style="background: #f8eab3">
                            <div class="client-icon">
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/3/work.svg"
                                     class="blur-up lazyload" alt="">
                            </div>
                            <h4>Online order (you can enjoy the preferential price on the website if you place an order on the website yourself)</h4>
                            <p>
                                Step 1: Put the desired products directly into the shopping cart on the website<br/>
                                Step 2: A. Online payment, the default is to pay by SF Express (each order needs to charge $25 online transaction fee)
                                B. After placing the order, whatsapp the order number to + 852 52657359 for offline payment
                            </p>
                        </div>
                    </div>
                    <div>
                        <div class="clint-contain" style="background: #f8eab3">
                            <div class="client-icon">
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/3/buy.svg"
                                     class="blur-up lazyload" alt="">
                            </div>
                            <h4>Complete the product order form</h4>
                            <p>
                                Click the button to download the product order form, email to waysshk.order@gmail.com or Whatsapp to +852 52657359
                            </p>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <b>中文版</b> <a href="assets/document/b05373_bfe59f57fdbb4780bd62fcdf57eed338.pdf" target="_blank" class="btn btn-warning mt-3" style="background-color: #ffa53b;"><b>下載</b></a>
                                </div>
                                <div class="col-6">
                                    <b>English order form</b> <a href="assets/document/b05373_fb2f515896dd4ac995d91ea42cb82c54.pdf" target="_blank" class="btn btn-warning mt-3" style="background-color: #ffa53b;"><b>Download</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-us-title text-center mt-5">
                    <h2 class="center second">Payment</h2>
                </div>
                <div class="slider-3_1 product-wrapper mt-1">
                    <div>
                        <div class="clint-contain" style="background: #e1e193">
                            <div class="client-icon">
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/3/work.svg"
                                     class="blur-up lazyload" alt="">
                            </div>
                            <h4>Welcome to pay in the following ways</h4>
                            <p>
                                Online Payment: Credit Card<br/>
                                Offline Payment: FPS/PayMe/Hang Seng Bank Deposit/Cheque by Mail/Cash<br/>
                                ***Electronic receipts are available for online orders; if you need a quotation/bill/receipt when placing an order by other methods, please specify it before placing the order
                            </p>
                        </div>
                    </div>
                </div>
                <div class="about-us-title text-center mt-5">
                    <h2 class="center second">To Ship</h2>
                </div>
                <div class="slider-3_1 product-wrapper mt-1">
                    <div>
                        <div class="clint-contain" style="background: #ddf0ff">
                            <div class="client-icon">
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/3/work.svg"
                                     class="blur-up lazyload" alt="">
                            </div>
                            <h4>Shipping method (free shipping on orders over $2000)</h4>
                            <p>
                                ● SF Express to pay/self-pay postage<br/>
                                ● ​Self Pickup
                            </p>
                            <p>
                                *** Items with the label "coming soon" or shown as out of stock are pre-ordered products, and the arrival date is uncertain.
                                Will wait for the goods in the order to be complete before shipping. Welcome to ask us for details.<br/>

                                *** The color and style of the product will be distributed randomly; but Wayshk understands children's obsession with color,
                                If you have any special requirements, you can fill in the new description. Wayshk will try to cooperate as much as possible.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="about-us-title text-center mt-5">
                    <h2 class="center second">Self pick-up point</h2>
                </div>
                <div class="slider-3_1 product-wrapper mt-1">
                    <div>
                        <div class="clint-contain" style="background: #e2caca">
                            <div class="client-icon">
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/3/work.svg"
                                     class="blur-up lazyload" alt="">
                            </div>
                            <h4>Tai Wai Warehouse</h4>
                            <p>
                                Address: Room 1, 3rd Floor, Qunli Industrial Building, 21-23 Shing Wan Road, Tai Wai, New Territories, Hong Kong [Tai Wai Railway Station Exit A, walk for about 5 minutes]<br/>
                                An appointment is required to pick up the goods, place an order first to confirm the pick-up time, please call when you arrive, and deliver at the door, accept cash payment
                            </p>
                        </div>
                    </div>
                    <div>
                        <div class="clint-contain" style="background: #e2caca">
                            <div class="client-icon">
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/3/work.svg"
                                     class="blur-up lazyload" alt="">
                            </div>
                            <h4>Erpu Children's Learning and Development Center</h4>
                            <p>
                                Address: 25th Floor, 237-239 Hennessy Road, Wanchai [Wanchai MTR Station Exit A2, walk for about 5 minutes]<br/>
                                Opening hours: Monday to Friday 09:00 - 18:00; Saturday 09:00 - 16:00 [Closed during lunch time 12:30-13:45]<br/>
                                Tel: 2877 8787<br/>
                                Please check the inventory first, place an order first to confirm the pick-up time, and accept cash payment
                            </p>
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
                            <p style="font-size: 28px;font-weight: bold">Terms and Conditions</p>
                        </div>

                        <div class="delivery-list">
                            <p class="text-content">
                                By submitting and/or confirming the order, it means that you understand and accept the shopping terms and conditions of Wayshk (hereinafter referred to as the store). The methods of submission and confirmation are not limited to online shopping platforms, but also include submission and confirmation by telephone, email or in person at the consignment store. orders.
                                <br/>
                                1. All items are subject to availability. If any items are sold out, the store will not give prior notice. The store also reserves the right to refuse and/or limit the quantity of orders without giving any explanation. In the event of the above, our store will notify you by phone or email.
                                <br/>
                                2. Return guarantee within 5 days after arrival:
                                <br/>
                                - After the arrival of the goods, it is found that it is different from the ordered product (only new unopened products are accepted)/the product has obvious defects or damage can be returned or exchanged
                                <br/>
                                - Only applicable to non-artificial damage products, not acceptable due to unsatisfactory product performance and other reasons
                                <br/>
                                - Any returned goods can only be replaced with goods of the same value or higher value, and the customer must pay the difference of the higher value goods. If you replace the item with lower value, all balance will not be refunded
                                <br/>
                                - Return fee: subject to the delivery address, the store will bear the return shipping fee, but administrative fees may be charged according to the actual situation
                                <br/>
                                - Products or accessories related to personal hygiene will not be returned or exchanged under any circumstances (e.g. teethers, treatment brushes)
                                <br/>
                                - Our store reserves the right to make the final decision on product replacement
                                <br/>
                                3. Coupon codes, discounts, and gifts are only applicable to designated customers or promotions. If there is a wrong use, whether it is caused by human error or system failure, our store will automatically correct it and notify you by phone or email for confirmation. If the customer does not enter the coupon code prior to submitting the order, it will be deemed to have forfeited the offer to use the coupon.
                                <br/>
                                4. Please consult the store staff about the usage of the product before purchasing. The store will not be responsible for any problems caused by wrong or improper use of the product; the store reserves the right to modify and revise the price, delivery charges and online shopping terms and conditions from time to time rights without prior notice; in case of any dispute, Wayshk reserves the right of final decision.
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
