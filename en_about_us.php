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
    <title>About Us | Wayshk </title>

    <?php include ('include/css.php');?>
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
include ('include/header.php');
?>
<!-- Header End -->


<!-- Fresh Vegetable Section Start -->
<section class="fresh-vegetable-section section-lg-space">
    <div class="container-fluid-lg">
        <div class="row gx-xl-5 gy-xl-0 g-3 ratio_148_1">
            <div class="col-6">
                <div>
                    <img src="assets/images/about_us/p.png" class="img-fluid" alt="">
                </div>
            </div>

            <!--  come from demo website about us page-->
            <div class="col-xl-6 col-12">
                <div class="fresh-contain p-center-left">
                    <div>
                        <div class="review-title">
                            <h2>Company Profile</h2>
                        </div>

                        <div class="delivery-list">
                            <ul class="delivery-box">
                                <li>
                                    <div class="delivery-box">
                                        <div class="delivery-detail">
                                            <h5 class="text">Wayshk children's products store is operated in the form of a small store. Occupational therapists use professional perspectives to carefully search for children's products and toys with training value from all over the world, which is convenient for customers to purchase in one stop. We also sell many creative teaching materials designed by ourselves, so that children can learn and grow up happily in interesting games.
                                                The reason why it is named "Ways" means that this store can provide many options, and use different products to achieve training purposes in a way that breaks through the box. Children will encounter many difficulties on the way of growth, but there are always many ways to solve them. More importantly, there are infinite possibilities for the children's future path!
                                                At the same time, we hope to promote occupational therapy services and products in this small city of Hong Kong, so that people who are experiencing difficulties can live an independent and meaningful life.
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

