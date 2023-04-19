<?php
session_start();
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
    <title>User Profile</title>

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
                    <h2 class="mb-2">Terms and Conditions</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active"><a href="terms_condition.php">CN</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- log in section start -->
<section class="log-in-section background-image-2 section-b-space">
    <div class="container-fluid-lg w-100">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-5" style="font-size: 40px;">Terms and Conditions
                </h1>
                <ul>
                    <li>This page was written in Chinese and translated to English. In case of any dispute, the Chinese
                        version shall prevail.</li>

                </ul>
                <ul>
                    <li>By submitting and/or confirming the order, it means that you understand and accept the terms and
                        conditions of Wayshk Children's Goods Store (hereinafter referred to as our shop ). Submission and
                        confirmation of orders are not limited to online shopping platform, but also include orders made
                        through telephone, email or in person .</li>
                </ul>
                <h4 class="mt-3" style="font-weight: bold">1. All items are available while stock lasts. No prior notice will be given if any item is sold out.
                    We also reserve the right to refuse and limit the number of orders without giving any explanation.
                    In such cases, we will notify you by phone or email.</h4>
                <h4 class="mt-3" style="font-weight: bold">2. All paid orders cannot be cancelled or refunded except for items that are chronically out of
                    stock.
                </h4>
                <h4 class="mt-3" style="font-weight: bold">3. Return and exchange guarantee terms:
                </h4>
                <ul>
                    <li>Items found to be different from the ordered item upon arrival (only unopened brand new items
                        will be accepted) / items found to be visibly defective or damaged after opening the packaging
                        will be accepted for exchange. Please inform us within 5 days of receipt of the goods, no
                        returns will be accepted after this period.
                    </li>
                    <li>We will not accept or replace products that are slightly damaged in transit (e.g. dents) which
                        do not affect normal use.
                    </li>

                    <li>Products or accessories related to personal hygiene (e.g. teethers, brushes); any discounted
                        /clearance/ free products, have no returns or exchanges.
                    </li>
                    <li>Returns will only be accepted for products that have not been damaged by man-made and will not
                        be accepted for reasons such as dissatisfaction with the performance of the product.
                    </li>
                    <li>Any returned item can only be exchanged for items of equal or greater value. Customer will be
                        required to pay the price difference if you choose to exchange items with higher value. No
                        refund will be made for any remaining balance if a lower value item is exchanged.
                    </li>

                    <li>Return shipping cost: The return shipping cost will be borne by our shop based on the delivery address, but an administration fee may be charged depending on the actual situation.
                    </li>
                    <li>
                        We reserve the right to make final decision on replacement of products.
                    </li>

                </ul>
                <h4 class="mt-3" style="font-weight: bold">4. Some orders may be returned due to unknown delivery address, repeated deliveries with no recipient or the recipient refusing to accept the parcel. When a parcel is returned to us by the courier, the original shipping cost and the return shipping cost will be deducted from the refund to cover the return order processing fee.
                </h4>
                <h4 class="mt-3" style="font-weight: bold">5. Coupon codes, offers and freebies are only applicable to selected customers or promotion periods. In case of incorrect usage, whether caused by human error or system failure, the shop will automatically correct and notify you by phone or email to reconfirm. If customers do not enter the promotion code before submitting the order, they will be considered as a waiver of the benefits of using the coupon.</h4>
                <ul>
                    <li>Please consult our shop staff on the usage of the product before purchase. Our shop will not hold any responsibility for any problems arising from incorrect or improper use of the product.</li>
                </ul>
                <h4 class="mt-3" style="font-weight: bold" >7. We reserve the right to amend the prices, delivery charges and online shopping terms and conditions from time to time without prior notice. In case of any dispute, our decision shall be final.</h4>
            </div>
        </div>
    </div>
</section>
<!-- log in section end -->

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
                            $image = explode(',',$product[$i]['p_image'])
                            ?>
                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop.php" class="deal-image">
                                        <img src="admin/<?php echo $image[0];?>" class="blur-up lazyload"
                                             alt="">
                                    </a>

                                    <a href="shop.php" class="deal-contain">
                                        <h5><?php echo $product[$i]['p_name']?></h5>
                                        <h6><?php echo $product[$i]['product_price']?></h6>
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

<!-- Bootstrap js-->
<script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap/popper.min.js"></script>

<!-- feather icon js-->
<script src="assets/js/feather/feather.min.js"></script>
<script src="assets/js/feather/feather-icon.js"></script>

<!-- Slick js-->
<script src="assets/js/slick/slick.js"></script>
<script src="assets/js/slick/slick-animation.min.js"></script>
<script src="assets/js/slick/custom_slick.js"></script>

<!-- Lazyload Js -->
<script src="assets/js/lazysizes.min.js"></script>

<!-- script js -->
<script src="assets/js/script.js"></script>

<!-- thme setting js -->
<script src="assets/js/theme-setting.js"></script>
</body>
</html>

