<?php
session_start();
if(isset($_SESSION['id'])){
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
    <title>治療用品 | Wayshk | 香港</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&amp;display=swap"
          rel="stylesheet">
    <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
            rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- wow css -->
    <link rel="stylesheet" href="assets/css/animate.min.css"/>

    <!-- font-awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
          integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick/slick-theme.css">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="assets/css/bulk-style.css">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="assets/css/style.css">
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


<!-- Poster Section Start -->
<section>
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="slider-1 slider-animate product-wrapper no-arrow">
                    <div>
                        <div class="banner-contain-2 hover-effect">
                            <img src="assets/images/shop/1.jpg" class="bg-img rounded-3 blur-up lazyload" alt="">
                            <div
                                    class="banner-detail p-center-right position-relative shop-banner ms-auto banner-small">
                                <div>
                                    <h2>Healthy, nutritious & Tasty Fruits & Veggies</h2>
                                    <h3>Save upto 50%</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="banner-contain-2 hover-effect">
                            <img src="assets/images/shop/2.jpg" class="bg-img rounded-3 blur-up lazyload" alt="">
                            <div
                                    class="banner-detail p-center-right position-relative shop-banner ms-auto banner-small">
                                <div>
                                    <h2>Healthy, nutritious & Tasty Fruits & Veggies</h2>
                                    <h3>Save upto 50%</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="banner-contain-2 hover-effect">
                            <img src="assets/images/shop/3.jpg" class="bg-img rounded-3 blur-up lazyload" alt="">
                            <div
                                    class="banner-detail p-center-right position-relative shop-banner ms-auto banner-small">
                                <div>
                                    <h2>Healthy, nutritious & Tasty Fruits & Veggies</h2>
                                    <h3>Save upto 50%</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Poster Section End -->

<!-- Shop Section Start -->
<section class="section-b-space shop-section">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-custome-3">
                <div class="left-box wow fadeInUp">
                    <div class="shop-left-sidebar">
                        <div class="back-button">
                            <h3><i class="fa-solid fa-arrow-left"></i> Back</h3>
                        </div>

                        <div class="accordion custome-accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                        <span><?php if($_SESSION['language'] === 'CN') echo '類別'; else echo 'Categories';?></span>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                     aria-labelledby="headingOne">
                                    <div class="accordion-body">
                                        <div class="form-floating theme-form-floating-2 search-box">
                                            <input type="search" class="form-control" id="search"
                                                   placeholder="<?php if($_SESSION['language'] === 'CN') echo '搜索'; else echo 'Search ..';?>">
                                            <label for="search"><?php if($_SESSION['language'] === 'CN') echo '搜索'; else echo 'Search ..';?></label>
                                        </div>

                                        <ul class="category-list custom-padding custom-height">

                                            <?php
                                            $fetch_cat = $db_handle->runQuery("SELECT * FROM `category` where status = '1'");
                                            $row = $db_handle->numRows("SELECT * FROM `category` where status = '1'");
                                            for ($i = 0; $i < $row; $i++) {
                                                ?>
                                                <li>
                                                    <a href="Shop?catId=<?php echo $fetch_cat[$i]['id']; ?>">
                                                        <div class="form-check ps-0 m-0 category-list-box">
                                                            <label class="form-check-label" for="fruit"
                                                                   style="cursor: pointer;">
                                                                <span class="name"><?php if($_SESSION['language'] === 'CN') echo $fetch_cat[$i]['c_name']; else echo $fetch_cat[$i]['c_name_en']; ?></span>
                                                                <?php
                                                                $product_id = $fetch_cat[$i]['id'];
                                                                $fetch_number_of_products = $db_handle->runQuery("SELECT COUNT(id) as total_number FROM `product` WHERE category_id = '$product_id';");
                                                                $row1 = $db_handle->numRows("SELECT COUNT(id) FROM `product` WHERE category_id = '$product_id';");
                                                                for ($j = 0; $j < $row1; $j++) {
                                                                    ?>
                                                                    <span class="number"><?php echo $fetch_number_of_products[$j]['total_number']; ?></span>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </label>
                                                        </div>

                                                    </a>
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
            </div>
            <?php
            if (isset($_GET['catId'])) {
                $id = $_GET['catId'];
                ?>
                <div class="col-custome-9">

                    <div class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">
                        <?php
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        // calculate the offset for the SQL query
                        $offset = ($current_page - 1) * 8;
                        $fetch_products = $db_handle->runQuery("SELECT * FROM category,`product` WHERE product.status = '1' and product.category_id = category.id AND category.status = '1' AND product.category_id = '$id' limit 8 OFFSET $offset");
                        $num_rows = $db_handle->numRows("SELECT * FROM category,`product` WHERE product.status = '1' and product.category_id = category.id AND category.status = '1' AND product.category_id = '$id' limit 8 OFFSET $offset");
                        for ($i = 0; $i < $num_rows; $i++) {
                            ?>
                            <div>
                                <div class="product-box-3 h-100 wow fadeInUp">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="Product-Details?product_id=<?php echo $fetch_products[$i]['id'];?>">
                                                <img src="admin/<?php
                                                echo str_replace("650", "250", strtok($fetch_products [$i]['p_image'],','));
                                                ?>"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <ul class="product-option">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                    <a href="Product-Details?product_id=<?php echo $fetch_products[$i]['id'];?>">
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
                                    </div>
                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <span class="span-name"><?php if($_SESSION['language'] === 'CN') echo $fetch_products[$i]['c_name']; else echo $fetch_products[$i]['c_name_en'];?></span>
                                            <a href="Product-Details?product_id=<?php echo $fetch_products[$i]['id'];?>">
                                                <h5 class="name"><?php if($_SESSION['language'] === 'CN') echo $fetch_products[$i]['p_name']; else echo $fetch_products[$i]['p_name_en'];?></h5>
                                            </a>
                                            <!--<div class="product-rating mt-2">
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
                                            </div>-->
                                            <h5 class="price"><span
                                                        class="theme-color"><?php echo $fetch_products[$i]['product_price'] ?> HKD</span>
                                            </h5>
                                            <div class="add-to-cart-box bg-white">
                                                <a href="Product-Details?product_id=<?php echo $fetch_products[$i]['id'];?>" class="btn btn-add-cart addcart-button"><?php if($_SESSION['language'] === 'CN') echo '加入購物車'; else echo 'Add';?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <nav class="custome-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="Shop?catId=<?php echo $id;?>&page=1" tabindex="-1" aria-disabled="true">
                                    <i class="fa-solid fa-angles-left"></i>
                                </a>
                            </li>
                            <?php
                            // calculate the total number of pages
                            $new = $db_handle->runQuery("SELECT COUNT(id) as c FROM `product` WHERE category_id = '$id'");
                            $no_new = $db_handle->numRows("SELECT COUNT(id) as c FROM `product` WHERE category_id = '$id'");

                            $total_pages = ceil($new[0]['c'] / 8);
                            if(isset($_GET['page'])){
                                $page = $_GET['page'];
                            }else{
                                $page = 1;
                            }
                            for ($i = $page; $i <= $total_pages; $i++) {
                                if($i == $page + 5){
                                    echo "......";
                                    $i=$total_pages;
                                }
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="Shop?catId=<?php echo $id;?>&page=<?php echo $i; ?>"><?php echo $i;?></a>
                                </li>
                                <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="Shop?catId=<?php echo $id;?>&page=<?php echo $i-1; ?>">
                                    <i class="fa-solid fa-angles-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <?php
            } else {
                ?>
                <div class="col-custome-9">

                    <div class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">
                        <?php
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        // calculate the offset for the SQL query
                        $offset = ($current_page - 1) * 8;
                        $fetch_products = $db_handle->runQuery("SELECT * FROM category,`product` WHERE product.status = '1' and product.category_id = category.id AND category.status = '1' limit 12 OFFSET $offset;");
                        $num_rows = $db_handle->numRows("SELECT * FROM category,`product` WHERE product.status = '1' and product.category_id = category.id AND category.status = '1' limit 12 OFFSET $offset;");
                        for ($i = 0; $i < $num_rows; $i++) {
                            ?>
                            <div>
                                <div class="product-box-3 h-100 wow fadeInUp">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="Product-Details?product_id=<?php echo $fetch_products[$i]['id'];?>">
                                                <img src="admin/<?php
                                                echo str_replace("650", "250", strtok($fetch_products [$i]['p_image'],','));
                                                ?>"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <ul class="product-option">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                    <a href="Product-Details?product_id=<?php echo $fetch_products[$i]['id'];?>" data-bs-toggle="modal"
                                                       data-bs-target="#view">
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
                                    </div>
                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <span class="span-name"><?php if($_SESSION['language'] === 'CN') echo $fetch_products[$i]['c_name']; else echo $fetch_products[$i]['c_name_en'];?></span>
                                            <a href="Product-Details?product_id=<?php echo $fetch_products[$i]['id'];?>">
                                                <h5 class="name"><?php if($_SESSION['language'] === 'CN') echo $fetch_products[$i]['p_name']; else echo $fetch_products[$i]['p_name_en'];?></h5>
                                            </a>

                                            <h5 class="price"><span
                                                        class="theme-color"><?php echo $fetch_products[$i]['product_price'] ?> HKD</span>
                                            </h5>
                                            <div class="add-to-cart-box bg-white">
                                                <a href="Product-Details?product_id=<?php echo $fetch_products[$i]['id'];?>" class="btn btn-add-cart addcart-button"><?php if($_SESSION['language'] === 'CN') echo '加入購物車'; else echo 'Add';?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <nav class="custome-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="Shop?page=1" tabindex="-1" aria-disabled="true">
                                    <i class="fa-solid fa-angles-left"></i>
                                </a>
                            </li>
                            <?php
                            // calculate the total number of pages
                            $new = $db_handle->runQuery("SELECT COUNT('id') as c FROM product");
                            $no_new = $db_handle->numRows("SELECT COUNT('id') as c FROM product");

                            $total_pages = ceil($new[0]['c'] / 8);
                            if(isset($_GET['page'])){
                                $page = $_GET['page'];
                            }else{
                                $page = 1;
                            }
                            for ($i = $page; $i <= $total_pages; $i++) {
                                if($i == $page + 5){
                                    echo "......";
                                    $i=$total_pages;
                                }
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="Shop?page=<?php echo $i; ?>"><?php echo $i;?></a>
                                </li>
                                <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="Shop?page=<?php echo $i-1; ?>">
                                    <i class="fa-solid fa-angles-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- Shop Section End -->

<!-- Footer Section Start -->
<?php
include('include/footer.php');
?>
<!-- Footer Section End -->


<!-- Location Modal Start -->
<!--<div class="modal location-modal fade theme-modal" id="locationModal" tabindex="-1"
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

<!-- Deal Box Modal Start -->
<?php include ('include/deal.php');?>
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

<!-- Bootstrap js-->
<script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>
<script src="assets/js/bootstrap/popper.min.js"></script>

<!-- feather icon js-->
<script src="assets/js/feather/feather.min.js"></script>
<script src="assets/js/feather/feather-icon.js"></script>

<!-- Lazyload Js -->
<script src="assets/js/lazysizes.min.js"></script>

<!-- Slick js-->
<script src="assets/js/slick/slick.js"></script>
<script src="assets/js/slick/slick-animation.min.js"></script>
<script src="assets/js/slick/custom_slick.js"></script>

<!-- Price Range Js -->
<script src="assets/js/ion.rangeSlider.min.js"></script>

<!-- Quantity js -->
<script src="assets/js/quantity-2.js"></script>

<!-- sidebar open js -->
<script src="assets/js/filter-sidebar.js"></script>

<!-- WOW js -->
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/custom-wow.js"></script>

<!-- script js -->
<script src="assets/js/script.js"></script>

<!-- thme setting js -->
<script src="assets/js/theme-setting.js"></script>
</body>
</html>
