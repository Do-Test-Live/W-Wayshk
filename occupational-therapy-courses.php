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

    <title>課本下載 | Wayshk</title>

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


<!-- Blog Section Start -->
<section class="blog-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row g-4">
            <div class="col-12 text-center">
                <h2 class="inner-header">
                    <?php
                    if ($_SESSION['language'] === 'CN')
                        echo '教材下載';
                    else
                        echo 'Textbook Download';
                    ?>
                </h2>
            </div>
            <div class="col-xxl-12 mt-5">
                <div class="row g-4 ratio_65">
                    <?php
                    $textbook = $db_handle->runQuery("SELECT * FROM `textbook` ORDER BY id desc");
                    $no_textbook = $db_handle->numRows("SELECT * FROM `textbook` ORDER BY id desc");
                    for ($i = 0; $i < $no_textbook; $i++) {
                        ?>
                        <div class="col-xxl-4 col-sm-6 ms-auto mt-3">
                            <div class="blog-box wow fadeInUp">
                                <div class="blog-image">
                                    <a href="Textbook-Details?id=<?php echo $textbook[0]['id'];?>">
                                        <img src="admin/<?php echo $textbook[$i]['image']; ?>"
                                             class="bg-img blur-up lazyload" alt="">
                                    </a>
                                </div>

                                <div class="blog-contain">
                                    <a href="Textbook-Details?id=<?php echo $textbook[0]['id'];?>">
                                        <h3>
                                            <?php
                                            if ($_SESSION['language'] == 'CN')
                                                echo $textbook[$i]['textbook_title'];
                                            else
                                                echo $textbook[$i]['textbook_title_en'];
                                            ?>
                                        </h3>
                                    </a>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-6">
                                            <p><?php if ($_SESSION['language'] === 'CN')
                                                    echo '分類名稱：' . $textbook[$i]['textbook_cat'];
                                                else echo 'Category Name: ' . $textbook[$i]['textbook_cat_en']; ?></p>
                                            <p><?php if($_SESSION['language'] === 'CN') echo '積分'; else echo 'Points: ';?> <?php echo $textbook[$i]['textbook_point']; ?></p>
                                        </div>
                                    </div>
                                    <a href="Textbook-Details?id=<?php echo $textbook[0]['id'];?>" class="blog-button"><?php if ($_SESSION['language'] === 'CN') echo '查看詳情'; else echo 'View Details';?><i class="fa-solid fa-right-long"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

            </div>
        </div>
</section>


<!-- Footer Section Start -->
<?php
include('include/footer.php');
?>
<!-- Footer Section End -->


<!-- Deal Box Modal Start -->
<?php include('include/deal.php'); ?>
<!-- Deal Box Modal End -->


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

<!-- WOW js -->
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/custom-wow.js"></script>

<!-- script js -->
<script src="assets/js/script.js"></script>

<!-- thme setting js -->
<script src="assets/js/theme-setting.js"></script>
</body>
</html>