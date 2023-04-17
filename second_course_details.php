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
    <title>活籽兒童服務社 | Wayshk | 全港職業治療服務</title>

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


<!-- Cart Section Start -->
<section class="contact-box-section mb-5 mt-5">
    <div class="container-fluid-lg">
        <div class="row g-lg-5 g-3">
            <h1>治療膠練習3節</h1>
            <p class="mt-3">有可愛的小動物/ 昆蟲為主題，以有趣的方式學習基本的治療膠使用方法，訓練小肌肉能力 【幼稚園組】</p>
            <table style="border: 1px solid #000000; margin: 25px; max-width:400px;padding: 15px;">
                <thead>
                <tr>
                    <td style="border: 1px solid #000000">已結束</td>
                    <td style="border: 1px solid #000000">$300 ； 低收入家庭 $150</td>
                    <td style="border: 1px solid #000000">網路會面</td>
                </tr>
                </thead>
            </table>
            <p class="mt-3" style="font-weight: bold;">服務說明</p>
            <p class="mt-3">請自備上課所需工具：</p>
            <p>教材本，治療膠</p>
            <p class="mt-3">小組人數:</p>
            <p>2-6人 （必須有家長陪同上課 ）</p>
            <p class="mt-3">低收入家庭報名：</p>
            <p>請於報名時，出示低收入家庭證明/說明需要費用減免的原因。</p>
            <p class="mt-3" style="font-weight: bold;">取消政策</p>
            <p>確認預訂課程後，將不獲退款。在課程開始前三天通知，可免費安排改為下期補課。 因每期課程進度按學生能力而定會有所不同，於課程開始後，剩餘課堂的未能安排補課，已付款項50%可換同等或價值較低的產品。</p>
        </div>
    </div>
</section>
<!-- Cart Section End -->


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
                            $image = explode(',', $product[$i]['p_image'])
                            ?>
                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop.php" class="deal-image">
                                        <img src="admin/<?php echo $image[0]; ?>" class="blur-up lazyload"
                                             alt="">
                                    </a>

                                    <a href="shop.php" class="deal-contain">
                                        <h5><?php echo $product[$i]['p_name'] ?></h5>
                                        <h6><?php echo $product[$i]['product_price'] ?></h6>
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
<script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>
<script src="assets/js/bootstrap/popper.min.js"></script>

<!-- feather icon js-->
<script src="assets/js/feather/feather.min.js"></script>
<script src="assets/js/feather/feather-icon.js"></script>

<!-- Lazyload Js -->
<script src="assets/js/lazysizes.min.js"></script>

<!-- Slick js-->
<script src="assets/js/slick/slick.js"></script>
<script src="assets/js/slick/custom_slick.js"></script>

<!-- script js -->
<script src="assets/js/script.js"></script>

<!-- thme setting js -->
<script src="assets/js/theme-setting.js"></script>
</body>
</html>
