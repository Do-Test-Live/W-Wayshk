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
    <title>條款細則</title>

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
<!--<section class="breadscrumb-section pt-0">
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
</section>-->
<!-- Breadcrumb Section End -->

<!-- log in section start -->
<section class="log-in-section background-image-2 section-b-space">
    <div class="container-fluid-lg w-100">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-5 inner-header">條款細則
                </h1>
                <ul>
                    <li>閣下遞交及/或確認訂單即表示閣下明白並接受活籽兒童用品店（下稱本店）的購物條款及細則，遞交及確認方式不限於網上購物平台，亦包括透過電話、電郵或親臨自取點等遞交及確認的訂單。</li>

                </ul>
                <h4 class="mt-3" style="font-weight: bold">1. 所有貨品售完即止。如有任何貨品售罄，本店將不會作出事前通知。本店亦保留拒絕接受及或限制訂單數量的權利，且毋須給予任何解釋。如有上述情況，本店將以透過電話或電郵通知閣下。</h4>
                <h4 class="mt-3" style="font-weight: bold">2. 除貨品長期缺貨外，所有已付款的訂單都不能取消或退款。
                </h4>
                <h4 class="mt-3" style="font-weight: bold">3. 退換保證條款：
                </h4>
                <ul>
                    <li>到貨後發現與訂購商品不同 (只接受未開封之全新商品) / 打開包裝後，商品有明顯瑕疵或損壞接受退換。請於收貨後5日之內告知我們，逾期一概不受理。
                    </li>
                    <li>貨品或會因運送途中，外盒出現一些輕微損壞(如爛角或撞凹)，而不影響正常使用，本店 -概恕不受理或補發產品。
                    </li>

                    <li>涉及個人衞生的產品或配件（如: 牙膠，治療刷）；任何顯示折扣產品、清貨產品、特賣
                        產品及免費贈品都不設退換服務。
                    </li>
                    <li>只適用於非人為損毀產品，因不滿意貨品表現等原因恕不接受。
                    </li>
                    <li>任何被退換貨品只限更換同等價值或價值更高之貨品，客戶須支付價值較高之貨
                        品差額。如更換價值較低之貨品，所有餘額將不獲退回。
                    </li>

                    <li>退貨費用：以送貨地址為準，由本店負擔退貨運費，但可能會按實際情況收取行政費用 。
                    </li>
                    <li>
                        本店保留更換產品之最終決定權 。
                    </li>

                </ul>
                <h4 class="mt-3" style="font-weight: bold">4. 部份訂單會因收貨地址不詳、多次派送均無人收件或收件人拒收包裹而被退回等。當速遞公司將包裹退回給我們時，我們會在退款中扣除原本的運費及退件的手運費，以作退回訂單處理費。
                </h4>
                <h4 class="mt-3" style="font-weight: bold">5. 優惠券代碼、優惠、贈品只適用於指定客戶或推廣，如有錯誤的使用情況下，不論是人為出錯或系統故障造成，本店將自動更正並會以電話或電郵通知閣下再確認。如果客戶在提交訂單之前未輸入優惠券代碼，則將被視為放棄使用優惠券的優惠。</h4>
                <h4 class="mt-3" style="font-weight: bold" >6. 購買前請先諮詢店員有關產品用法，本店不會就錯誤或不當使用產品而引至任何問題承擔任何責任。</h4>
                <h4 class="mt-3" style="font-weight: bold" >7. 本店保留不時修改和修訂售價、送貨收費及網上購物條款及細則的權利，並毋須作出事前通知；如有任何爭議，本店保留最終決定權。</h4>
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