<!-- Review Section Start -->
<!--<section class="review-section section-lg-space">
    <div class="container-fluid">
        <div class="about-us-title text-center">
            <h4 class="text-content">Latest Testimonals</h4>
            <h2 class="center">What people say</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="slider-4-half product-wrapper">
                    <div>
                        <div class="reviewer-box">
                            <i class="fa-solid fa-quote-right"></i>
                            <div class="product-rating">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                            </div>

                            <h3>Top Quality, Beautiful Location</h3>

                            <p>"I usually try to keep my sadness pent up inside where it can fester quietly as a
                                mental illness. There, now he's trapped in a book I wrote: a crummy world of plot
                                holes and spelling errors! As an interesting side note."</p>

                            <div class="reviewer-profile">
                                <div class="reviewer-image">
                                    <img src="assets/images/inner-page/user/1.jpg" class="blur-up lazyload"
                                         alt="">
                                </div>

                                <div class="reviewer-name">
                                    <h4>Betty J. Turner</h4>
                                    <h6>CTO, Company</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="reviewer-box">
                            <i class="fa-solid fa-quote-right"></i>
                            <div class="product-rating">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                            </div>

                            <h3>Top Quality, Beautiful Location</h3>

                            <p>"My busy schedule leaves little, if any, time for blogging and social media. The
                                Lorem Ipsum Company has been a huge part of helping me grow my business through
                                organic search and content marketing."</p>
                            <div class="reviewer-profile">
                                <div class="reviewer-image">
                                    <img src="assets/images/inner-page/user/2.jpg" class="blur-up lazyload"
                                         alt="">
                                </div>

                                <div class="reviewer-name">
                                    <h4>Alfredo S. Rocha</h4>
                                    <h6>Project Manager</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="reviewer-box">
                            <i class="fa-solid fa-quote-right"></i>
                            <div class="product-rating">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                            </div>

                            <h3>Top Quality, Beautiful Location</h3>

                            <p>"Professional, responsive, and able to keep up with ever-changing demand and tight
                                deadlines: That's how I would describe Jeramy and his team at The Lorem Ipsum
                                Company. When it comes to content marketing."</p>
                            <div class="reviewer-profile">
                                <div class="reviewer-image">
                                    <img src="assets/images/inner-page/user/3.jpg" class="blur-up lazyload"
                                         alt="">
                                </div>

                                <div class="reviewer-name">
                                    <h4>Donald C. Spurr</h4>
                                    <h6>Sale Agents</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="reviewer-box">
                            <i class="fa-solid fa-quote-right"></i>
                            <div class="product-rating">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                            </div>

                            <h3>Top Quality, Beautiful Location</h3>

                            <p>"After being forced to move twice within five years, our customers had a hard time
                                finding us and our sales plummeted. The Lorem Ipsum Co. not only revitalized our
                                brand."</p>
                            <div class="reviewer-profile">
                                <div class="reviewer-image">
                                    <img src="assets/images/inner-page/user/4.jpg" class="blur-up lazyload"
                                         alt="">
                                </div>

                                <div class="reviewer-name">
                                    <h4>Terry G. Fain</h4>
                                    <h6>Photographer</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="reviewer-box">
                            <i class="fa-solid fa-quote-right"></i>
                            <div class="product-rating">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                            </div>

                            <h3>Top Quality, Beautiful Location</h3>

                            <p>"I was skeptical of SEO and content marketing at first, but the Lorem Ipsum Company
                                not only proved itself financially speaking, but the response I have received from
                                customers is incredible."</p>
                            <div class="reviewer-profile">
                                <div class="reviewer-image">
                                    <img src="assets/images/inner-page/user/1.jpg" class="blur-up lazyload"
                                         alt="">
                                </div>

                                <div class="reviewer-name">
                                    <h4>Gwen J. Geiger</h4>
                                    <h6>Designer</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="reviewer-box">
                            <i class="fa-solid fa-quote-right"></i>
                            <div class="product-rating">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                            </div>

                            <h3>Top Quality, Beautiful Location</h3>

                            <p>"Jeramy and his team at the Lorem Ipsum Company whipped my website into shape just in
                                time for tax season. I was excited by the results and am proud to direct clients to
                                my website once again."</p>

                            <div class="reviewer-profile">
                                <div class="reviewer-image">
                                    <img src="assets/images/inner-page/user/2.jpg" class="blur-up lazyload"
                                         alt="">
                                </div>

                                <div class="reviewer-name">
                                    <h4>Constance K. Whang</h4>
                                    <h6>CEO, Company</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="reviewer-box">
                            <i class="fa-solid fa-quote-right"></i>
                            <div class="product-rating">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                            </div>

                            <h3>Top Quality, Beautiful Location</h3>

                            <p>"Yeah, and if you were the pope they'd be all, "Straighten your pope hat." And "Put
                                on your good vestments." What are their names? Yep, I remember. They came in last at
                                the Olympics!"</p>
                            <div class="reviewer-profile">
                                <div class="reviewer-image">
                                    <img src="assets/images/inner-page/user/3.jpg" class="blur-up lazyload"
                                         alt="">
                                </div>

                                <div class="reviewer-name">
                                    <h4>Christopher R. Lee</h4>
                                    <h6>Managing Director</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="reviewer-box">
                            <i class="fa-solid fa-quote-right"></i>
                            <div class="product-rating">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                            </div>

                            <h3>Top Quality, Beautiful Location</h3>

                            <p>"Good man. Nixon's pro-war and pro-family. Hey, tell me something. You've got all
                                this money. How come you always dress like you're doing your laundry? So, how 'bout
                                them Knicks? What kind of a father would I be if I said no?."</p>
                            <div class="reviewer-profile">
                                <div class="reviewer-image">
                                    <img src="assets/images/inner-page/user/4.jpg" class="blur-up lazyload"
                                         alt="">
                                </div>

                                <div class="reviewer-name">
                                    <h4>Eileen R. Chu</h4>
                                    <h6>Marketing Director</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!-- Review Section End -->

<!-- Footer Section Start -->
<?php
include ('include/footer.php');
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
