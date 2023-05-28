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
    <title>治療用品 | Wayshk | 九龍</title>

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


<!-- Review Section Start -->
<section class="review-section section-lg-space">
    <div class="container-fluid">
        <div class="about-us-title text-center">
            <h4 class="text-content">
                <?php
                if($_SESSION['language'] === 'CN')
                    echo '最新評價';
                else
                    echo 'Latest Testimonials';
                ?>
                </h4>
            <h2 class="center">
                <?php
                if($_SESSION['language'] === 'CN')
                    echo '人們怎麼說';
                else
                    echo 'What people say';
                ?>
                </h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="slider-4-half product-wrapper">
                    <?php
                    $fetch_review = $db_handle->runQuery("select * from review where status = '1' order by review_id desc");
                    $no_fetch_review = $db_handle->numRows("select * from review where status = '1' order by review_id desc");
                    for($i=0; $i<$no_fetch_review; $i++){
                        ?>
                        <div>
                            <div class="reviewer-box">
                                <i class="fa-solid fa-quote-right"></i>
                                <div class="product-rating">
                                </div>

                                <p>"<?php echo $fetch_review[$i]['description'];?>"</p>

                                <div class="reviewer-profile">
                                    <div class="reviewer-image">
                                        <img src="admin/<?php echo $fetch_review[$i]['image'];?>" class="blur-up lazyload"
                                             alt="">
                                    </div>
                                    <div class="reviewer-name">
                                        <?php
                                        $customer = $fetch_review[$i]['customer_id'];
                                        $fetch_customer = $db_handle->runQuery("select customer_name from customer where id='$customer'");
                                        ?>
                                        <h4><?php echo $fetch_customer[0]['customer_name'];?></h4>
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
<!-- Review Section End -->


<!-- Footer Section Start -->
<?php
include ('include/footer.php');
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
