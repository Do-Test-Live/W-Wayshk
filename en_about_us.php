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
    <title>About Us | Wayshk </title>

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
<!--<div class="fullpage-loader">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>-->
<!-- Loader End -->

<!-- Header Start -->
<?php
include('include/header.php');
?>
<!-- Header End -->


<!-- Fresh Vegetable Section Start -->
<section class="fresh-vegetable-section section-lg-space">
    <div class="container-fluid-lg">
        <div class="row gx-xl-5 gy-xl-0 g-3 ratio_148_1">
            <div class="col-6">
                <div>
                    <img src="assets/images/about_us/ways.png" class="img-fluid" alt="">
                </div>
            </div>

            <!--  come from demo website about us page-->
            <div class="col-xl-6 col-12">
                <div class="fresh-contain p-center-left">
                    <div>
                        <div class="review-title">
                            <h2 class="inner-header">About Us</h2>
                        </div>

                        <div class="delivery-list">
                            <ul class="delivery-box">
                                <li>
                                    <div class="delivery-box">
                                        <div class="delivery-detail">
                                            <h5 class="text">Wayshk children's goods store operates in a small scale. We
                                                have professional occupational therapists who have carefully sourced
                                                training materials and toys from around the world for customers. We also
                                                sell self-designed creative educational materials to help children learn
                                                and grow happily through play.
                                            </h5>
                                        </div>
                                        <div class="delivery-detail">
                                            <h5 class="text">Our name 'Ways' means that the shop offers a wide range of
                                                options for customers. We provided ways to use products innovatively for
                                                different training purposes.
                                            </h5>
                                        </div>
                                        <div class="delivery-detail">
                                            <h5 class="text">Children may encounter many difficulties along their
                                                developmental pathway, but there are always ways to overcome the
                                                obstacles. More importantly, there are endless possibilities for the
                                                future of kids!
                                            </h5>
                                        </div>
                                        <div class="delivery-detail">
                                            <h5 class="text">We also hope to promote occupational therapy services and
                                                products in Hong Kong, so that people who are experiencing difficulties
                                                can live a life in a more independent and meaningful way.
                                            </h5>
                                        </div>
                                    </div>
                                </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fresh Vegetable Section End -->

<!-- Fresh Vegetable Section Start -->
<!--<section class="fresh-vegetable-section section-lg-space">
    <div class="container-fluid-lg">
        <div class="row gx-xl-5 gy-xl-0 g-3 ratio_148_1">
            <div class="col-12">
                <div class="fresh-contain">
                    <div>
                        <div class="review-title text-center">
                            <p style="font-size: 28px;font-weight: bold">We make Organic Food In Market</p>
                        </div>

                        <div class="delivery-list">
                            <p class="text-content">Just a few seconds to measure your body temperature. Up to 5
                                users! The battery lasts up to 2 years. There are many variations of passages of
                                Lorem Ipsum available.We started in 2019 and haven't stopped smashing it since. A
                                global brand that doesn't sleep, we are 24/7 and always bringing something new with
                                over 100 new products dropping on the monhtly, bringing you the latest looks for
                                less.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->
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
