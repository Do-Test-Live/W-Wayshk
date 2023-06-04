<?php
session_start();
if (isset($_SESSION['id'])) {
    $customer_id = $_SESSION['id'];
}
include('admin/include/dbController.php');
$db_handle = new DBController();

$product_id = $_GET['product_id'];
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
                    <?php
                    $product = $db_handle->runQuery("select * from product where id = '$product_id'");
                    ?>
                    <h2><?php if($_SESSION['language'] === 'CN') echo $product[0]['p_name']; else echo $product[0]['p_name_en'];?></h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>

                            <li class="breadcrumb-item active"><?php if($_SESSION['language'] === 'CN') echo $product[0]['p_name']; else echo $product[0]['p_name_en'];?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Left Sidebar Start -->
<section class="product-section">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
                <div class="row g-4">
                    <div class="col-xl-6 wow fadeInUp">
                        <div class="product-left-box">
                            <div class="row">
                                <div class="col-xl-12 wow fadeInUp">
                                    <div class="product-left-box">
                                        <div class="row">
                                            <div class="col-xxl-10 col-lg-12 col-md-10 order-xxl-2 order-lg-1 order-md-2">
                                                <div class="product-main-2 no-arrow">
                                                    <?php
                                                    $image = explode(',',$product[0]['p_image']);
                                                    foreach ($image as $img){
                                                        ?>
                                                        <div>
                                                            <div class="slider-image">
                                                                <img src="admin/<?php echo $img;?>" id="img-1"
                                                                     class="img-fluid image_zoom_cls-0 blur-up lazyload" alt="">
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="col-xxl-2 col-lg-12 col-md-2 order-xxl-1 order-lg-2 order-md-1">
                                                <div class="left-slider-image-2 left-slider no-arrow slick-top">
                                                    <?php
                                                    foreach ($image as $img){
                                                        ?>
                                                        <div>
                                                            <div class="sidebar-image">
                                                                <img src="admin/<?php echo $img;?>"
                                                                     class="img-fluid blur-up lazyload" alt="">
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
                        </div>
                    </div>

                    <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="right-box-contain">
                            <h2 class="name"><?php if($_SESSION['language'] === 'CN') echo $product[0]['p_name']; else echo $product[0]['p_name_en'];?></h2>
                            <div class="price-rating">
                                <h3 class="theme-color price"><?php echo $product[0]['product_price']; ?>
                                    <!--<span
                                            class="offer theme-color">(8% off)</span>--></h3>
                                <div class="product-rating custom-rate">
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
                                    <!--<span class="review">23 Customer Review</span>-->
                                    <?php
                                    $fetch_quantity_no = $db_handle->numRows("select quantity from stock where product_id = '$product_id'");
                                    $fetch_quantity = $db_handle->runQuery("select quantity from stock where product_id = '$product_id'");
                                    $quantity = $fetch_quantity[0]['quantity'];
                                    if($fetch_quantity_no > 0 && $quantity > 0){
                                        ?>
                                        <h6 class="theme-color"><?php if ($_SESSION['language'] === 'CN') echo '尚有存貨'; else echo 'In Stock'; ?></h6>
                                        <?php
                                    }else{
                                        ?>
                                        <h6 class="theme-color"><?php if ($_SESSION['language'] === 'CN') echo '預購'; else echo 'Preorder'; ?></h6>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="procuct-contain">
                                <p><?php if($_SESSION['language'] === 'CN') echo $product[0]['description']; else echo $product[0]['description_en'];?>
                                </p>
                            </div>


                            <div class="note-box product-packege">
                                <form method="post" action="Product-Details?action=add&product_id=<?php echo $_GET['product_id']; ?>">
                                    <div class="cart_qty qty-box product-qty">
                                        <div class="input-group">
                                            <button type="button" class="qty-left-minus" data-type="minus"
                                                    data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text"
                                                   name="quantity" min="1" value="1">
                                            <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <button class="btn btn-md bg-dark cart-button text-white w-100 mt-3" type="submit"><?php if($_SESSION['language'] === 'CN') echo '查看詳情'; else echo 'Add';?>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block wow fadeInUp">
                <div class="right-sidebar-box">

                    <!-- Trending Product -->
                    <div class="pt-25">
                        <div class="category-menu">
                            <h3><?php if($_SESSION['language'] === 'CN') echo '熱門產品'; else echo 'Trending Products';?></h3>

                            <ul class="product-list product-right-sidebar border-0 p-0">
                                <?php
                                $tranding_product = $db_handle->runQuery("select * from product WHERE status= '1' order by rand() limit 3");
                                $row = $db_handle->numRows("select * from product WHERE status= '1' order by rand() limit 3");

                                for ($i = 0; $i < $row; $i++) {
                                    ?>
                                    <li>
                                        <div class="offer-product">
                                            <a href="Product-Details?product_id=<?php echo $tranding_product[$i]['id']; ?>"
                                               class="offer-image">
                                                <img src="admin/<?php echo str_replace("650", "250", strtok($tranding_product [$i]['p_image'],',')); ?>"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="Product-Details?product_id=<?php echo $tranding_product[$i]['id']; ?>">
                                                        <h6 class="name"><?php if($_SESSION['language'] === 'CN') echo $tranding_product[$i]['p_name']; else  echo $tranding_product[$i]['p_name_en'];?></h6>
                                                    </a>
                                                    <h6 class="price theme-color"><?php echo $tranding_product[$i]['product_price']; ?></h6>
                                                </div>
                                            </div>
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
    </div>
</section>
<!-- Product Left Sidebar End -->

<!-- Releted Product Section Start -->
<section class="product-list-section section-b-space">
    <div class="container-fluid-lg">
        <div class="title">
            <h2>
                <?php if($_SESSION['language'] === 'CN') echo '相關產品'; else echo 'Related Products';?>
            </h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="slider-6_1 product-wrapper">
                    <?php
                    $cat_id = $product[0]['category_id'];
                    $related_products = $db_handle->runQuery("select * from product WHERE status= '1' and category_id = '$cat_id' order by rand() limit 20");
                    $row = $db_handle->numRows("select * from product WHERE status= '1' and category_id = '$cat_id' order by rand() limit 20");
                    for ($i = 0; $i < $row; $i++) {
                        $product_id = $related_products[$i]['id'];
                        ?>
                        <div>
                            <div class="product-box product-box-bg wow fadeInUp">
                                <div class="product-image">
                                    <a href="Product-Details?product_id=<?php echo $related_products [$i]['id']; ?>">
                                        <img src="admin/<?php echo str_replace("650", "250", strtok($related_products [$i]['p_image'],',')); ?>"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="Product-Details?product_id=<?php echo $related_products [$i]['id']; ?>">
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
                                    <a href="Product-Details?product_id=<?php echo $related_products [$i]['id']; ?>">
                                        <h6 class="name">
                                            <?php if($_SESSION['language'] == 'CN') echo $related_products [$i]['p_name']; else echo $related_products [$i]['p_name_en'];?>
                                        </h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price"><?php echo $related_products [$i]['product_price'] ?></span>
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
                                        if($fetch_quantity_no > 0 && $quantity > 0){
                                            ?>
                                            <h6 class="theme-color"><?php if ($_SESSION['language'] === 'CN') echo '尚有存貨'; else echo 'In Stock'; ?></h6>
                                            <?php
                                        }else{
                                            ?>
                                            <h6 class="theme-color"><?php if ($_SESSION['language'] === 'CN') echo '預購'; else echo 'Preorder'; ?></h6>
                                            <?php
                                        }
                                        ?>
                                    </div>

                                    <div class="add-to-cart-box bg-white">
                                        <a href="#">
                                            <button class="btn btn-add-cart addcart-button"><?php if($_SESSION['language'] === 'CN') echo '查看詳情'; else echo 'Add';?>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Releted Product Section End -->

<!-- Footer Section Start -->
<?php
include('include/footer.php');
?>
<!-- Footer Section End -->
<!-- Deal Box Modal Start -->
<?php include ('include/deal.php');?>
<!-- Deal Box Modal End -->

<!-- Tap to top start -->
<div class="theme-option theme-option-2">
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
