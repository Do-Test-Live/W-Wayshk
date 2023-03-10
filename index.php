<?php
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
    <title>Wayshk |職業治療服務及用品 | 香港</title>
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

<body class="theme-color-1">

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


<!-- Home Section Start -->
<section class="home-section home-section-ratio pt-2">
    <div class="container-fluid-lg">
        <div class="row g-4">
            <div class="col-xxl-3 col-lg-4 col-sm-6 ratio_180 d-sm-block d-none">
                <div class="home-contain rounded">
                    <div class="h-100">
                        <img src="assets/images/cake/banner/1.jpg" class="bg-img blur-up lazyload" alt="">
                    </div>
                    <div class="home-detail p-top-left home-p-medium">
                        <div>
                            <h6 class="text-danger mb-2 fw-bold">Fresh & Delicious</h6>
                            <h2 class="theme-color fw-bold">Fresh Bread</h2>
                            <p class="text-content d-md-block d-none">Bento box burritos cherry bomb pepper dark and
                                stormy with ginger..</p>
                            <a href="shop.php" class="shop-button">Shop Now <i
                                        class="fa-solid fa-right-long ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-6 col-lg-8 order-xxl-0 ratio_87">
                <div class="home-contain rounded">
                    <div class="h-100">
                        <img src="assets/images/cake/banner/2.jpg" class="bg-img blur-up lazyload" alt="">
                    </div>
                    <div class="home-detail p-center-left home-p-sm">
                        <div>
                            <h6>Exclusive offer <span>30% Off</span></h6>
                            <h1 class="w-75 text-uppercase name-title poster-2 my-2">
                                we'll make <span class="name">handmade</span> your
                                <span class="name-2">sweet</span>
                            </h1>
                            <p class="w-50">Earl grey latte Thai basil curry grains alfalfa sprouts banana bread
                                ginger carrot...</p>
                            <button onclick="location.href = '#';"
                                    class="btn text-white mt-xxl-4 mt-2 home-button mend-auto theme-bg-color">
                                Shop Now <i class="fa-solid fa-right-long icon ms-2"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-4 col-sm-6 ratio_180 custom-ratio d-xxl-block d-lg-none d-sm-block d-none">
                <div class="home-contain rounded">
                    <img src="assets/images/cake/banner/3.jpg" class="bg-img blur-up lazyload" alt="">
                    <div class="home-detail p-top-left home-p-medium">
                        <div>
                            <h6 class="text-danger mb-2 fw-bold">Fresh & Delicious</h6>
                            <h2 class="theme-color fw-bold">Bakery Sweet</h2>
                            <p class="text-content d-md-block d-none">Peanut butter crunch chia seeds red parsley
                                basil overflowing..</p>
                            <a href="shop.php" class="shop-button">Shop Now <i
                                        class="fa-solid fa-right-long ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Home Section End -->

<!-- Category Section Start -->

<!-- Category Section End -->

<!-- Discount Section Start -->
<section>
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="banner-contain hover-effect">
                    <img src="assets/images/cake/banner/4.jpg" class="bg-img blur-up lazyload" alt="">
                    <div class="banner-details p-center p-sm-4 p-3 text-white text-center">
                        <div>
                            <h3 class="lh-base fw-bold text-white">
                                Get $3 Cashback! Min Order of $30
                            </h3>
                            <h6 class="coupon-code code-2">Use Code : GROCERY1920</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discount Section End -->

<!-- Banner Section Start -->
<!-- Banner Section End -->

