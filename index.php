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
                <?php
                $banner_one = $db_handle->runQuery("select * from banner where id = '1'");
                ?>
                <div class="home-contain rounded">
                    <div class="h-100">
                        <img src="<?php echo $banner_one[0]['banner_img']; ?>" class="bg-img blur-up lazyload" alt="">
                    </div>
                    <div class="home-detail p-top-left home-p-medium">
                        <div>
                            <h6 class="text-danger mb-2 fw-bold"><?php if ($_SESSION['language'] === 'CN') echo $banner_one[0]['heading_one_cn']; else echo $banner_one[0]['heading_one']; ?></h6>
                            <h2 class="theme-color fw-bold"><?php if ($_SESSION['language'] === 'CN') echo $banner_one[0]['heading_two_cn']; else echo $banner_one[0]['heading_two']; ?></h2>
                            <p class="text-content d-md-block d-none"><?php if ($_SESSION['language'] === 'CN') echo $banner_one[0]['details_cn']; else echo $banner_one[0]['details']; ?></p>
                            <a href="<?php echo $banner_one[0]['link_one']; ?>"
                               class="shop-button"><?php if ($_SESSION['language'] === 'CN') echo '現在去購物'; else echo 'Shop Now'; ?>
                                <i
                                        class="fa-solid fa-right-long ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-6 col-lg-8 order-xxl-0 ratio_87">
                <?php
                $banner_two = $db_handle->runQuery("select * from banner where id = '2'");
                ?>
                <div class="home-contain rounded">
                    <div class="h-100">
                        <img src="<?php echo $banner_two[0]['banner_img']; ?>" class="bg-img blur-up lazyload" alt="">
                    </div>
                    <div class="home-detail p-center-left home-p-sm">
                        <div>
                            <h6><?php if ($_SESSION['language'] === 'CN') echo $banner_two[0]['heading_one_cn']; else echo $banner_two[0]['heading_one']; ?></h6>
                            <h1 class="w-75 text-uppercase name-title poster-2 my-2">
                                <span class="name-2"><?php if ($_SESSION['language'] === 'CN') echo $banner_two[0]['heading_two_cn']; else echo $banner_two[0]['heading_two']; ?></span>
                            </h1>
                            <p class="w-50"><?php if ($_SESSION['language'] === 'CN') echo $banner_two[0]['details_cn']; else echo $banner_two[0]['details']; ?></p>
                            <a href="<?php echo $banner_two[0]['link_one']; ?>">
                                <button class="btn text-white mt-xxl-4 mt-2 home-button mend-auto theme-bg-color">
                                    <?php if ($_SESSION['language'] === 'CN') echo '現在去購物'; else echo 'Shop Now'; ?>
                                    <i class="fa-solid fa-right-long icon ms-2"></i></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-4 col-sm-6 ratio_180 custom-ratio d-xxl-block d-lg-none d-sm-block d-none">
                <div class="home-contain rounded">
                    <?php
                    $banner_three = $db_handle->runQuery("select * from banner where id = '3'");
                    ?>
                    <img src="<?php echo $banner_three[0]['banner_img']; ?>" class="bg-img blur-up lazyload" alt="">
                    <div class="home-detail p-top-left home-p-medium">
                        <div>
                            <h6 class="text-danger mb-2 fw-bold"><?php if ($_SESSION['language'] === 'CN') echo $banner_three[0]['heading_one_cn']; else echo $banner_three[0]['heading_one']; ?></h6>
                            <h2 class="theme-color fw-bold"><?php if ($_SESSION['language'] === 'CN') echo $banner_three[0]['heading_two_cn']; else echo $banner_three[0]['heading_two']; ?></h2>
                            <p class="text-content d-md-block d-none"><?php if ($_SESSION['language'] === 'CN') echo $banner_three[0]['details_cn']; else echo $banner_three[0]['details']; ?></p>
                            <a href="<?php echo $banner_three[0]['link_one']; ?>"
                               class="shop-button"><?php if ($_SESSION['language'] === 'CN') echo '現在去購物'; else echo 'Shop Now'; ?>
                                <i
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
            <?php
            $cupon_banner = $db_handle->runQuery("select * from banner where id = '4'");
            ?>
            <div class="col-12">
                <div class="banner-contain hover-effect">
                    <img src="<?php echo $cupon_banner[0]['banner_img']; ?>" class="bg-img blur-up lazyload" alt="">
                    <div class="banner-details p-center p-sm-4 p-3 text-white text-center">
                        <div>
                            <h3 class="lh-base fw-bold text-white">
                                <?php if ($_SESSION['language'] === 'CN') echo $cupon_banner[0]['heading_one_cn']; else echo $cupon_banner[0]['heading_one']; ?>
                            </h3>
                            <h6 class="coupon-code code-2"><?php if ($_SESSION['language'] === 'CN') echo '使用代碼：' . $cupon_banner[0]['details_cn']; else echo 'Use Code :' . $cupon_banner[0]['details']; ?></h6>
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
                        <h2><?php
                            if ($_SESSION['language'] === 'CN')
                                echo ' 是日最優惠產品';
                            else
                                echo 'Top Save Today';
                            ?>
                        </h2>
                    </div>
                    <div class="timing-box">
                        <div class="timing theme-bg-color">
                            <i data-feather="clock"></i>
                            <h6 class="name">
                                <?php
                                if ($_SESSION['language'] === 'CN')
                                    echo '到期時間淨餘:';
                                else
                                    echo 'Expires in :';
                                ?>
                            </h6>
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
                    $fetch_product = $db_handle->runQuery("select * from product WHERE status= '1' order by rand() limit 20");
                    $row = $db_handle->numRows("select * from product WHERE status= '1' order by rand() limit 20");
                    for ($i = 0; $i < $row; $i = $i + 2) {
                        $product_id = $fetch_product[$i]['id'];
                        ?>
                        <div>
                            <div class="product-box product-box-bg wow fadeInUp">
                                <div class="product-image">
                                    <a href="Product-Details?product_id=<?php echo $fetch_product [$i]['id']; ?>" target="_blank">
                                        <img src="admin/<?php
                                        echo str_replace("650", "250", strtok($fetch_product [$i]['p_image'], ','));
                                        ?>"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="<?php if($_SESSION['language'] == 'CN') echo '看法'; else echo 'View';?>">
                                            <a href="Product-Details?product_id=<?php echo $fetch_product [$i]['id']; ?>" target="_blank">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="<?php if($_SESSION['language'] == 'CN') echo '願望清單'; else echo 'Wishlist';?>">
                                            <a href="Wish-List?id=<?php echo $fetch_product [$i]['id']; ?>" target="_blank"
                                               class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="Product-Details?product_id=<?php echo $fetch_product [$i]['id']; ?>" target="_blank">
                                        <h6 class="name">
                                            <?php if ($_SESSION['language'] === 'CN') echo $fetch_product [$i]['p_name']; else echo $fetch_product [$i]['p_name_en']; ?>
                                        </h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price"><?php echo $fetch_product [$i]['product_price'] ?></span>
                                    </h5>

                                    <div class="product-rating mt-2">
                                        <!--<ul class="rating">
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
                                        </ul>-->
                                        <?php
                                        $fetch_quantity_no = $db_handle->numRows("select quantity from stock where product_id = '$product_id'");
                                        $fetch_quantity = $db_handle->runQuery("select quantity from stock where product_id = '$product_id'");
                                        $quantity = $fetch_quantity[0]['quantity'];
                                        if ($fetch_quantity_no > 0 && $quantity > 0) {
                                            ?>
                                            <h6 class="theme-color"><?php if ($_SESSION['language'] === 'CN') echo '尚有存貨'; else echo 'In Stock'; ?></h6>
                                            <?php
                                        } else {
                                            ?>
                                            <h6 class="theme-color"><?php if ($_SESSION['language'] === 'CN') echo '預購'; else echo 'Preorder'; ?></h6>
                                            <?php
                                        }
                                        ?>

                                    </div>

                                    <div class="add-to-cart-box bg-white">
                                        <a href="Product-Details?product_id=<?php echo $fetch_product [$i]['id']; ?>" target="_blank">
                                            <button class="btn btn-add-cart addcart-button"><?php if ($_SESSION['language'] === 'CN') echo '查看詳情'; else echo 'Add'; ?>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($i + 1 < $row) {
                                $product_id = $fetch_product[$i + 1]['id'];
                                ?>
                                <div class="product-box product-box-bg wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="product-image">
                                        <a href="Product-Details?product_id=<?php echo $fetch_product [$i + 1]['id']; ?>" target="_blank">
                                            <img src="admin/<?php
                                            echo str_replace("650", "250", strtok($fetch_product [$i + 1]['p_image'], ','));
                                            ?>"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="<?php if($_SESSION['language'] == 'CN') echo '看法'; else echo 'View';?>">
                                                <a href="Product-Details?product_id=<?php echo $fetch_product [$i + 1]['id']; ?>" target="_blank">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="<?php if($_SESSION['language'] == 'CN') echo '願望清單'; else echo 'Wishlist';?>">
                                                <a href="Wish-List?id=<?php echo $fetch_product [$i + 1]['id']; ?>" target="_blank" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="Product-Details?product_id=<?php echo $fetch_product [$i + 1]['id']; ?>" target="_blank">
                                            <h6 class="name">
                                                <?php if ($_SESSION['language'] === 'CN') echo $fetch_product [$i + 1]['p_name']; else echo $fetch_product [$i + 1]['p_name_en']; ?>
                                            </h6>
                                        </a>

                                        <h5 class="sold text-content">
                                            <span class="theme-color price"><?php echo $fetch_product [$i + 1]['product_price'] ?></span>
                                            <del>28.56</del>
                                        </h5>

                                        <div class="product-rating mt-2">
                                            <!--<ul class="rating">
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
                                            </ul>-->

                                            <?php
                                            $fetch_quantity_no = $db_handle->numRows("select quantity from stock where product_id = '$product_id'");
                                            $fetch_quantity = $db_handle->runQuery("select quantity from stock where product_id = '$product_id'");
                                            $quantity = $fetch_quantity[0]['quantity'];
                                            if ($fetch_quantity_no > 0 && $quantity > 0) {
                                                ?>
                                                <h6 class="theme-color"><?php if ($_SESSION['language'] === 'CN') echo '尚有存貨'; else echo 'In Stock'; ?></h6>
                                                <?php
                                            } else {
                                                ?>
                                                <h6 class="theme-color"><?php if ($_SESSION['language'] === 'CN') echo '預購'; else echo 'Preorder'; ?></h6>
                                                <?php
                                            }
                                            ?>
                                        </div>

                                        <div class="add-to-cart-box bg-white">
                                            <a href="Product-Details?product_id=<?php echo $fetch_product [$i + 1]['id']; ?>" target="_blank">
                                                <button class="btn btn-add-cart"><?php if ($_SESSION['language'] === 'CN') echo '查看詳情'; else echo 'Add'; ?>
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
                    <h2>
                        <?php
                        if ($_SESSION['language'] === 'CN')
                            echo '你的日常必需品';
                        else
                            echo 'Your Daily Staples';
                        ?>
                    </h2>
                </div>

                <div class="product-box-slider-2 no-arrow">
                    <?php
                    $fetch_product = $db_handle->runQuery("select * from product WHERE status= '1' order by rand() limit 20");
                    $row = $db_handle->numRows("select * from product WHERE status= '1' order by rand() limit 20");
                    for ($i = 0; $i < $row; $i = $i + 2) {
                        $product_id = $fetch_product[$i]['id'];
                        ?>
                        <div>
                            <div class="product-box product-box-bg wow fadeInUp">
                                <div class="product-image">
                                    <a href="Product-Details?product_id=<?php echo $fetch_product [$i]['id']; ?>" target="_blank">
                                        <img src="admin/<?php
                                        echo str_replace("650", "250", strtok($fetch_product [$i]['p_image'], ','));
                                        ?>"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="<?php if($_SESSION['language'] == 'CN') echo '看法'; else echo 'View';?>">
                                            <a href="Product-Details?product_id=<?php echo $fetch_product [$i]['id']; ?>" target="_blank">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="<?php if($_SESSION['language'] == 'CN') echo '願望清單'; else echo 'Wishlist';?>">
                                            <a href="Wish-List?id=<?php echo $fetch_product [$i]['id']; ?>" target="_blank" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="Product-Details?product_id=<?php echo $fetch_product [$i]['id']; ?>" target="_blank">
                                        <h6 class="name">
                                            <?php if ($_SESSION['language'] === 'CN') echo $fetch_product [$i]['p_name']; else echo $fetch_product [$i]['p_name_en']; ?>
                                        </h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price"><?php echo $fetch_product [$i]['product_price'] ?></span>
                                    </h5>

                                    <div class="product-rating mt-2">
                                        <!--<ul class="rating">
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
                                        </ul>-->

                                        <?php
                                        $fetch_quantity_no = $db_handle->numRows("select quantity from stock where product_id = '$product_id'");
                                        $fetch_quantity = $db_handle->runQuery("select quantity from stock where product_id = '$product_id'");
                                        $quantity = $fetch_quantity[0]['quantity'];
                                        if ($fetch_quantity_no > 0 && $quantity > 0) {
                                            ?>
                                            <h6 class="theme-color"><?php if ($_SESSION['language'] === 'CN') echo '尚有存貨'; else echo 'In Stock'; ?></h6>
                                            <?php
                                        } else {
                                            ?>
                                            <h6 class="theme-color"><?php if ($_SESSION['language'] === 'CN') echo '預購'; else echo 'Preorder'; ?></h6>
                                            <?php
                                        }
                                        ?>
                                    </div>

                                    <div class="add-to-cart-box bg-white">
                                        <a href="Product-Details?product_id=<?php echo $fetch_product [$i + 1]['id']; ?>" target="_blank">
                                            <button class="btn btn-add-cart addcart-button"><?php if ($_SESSION['language'] === 'CN') echo '查看詳情'; else echo 'Add'; ?>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($i + 1 < $row) {
                                $product_id = $fetch_product[$i + 1]['id'];
                                ?>
                                <div class="product-box product-box-bg wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="product-image">
                                        <a href="Product-Details?product_id=<?php echo $fetch_product [$i + 1]['id']; ?>" target="_blank">
                                            <img src="admin/<?php
                                            echo str_replace("650", "250", strtok($fetch_product [$i + 1]['p_image'], ','));
                                            ?>"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="<?php if($_SESSION['language'] == 'CN') echo '看法'; else echo 'View';?>">
                                                <a href="Product-Details?product_id=<?php echo $fetch_product [$i + 1]['id']; ?>" target="_blank">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="<?php if($_SESSION['language'] == 'CN') echo '願望清單'; else echo 'Wishlist';?>">
                                                <a href="Wish-List?id=<?php echo $fetch_product [$i + 1]['id']; ?>" target="_blank" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="Product-Details?product_id=<?php echo $fetch_product [$i + 1]['id']; ?>" target="_blank">
                                            <h6 class="name">
                                                <?php if ($_SESSION['language'] === 'CN') echo $fetch_product [$i + 1]['p_name']; else echo $fetch_product [$i + 1]['p_name_en']; ?>
                                            </h6>
                                        </a>

                                        <h5 class="sold text-content">
                                            <span class="theme-color price"><?php echo $fetch_product [$i + 1]['product_price'] ?></span>
                                        </h5>

                                        <div class="product-rating mt-2">
                                            <!--<ul class="rating">
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
                                            </ul>-->

                                            <?php
                                            $fetch_quantity_no = $db_handle->numRows("select quantity from stock where product_id = '$product_id'");
                                            $fetch_quantity = $db_handle->runQuery("select quantity from stock where product_id = '$product_id'");
                                            $quantity = $fetch_quantity[0]['quantity'];
                                            if ($fetch_quantity_no > 0 && $quantity > 0) {
                                                ?>
                                                <h6 class="theme-color"><?php if ($_SESSION['language'] === 'CN') echo '尚有存貨'; else echo 'In Stock'; ?></h6>
                                                <?php
                                            } else {
                                                ?>
                                                <h6 class="theme-color"><?php if ($_SESSION['language'] === 'CN') echo '預購'; else echo 'Preorder'; ?></h6>
                                                <?php
                                            }
                                            ?>
                                        </div>

                                        <div class="add-to-cart-box bg-white">
                                            <a href="Product-Details?product_id=<?php echo $fetch_product [$i + 1]['id']; ?>" target="_blank">
                                                <button class="btn btn-add-cart"><?php if ($_SESSION['language'] === 'CN') echo '查看詳情'; else echo 'Add'; ?>
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
                            <?php
                            $first_add = $db_handle->runQuery("select * from banner where id = '5'");
                            ?>
                            <img src="<?php echo $first_add[0]['banner_img']; ?>" class="bg-img blur-up lazyload"
                                 alt="">
                            <div class="banner-detail p-top-left">
                                <div>
                                    <h6 class="text-uppercase theme-color fw-500"><?php if ($_SESSION['language'] === 'CN') echo $first_add[0]['heading_one_cn']; else echo $first_add[0]['heading_one']; ?></h6>
                                    <h3 class="text-uppercase">
                                        <span class="brand-name"><?php if ($_SESSION['language'] === 'CN') echo $first_add[0]['heading_two_cn']; else echo $first_add[0]['heading_two']; ?></span>
                                    </h3>
                                    <p class="text-content fw-500 mt-3 lh-lg"><?php if ($_SESSION['language'] === 'CN') echo $first_add[0]['details_cn']; else echo $first_add[0]['details']; ?></p>

                                    <div class="banner-detail-box banner-detail-box-2 mb-md-3 mb-1">
                                        <h4 class="text-uppercase"><?php if ($_SESSION['language'] === 'CN') echo $first_add[0]['heading_three_cn']; else echo $first_add[0]['heading_three']; ?></h4>
                                    </div>

                                    <div>
                                        <a href="<?php echo $first_add[0]['link_one']; ?>">
                                            <button class="btn text-white btn-md mt-xxl-4 mt-2 home-button mend-auto theme-bg-color">
                                                <?php if ($_SESSION['language'] === 'CN') echo '立即了解'; else echo 'Find Out Now'; ?>
                                                <i class="fa-solid fa-right-long icon ms-2"></i>
                                            </button>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ratio_125 section-t-space wow fadeIn">
                        <div class="banner-contain-2 rounded hover-effect">
                            <?php
                            $second_add = $db_handle->runQuery("select * from banner where id = '6'");
                            ?>
                            <img src="<?php echo $second_add[0]['banner_img']; ?>" class="bg-img blur-up lazyload"
                                 alt="">
                            <div class="banner-detail p-top-left">
                                <div>
                                    <h6 class="text-uppercase theme-color fw-500"><?php if ($_SESSION['language'] === 'CN') echo $second_add[0]['heading_one_cn']; else echo $second_add[0]['heading_one']; ?></h6>
                                    <h3 class="text-pacifico mt-2"><?php if ($_SESSION['language'] === 'CN') echo $second_add[0]['heading_two_cn']; else echo $second_add[0]['heading_two']; ?>
                                    </h3>
                                    <p class="text-content fw-500 mt-3 w-75 mend-auto"><?php if ($_SESSION['language'] === 'CN') echo $second_add[0]['details_cn']; else echo $second_add[0]['details']; ?></p>
                                    <a href="<?php echo $second_add[0]['link_one']; ?>">
                                        <button class="btn text-white btn-md mt-2 home-button mend-auto theme-bg-color">
                                            <?php if ($_SESSION['language'] === 'CN') echo '立即了解'; else echo 'Find Out Now'; ?>
                                            <i class="fa-solid fa-right-long icon ms-2"></i>
                                        </button>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!--<div class="section-t-space wow fadeIn">
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
                    </div>-->
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
                    <?php
                    $banner_middle = $db_handle->runQuery("select * from banner where id = '7'");
                    ?>
                    <img src="<?php echo $banner_middle[0]['banner_img']; ?>" class="bg-img blur-up lazyload" alt="">
                    <div class="home-detail p-center position-relative text-center">
                        <div>
                            <h3 class="text-danger text-uppercase fw-bold mb-0">
                                <?php if ($_SESSION['language'] === 'CN') echo $banner_middle[0]['heading_one_cn']; else echo $banner_middle[0]['heading_one']; ?>
                            </h3>
                            <h2 class="theme-color text-pacifico fw-normal mb-0 super-sale text-center">
                                <?php if ($_SESSION['language'] === 'CN') echo $banner_middle[0]['heading_two_cn']; else echo $banner_middle[0]['heading_two']; ?>
                            </h2>
                            <h2 class="home-name text-uppercase"> <?php if ($_SESSION['language'] === 'CN') echo $banner_middle[0]['heading_three_cn']; else echo $banner_middle[0]['heading_three']; ?></h2>
                            <h3 class="text-pacifico fw-normal text-content text-center">
                                <?php if ($_SESSION['language'] === 'CN') echo $banner_middle[0]['details_cn']; else echo $banner_middle[0]['details']; ?>
                            </h3>
                            <ul class="social-icon">
                                <li>
                                    <a href="https://www.instagram.com/ways_hk/?igshid=YmMyMTA2M2Y%3D">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="https://www.facebook.com/wayshk000?mibextid=LQQJ4d">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="http://wa.me/85252657359">
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
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-12">
                        <div class="top-selling-box">
                            <div class="top-selling-title">
                                <h3>
                                    <?php
                                    if ($_SESSION['language'] === 'CN')
                                        echo '最暢銷';
                                    else
                                        echo 'Top Selling';
                                    ?>
                                </h3>
                            </div>
                            <?php
                            $fetch_product = $db_handle->runQuery("select * from product WHERE status= '1' order by rand() limit 3");
                            $row = $db_handle->numRows("select * from product WHERE status= '1' order by rand() limit 3");
                            for ($i = 0; $i < $row; $i++) {
                                ?>
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="Product-Details?product_id=<?php echo $fetch_product [$i]['id']; ?>" target="_blank"
                                       class="top-selling-image">
                                        <img src="admin/<?php
                                        echo str_replace("650", "250", strtok($fetch_product [$i]['p_image'], ','));
                                        ?>"
                                             class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="Product-Details?product_id=<?php echo $fetch_product [$i]['id']; ?>" target="_blank">
                                            <h5><?php if ($_SESSION['language'] === 'CN') echo $fetch_product [$i]['p_name']; else echo $fetch_product [$i]['p_name_en']; ?></h5>
                                        </a>
                                        <!--<div class="product-rating">
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
                                        </div>-->
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

            <div class="col-md-4">
                <div class="row">
                    <div class="col-12">
                        <div class="top-selling-box">
                            <div class="top-selling-title">
                                <h3>
                                    <?php
                                    if ($_SESSION['language'] === 'CN')
                                        echo '熱門產品';
                                    else
                                        echo 'Trending Products';
                                    ?>
                                </h3>
                            </div>
                            <?php
                            $product = $db_handle->runQuery("select * from product WHERE status= '1' order by rand() limit 3");
                            $row = $db_handle->numRows("select * from product WHERE status= '1' order by rand() limit 3");
                            for ($i = 0; $i < $row; $i++) {
                                ?>
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="Product-Details?product_id=<?php echo $product [$i]['id']; ?>" target="_blank"
                                       class="top-selling-image">
                                        <img src="admin/<?php
                                        echo str_replace("650", "250", strtok($product [$i]['p_image'], ','));
                                        ?>"
                                             class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="Product-Details?product_id=<?php echo $product [$i]['id']; ?>">
                                            <h5><?php if ($_SESSION['language'] === 'CN') echo $product [$i]['p_name']; else echo $product [$i]['p_name_en']; ?></h5>
                                        </a>
                                        <!--<div class="product-rating">
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
                                        </div>-->
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

            <div class="col-md-4">
                <div class="row">
                    <div class="col-12">
                        <div class="top-selling-box">
                            <div class="top-selling-title">
                                <h3>
                                    <?php
                                    if ($_SESSION['language'] === 'CN')
                                        echo '最新產品';
                                    else
                                        echo 'Recently Added';
                                    ?>
                                </h3>
                            </div>

                            <?php
                            $fetch_product3 = $db_handle->runQuery("select * from product WHERE status= '1' order by id desc limit 3");
                            $row = $db_handle->numRows("select * from product WHERE status= '1' order by id desc limit 3");
                            for ($i = 0; $i < $row; $i++) {
                                ?>
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="Product-Details?product_id=<?php echo $fetch_product3 [$i]['id']; ?>" target="_blank"
                                       class="top-selling-image">
                                        <img src="admin/<?php
                                        echo str_replace("650", "250", strtok($fetch_product3 [$i]['p_image'], ','));
                                        ?>"
                                             class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="Product-Details?product_id=<?php echo $fetch_product3 [$i]['id']; ?>">
                                            <h5><?php if ($_SESSION['language'] === 'CN') echo $fetch_product3 [$i]['p_name']; else echo $fetch_product3 [$i]['p_name_en']; ?></h5>
                                        </a>
                                        <!--<div class="product-rating">
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
                                        </div>-->
                                        <h6><?php echo $fetch_product3[$i]['product_price']; ?></h6>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!--<div>
                <div class="row">
                    <div class="col-12">
                        <div class="top-selling-box">
                            <div class="top-selling-title">
                                <h3>
                                    <?php
            /*                                    if($_SESSION['language'] === 'CN')
                                                    echo '最高評價';
                                                else
                                                    echo 'Top Rated';
                                                */ ?>
                                    </h3>
                            </div>

                            <?php
            /*                            $fetch_product2 = $db_handle->runQuery("select * from product WHERE status= '1' order by rand() limit 3");
                                        $row = $db_handle->numRows("select * from product WHERE status= '1' order by rand() limit 3");
                                        for ($i = 0; $i < $row; $i++) {
                                            */ ?>
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="#" class="top-selling-image">
                                        <img src="admin/<?php
            /*                                        echo str_replace("650", "250", strtok($fetch_product2 [$i]['p_image'],','));
                                                    */ ?>"
                                             class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="#">
                                            <h5><?php /*if($_SESSION['language'] === 'CN') echo $fetch_product2 [$i]['p_name']; else echo $fetch_product2 [$i]['p_name_en'];*/ ?></h5>
                                        </a>
                                        <!--<div class="product-rating">
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
                                        </div>-->
            <h6><?php /*echo $fetch_product2[$i]['product_price']; */ ?></h6>
        </div>
    </div>
    <?php
    /*                            }
                                */ ?>
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

<!-- Deal Box Modal Start -->
<?php include('include/deal.php'); ?>
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