<!-- Product Section Start -->
<section>
    <div class="container-fluid-lg">
        <div class="row g-3">
            <div class="col-xxl-9 col-xl-8">
                <div class="title title-flex">
                    <div>
                        <h2>Top Save Today</h2>
                        <span class="title-leaf">
                                <svg class="icon-width">
                                    <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#cake"></use>
                                </svg>
                            </span>
                    </div>
                    <div class="timing-box">
                        <div class="timing theme-bg-color">
                            <i data-feather="clock"></i>
                            <h6 class="name">Expires in :</h6>
                            <div class="time" id="clockdiv-1" data-hours="1" data-minutes="2" data-seconds="3">
                                <ul>
                                    <li>
                                        <div class="counter">
                                            <div class="days">
                                                <h6></h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="counter">
                                            <div class="hours">
                                                <h6></h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="counter">
                                            <div class="minutes">
                                                <h6></h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="counter">
                                            <div class="seconds">
                                                <h6></h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-box-slider-2 no-arrow">
                    <?php
                    $fetch_product = $db_handle->runQuery("select * from product WHERE status= '1' order by rand()");
                    $row = $db_handle->numRows("select * from product WHERE status= '1' order by rand()");
                    for ($i = 0; $i < $row; $i = $i + 2) {
                        ?>
                        <div>
                            <div class="product-box product-box-bg wow fadeInUp">
                                <div class="product-image">
                                    <a href="#">
                                        <img src="admin/<?php echo $fetch_product [$i]['p_image'] ?>"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="#" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="#">
                                        <h6 class="name">
                                            <?php echo $fetch_product [$i]['p_name'] ?>
                                        </h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price"><?php echo $fetch_product [$i]['product_price'] ?></span>
                                    </h5>

                                    <div class="product-rating mt-2">
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

                                        <h6 class="theme-color">In Stock</h6>
                                    </div>

                                    <div class="add-to-cart-box bg-white">
                                        <a href="#">
                                            <button class="btn btn-add-cart addcart-button">Add
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($i+1 < $row) {
                                ?>
                                <div class="product-box product-box-bg wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="admin/<?php echo $fetch_product [$i + 1]['p_image'] ?>"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#view">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="#" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="#">
                                            <h6 class="name">
                                                <?php echo $fetch_product [$i + 1]['p_name'] ?>
                                            </h6>
                                        </a>

                                        <h5 class="sold text-content">
                                            <span class="theme-color price"><?php echo $fetch_product [$i + 1]['product_price'] ?></span>
                                            <del>28.56</del>
                                        </h5>

                                        <div class="product-rating mt-2">
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

                                            <h6 class="theme-color">In Stock</h6>
                                        </div>

                                        <div class="add-to-cart-box bg-white">
                                            <a href="#">
                                                <button class="btn btn-add-cart">Add
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="title section-t-space">
                    <h2>Your Daily Staples</h2>
                    <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#cake"></use>
                            </svg>
                        </span>
                </div>

                <div class="product-box-slider-2 no-arrow">
                    <?php
                    $fetch_product = $db_handle->runQuery("select * from product WHERE status= '1' order by rand(id)");
                    $row = $db_handle->numRows("select * from product WHERE status= '1' order by rand(id)");
                    for ($i = 0; $i < $row; $i = $i + 2) {
                        ?>
                        <div>
                            <div class="product-box product-box-bg wow fadeInUp">
                                <div class="product-image">
                                    <a href="#">
                                        <img src="admin/<?php echo $fetch_product [$i]['p_image'] ?>"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="#" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="#">
                                        <h6 class="name">
                                            <?php echo $fetch_product [$i]['p_name'] ?>
                                        </h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price"><?php echo $fetch_product [$i]['product_price'] ?></span>
                                    </h5>

                                    <div class="product-rating mt-2">
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

                                        <h6 class="theme-color">In Stock</h6>
                                    </div>

                                    <div class="add-to-cart-box bg-white">
                                        <a href="#">
                                            <button class="btn btn-add-cart addcart-button">Add
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($i+1 < $row) {
                            ?>
                            <div class="product-box product-box-bg wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-image">
                                    <a href="#">
                                        <img src="admin/<?php echo $fetch_product [$i + 1]['p_image'] ?>"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="#" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="#">
                                        <h6 class="name">
                                            <?php echo $fetch_product [$i + 1]['p_name'] ?>
                                        </h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price"><?php echo $fetch_product [$i + 1]['product_price'] ?></span>
                                        <del>28.56</del>
                                    </h5>

                                    <div class="product-rating mt-2">
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

                                        <h6 class="theme-color">In Stock</h6>
                                    </div>

                                    <div class="add-to-cart-box bg-white">
                                        <a href="#">
                                            <button class="btn btn-add-cart">Add
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-4 d-none d-xl-block">
                <div class="position-sticky top-0">
                    <div class="ratio_209 rounded wow fadeIn">
                        <div class="banner-contain-2 rounded hover-effect">
                            <img src="assets/images/cake/banner/10.jpg" class="bg-img blur-up lazyload" alt="">
                            <div class="banner-detail p-top-left">
                                <div>
                                    <h6 class="text-uppercase theme-color fw-500">seafood</h6>
                                    <h3 class="text-uppercase">
                                        special <span class="brand-name">brand</span>
                                    </h3>
                                    <p class="text-content fw-500 mt-3 lh-lg">Special offer on the discount very
                                        hungry cake and sweets</p>

                                    <div class="banner-detail-box banner-detail-box-2 mb-md-3 mb-1">
                                        <h4 class="text-uppercase">up to</h4>
                                        <h2 class="mt-2">50%</h2>
                                        <h3 class="text-uppercase">off</h3>
                                    </div>

                                    <div>
                                        <button onclick="location.href = '#';"
                                                class="btn text-white btn-md mt-xxl-4 mt-2 home-button mend-auto theme-bg-color">
                                            Shop
                                            Now<i class="fa-solid fa-right-long icon ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ratio_125 section-t-space wow fadeIn">
                        <div class="banner-contain-2 rounded hover-effect">
                            <img src="assets/images/cake/banner/9.jpg" class="bg-img blur-up lazyload" alt="">
                            <div class="banner-detail p-top-left">
                                <div>
                                    <h6 class="text-uppercase theme-color fw-500">Freash Every Day!</h6>
                                    <h3 class="text-pacifico mt-2">Delicioud <span class="theme-color">Bread</span>
                                    </h3>
                                    <p class="text-content fw-500 mt-3 w-75 mend-auto">Delicioud Bread and Brend new
                                        fresh bread.</p>
                                    <button onclick="location.href = '#';"
                                            class="btn text-white btn-md mt-2 home-button mend-auto theme-bg-color">
                                        Shop Now <i class="fa-solid fa-right-long icon ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section-t-space wow fadeIn">
                        <div class="category-menu category-menu-2">
                            <h3>Customer Comment</h3>

                            <div class="review-box">
                                <div class="review-contain">
                                    <h5 class="w-75">We Care About Our Customer Experience</h5>
                                    <p>In publishing and graphic design, Lorem ipsum is a
                                        placeholder text commonly used to demonstrate the visual
                                        form of a document or a typeface without relying on
                                        meaningful content.</p>
                                </div>

                                <div class="review-profile">
                                    <div class="review-image">
                                        <img src="assets/images/vegetable/review/1.jpg"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </div>
                                    <div class="review-detail">
                                        <h5>Tina Mcdonnale</h5>
                                        <h6>Sale Manager</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Banner Section Start -->
<section>
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="home-contain hover-effect">
                    <img src="assets/images/cake/banner/11.jpg" class="bg-img blur-up lazyload" alt="">
                    <div class="home-detail p-center position-relative text-center">
                        <div>
                            <h3 class="text-danger text-uppercase fw-bold mb-0">
                                limited Time Offer
                            </h3>
                            <h2 class="theme-color text-pacifico fw-normal mb-0 super-sale text-center">
                                Super
                            </h2>
                            <h2 class="home-name text-uppercase">sale</h2>
                            <h3 class="text-pacifico fw-normal text-content text-center">
                                www.wayshk.com
                            </h3>
                            <ul class="social-icon">
                                <li>
                                    <a href="https://www.instagram.com/">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="https://www.facebook.com/">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="https://twitter.com/">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="https://www.whatsapp.com/">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Top Selling Section Start -->
<section class="top-selling-section">
    <div class="container-fluid-lg">
        <div class="slider-4-1">
            <div>
                <div class="row">
                    <div class="col-12">
                        <div class="top-selling-box">
                            <div class="top-selling-title">
                                <h3>Top Selling</h3>
                            </div>
                            <?php
                            $fetch_product = $db_handle->runQuery("select * from product WHERE status= '1' order by rand(id) limit 3");
                            $row = $db_handle->numRows("select * from product WHERE status= '1' order by rand(id) limit 3");
                            for ($i = 0; $i < $row; $i++) {
                                ?>
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="#" class="top-selling-image">
                                        <img src="admin/<?php echo $fetch_product[$i]['p_image']; ?>"
                                             class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="#">
                                            <h5><?php echo $fetch_product[$i]['p_name']; ?></h5>
                                        </a>
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
                                            <span>(34)</span>
                                        </div>
                                        <h6><?php echo $fetch_product[$i]['product_price']; ?></h6>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="row">
                    <div class="col-12">
                        <div class="top-selling-box">
                            <div class="top-selling-title">
                                <h3>Trending Products</h3>
                            </div>
                            <?php
                            $product = $db_handle->runQuery("select * from product WHERE status= '1' order by rand(id) limit 3");
                            $row = $db_handle->numRows("select * from product WHERE status= '1' order by rand(id) limit 3");
                            for ($i = 0; $i < $row; $i++) {
                                ?>
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="#" class="top-selling-image">
                                        <img src="admin/<?php echo $product[$i]['p_image']; ?>"
                                             class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="#">
                                            <h5><?php echo $product[$i]['p_name']; ?></h5>
                                        </a>
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
                                            <span>(34)</span>
                                        </div>
                                        <h6><?php echo $product[$i]['product_price']; ?></h6>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="row">
                    <div class="col-12">
                        <div class="top-selling-box">
                            <div class="top-selling-title">
                                <h3>Recently added</h3>
                            </div>

                            <?php
                            $fetch_product = $db_handle->runQuery("select * from product WHERE status= '1' order by id desc limit 3");
                            $row = $db_handle->numRows("select * from product WHERE status= '1' order by id desc limit 3");
                            for ($i = 0; $i < $row; $i++) {
                                ?>
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="#" class="top-selling-image">
                                        <img src="admin/<?php echo $fetch_product[$i]['p_image']; ?>"
                                             class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="#">
                                            <h5><?php echo $fetch_product[$i]['p_name']; ?></h5>
                                        </a>
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
                                            <span>(34)</span>
                                        </div>
                                        <h6><?php echo $fetch_product[$i]['product_price']; ?></h6>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="row">
                    <div class="col-12">
                        <div class="top-selling-box">
                            <div class="top-selling-title">
                                <h3>Top Rated</h3>
                            </div>

                            <?php
                            $fetch_product = $db_handle->runQuery("select * from product WHERE status= '1' order by rand(id) limit 3");
                            $row = $db_handle->numRows("select * from product WHERE status= '1' order by rand(id) limit 3");
                            for ($i = 0; $i < $row; $i++) {
                                ?>
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="#" class="top-selling-image">
                                        <img src="admin/<?php echo $fetch_product[$i]['p_image']; ?>"
                                             class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="#">
                                            <h5><?php echo $fetch_product[$i]['p_name']; ?></h5>
                                        </a>
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
                                            <span>(34)</span>
                                        </div>
                                        <h6><?php echo $fetch_product[$i]['product_price']; ?></h6>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Top Selling Section End -->

<!-- Newsletter Section Start -->
<?php
include('include/newsletter.php');
?>
<!-- Newsletter Section End -->

<!-- Footer Section Start -->
<?php
include('include/footer.php');
?>
<!-- Footer Section End -->

<!-- Location Modal Start -->
<<!--div class="modal location-modal fade theme-modal" id="locationModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choose your Delivery Location</h5>
                    <p class="mt-1 text-content">Enter your address and we will specify the offer for your area.</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="location-list">
                        <div class="search-input">
                            <input type="search" class="form-control" placeholder="Search Your Area">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>

                        <div class="disabled-box">
                            <h6>Select a Location</h6>
                        </div>

                        <ul class="location-select custom-height">
                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Alabama</h6>
                                    <span>Min: $130</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Arizona</h6>
                                    <span>Min: $150</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>California</h6>
                                    <span>Min: $110</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Colorado</h6>
                                    <span>Min: $140</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Florida</h6>
                                    <span>Min: $160</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Georgia</h6>
                                    <span>Min: $120</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Kansas</h6>
                                    <span>Min: $170</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Minnesota</h6>
                                    <span>Min: $120</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>New York</h6>
                                    <span>Min: $110</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)">
                                    <h6>Washington</h6>
                                    <span>Min: $130</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
<!-- Location Modal End -->


<!-- Quick View Modal Box Start -->
<div class="modal fade theme-modal view-modal" id="view" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row g-sm-4 g-2">
                    <div class="col-lg-6">
                        <div class="slider-image">
                            <img src="assets/images/product/category/1.jpg" class="img-fluid blur-up lazyload"
                                 alt="">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="right-sidebar-modal">
                            <h4 class="title-name">Peanut Butter Bite Premium Butter Cookies 600 g</h4>
                            <h4 class="price">$36.99</h4>
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
                                <span class="ms-2">8 Reviews</span>
                            </div>

                            <div class="product-detail">
                                <h4>Product Details :</h4>
                                <p>Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love.
                                    Caramels marshmallow icing dessert candy canes I love soufflé I love toffee.
                                    Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon
                                    muffin I love carrot cake sugar plum dessert bonbon.</p>
                            </div>

                            <ul class="brand-list">
                                <li>
                                    <div class="brand-box">
                                        <h5>Brand Name:</h5>
                                        <h6>Black Forest</h6>
                                    </div>
                                </li>

                                <li>
                                    <div class="brand-box">
                                        <h5>Product Code:</h5>
                                        <h6>W0690034</h6>
                                    </div>
                                </li>

                                <li>
                                    <div class="brand-box">
                                        <h5>Product Type:</h5>
                                        <h6>White Cream Cake</h6>
                                    </div>
                                </li>
                            </ul>

                            <div class="select-size">
                                <h4>Cake Size :</h4>
                                <select class="form-select select-form-size">
                                    <option selected>Select Size</option>
                                    <option value="1.2">1/2 KG</option>
                                    <option value="0">1 KG</option>
                                    <option value="1.5">1/5 KG</option>
                                    <option value="red">Red Roses</option>
                                    <option value="pink">With Pink Roses</option>
                                </select>
                            </div>

                            <div class="modal-button">
                                <button onclick="location.href = 'cart.php';"
                                        class="btn btn-md add-cart-button icon">Add
                                    To Cart
                                </button>
                                <button onclick="location.href = '#';"
                                        class="btn theme-bg-color view-button icon text-white fw-bold btn-md">
                                    View More Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick View Modal Box End -->


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
                        <li class="list-1">
                            <div class="deal-offer-contain">
                                <a href="shop.php" class="deal-image">
                                    <img src="assets/images/vegetable/product/10.png" class="blur-up lazyload"
                                         alt="">
                                </a>

                                <a href="shop.php" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57
                                        <del>57.62</del>
                                        <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-2">
                            <div class="deal-offer-contain">
                                <a href="shop.php" class="deal-image">
                                    <img src="assets/images/vegetable/product/11.png" class="blur-up lazyload"
                                         alt="">
                                </a>

                                <a href="shop.php" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57
                                        <del>57.62</del>
                                        <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-3">
                            <div class="deal-offer-contain">
                                <a href="shop.php" class="deal-image">
                                    <img src="assets/images/vegetable/product/12.png" class="blur-up lazyload"
                                         alt="">
                                </a>

                                <a href="shop.php" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57
                                        <del>57.62</del>
                                        <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-1">
                            <div class="deal-offer-contain">
                                <a href="shop.php" class="deal-image">
                                    <img src="assets/images/vegetable/product/13.png" class="blur-up lazyload"
                                         alt="">
                                </a>

                                <a href="shop.php" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57
                                        <del>57.62</del>
                                        <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Deal Box Modal End -->

<!-- Add to cart Modal Start -->
<div class="add-cart-box">
    <div class="add-iamge">
        <img src="assets/images/cake/pro/1.jpg" class="img-fluid blur-up lazyload" alt="">
    </div>

    <div class="add-contain">
        <h6>Added to Cart</h6>
    </div>
</div>
<!-- Add to cart Modal End -->

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

<!-- sidebar open js -->
<script src="assets/js/filter-sidebar.js"></script>

<!-- Bootstrap js-->
<script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap/popper.min.js"></script>

<!-- feather icon js-->
<script src="assets/js/feather/feather.min.js"></script>
<script src="assets/js/feather/feather-icon.js"></script>

<!-- Lazyload Js -->
<script src="assets/js/lazysizes.min.js"></script>

<!-- Slick js-->
<script src="assets/js/slick/slick.js"></script>
<script src="assets/js/slick/custom_slick.js"></script>
<script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

<!-- Auto Height Js -->
<script src="assets/js/auto-height.js"></script>

<!-- Timer Js -->
<script src="assets/js/timer1.js"></script>

<!-- Fly Cart Js -->
<script src="assets/js/fly-cart.js"></script>

<!-- Quantity js -->
<script src="assets/js/quantity-2.js"></script>

<!-- WOW js -->
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/custom-wow.js"></script>

<!-- script js -->
<script src="assets/js/script.js"></script>

</body>
</html>
