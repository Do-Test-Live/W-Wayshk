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
    <title>Order Method | Wayshk</title>

    <?php include('include/css.php'); ?>
    <style>
        p{
            font-size: 18px !important;
        }
        #image-section-one{
            display: none;
        }

        @media only screen and (max-width: 490px) {
            #three-section{
                display: none;
            }
            #image-section-one{
                display: block;
            }
            #image-section-two{
                display: none;
            }
            .header-title{
                font-size: 25px !important;
                line-height: 30px !important;
            }
            .become-service .service-box{
                height: 725px;
            }
            .mb-sm-3{
                margin-bottom: 20px;
            }
            .seller-title h2{
                font-size: 30px !important;
            }
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

<!-- Service Section Start -->
<section class="become-service section-b-space" >
    <div class="container-fluid-lg">
        <div class="seller-title text-center">
            <h2>訂購方法</h2>
        </div>

        <div class="row" id="three-section">
            <div class="col-xl-4">
                <div class="service-box" style="height: 230px !important;">
                    <div class="service-svg">
                        <img src="assets/images/order/order.png" />
                    </div>

                    <div class="service-detail">
                        <h4>網上下單</h4>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="service-box" style="height: 230px !important;">
                    <div class="service-svg">
                        <img src="assets/images/order/payment.png" />
                    </div>

                    <div class="service-detail">
                        <h4>選擇付款方式</h4>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="service-box" style="height: 230px !important;">
                    <div class="service-svg">
                        <img src="assets/images/order/shipping.png" />
                    </div>

                    <div class="service-detail">
                        <h4>出貨</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Service Section End -->

<!-- About Section Start -->
<section class="saller-poster-section">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xl-4">
                <div class="poster-box">
                    <div class="poster-image">
                        <img src="assets/images/order/online-order.png"
                             class="img-fluid" alt="">
                    </div>
                </div>
            </div>

            <div class="col-xl-7 order-lg-2">
                <div class="seller-title h-100 d-flex justify-content-center">
                    <div>
                        <h2 class="header-title">網上下單</h2>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">1. 把需要的貨品放進購物車</h2>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">2. 以訪客形式或登入會員結帳</h2>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">3. 選擇出貨方式</h2>
                        <p style="padding-left: 20px;">A. 順豐速遞到付 （滿$2000免費送貨）</p>
                        <p style="padding-left: 20px;">B. 大圍倉庫自取 （敬請預約）</p>
                        <p style="padding-left: 20px;">C. 灣仔合作點自取 （敬請預約）</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- About Section Start -->
<section class="saller-poster-section">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xl-4 my-auto" id="image-section-one">
                <div class="poster-box">
                    <div class="poster-image">
                        <img src="assets/images/order/payment-mathod.png"
                             class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="seller-title h-100 d-flex align-items-center">
                    <div>
                        <h2 class="header-title">選擇付款方式</h2>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">A. 自取時以現金付款</h2>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">B. PayMe （電話： +852 5265 7359）</h2>
                        <p style="padding-left: 20px;">* 把付款證明以Whatsapp傳至+852 5605 8389</p>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">C.
                            轉數款 FPS （電話： +852 5265 7359）</h2>
                        <p style="padding-left: 20px;">* 把付款證明以Whatsapp傳至+852 5605 8389</p>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">D.
                            銀行入數</h2>
                        <p style="padding-left: 20px;">戶口號碼為 769-334699-883 (恆生銀行)</p>
                        <p style="padding-left: 20px;">戶口名稱: Wayshk</p>
                        <p style="padding-left: 20px;">* 付款後把入數證明以Whatsapp傳至+852 5605 8389</p>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">E. 信用卡支付 【需支付額外5% 手續費】</h2>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">F. 支票付款 （只限機構/學校訂單）</h2>
                        <p style="padding-left: 20px;">支票抬頭請書明受款人為「 Wayshk」, 信封請註明 Attn: Wayshk , 並郵寄往大圍成運路21-23號群力工業大廈3樓1室</p>
                        <h2 style="font-weight: 700;font-size: 18px; margin-bottom: 0 !important; color: black;">於網上下單均有電子單據 ；如需公司蓋印報價單/收帳單/收據，先於下單時列明提出/以電郵查詢</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 my-auto" id="image-section-two">
                <div class="poster-box">
                    <div class="poster-image">
                        <img src="assets/images/order/payment-mathod.png"
                             class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- About Section Start -->
<section class="saller-poster-section">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xl-4">
                <div class="poster-box">
                    <div class="poster-image">
                        <img src="assets/images/order/shipping-1.png"
                             class="img-fluid" alt="">
                    </div>
                </div>
            </div>

            <div class="col-xl-7 order-lg-2">
                <div class="seller-title h-100 d-flex justify-content-end">
                    <div>
                        <h2 class="header-title">出貨</h2>
                        <p style="font-weight: 700;">1. 現貨產品出貨期 0-7日；預購產品，到貨期不定。歡迎向我們查詢詳情。</p></br>
                        <p style="font-weight: 700;">2. 貨品顏色及款色將隨機發放；但若顧客對於貨品顏色/款色有任何要求， 請在新增說明裏填寫。有存貨的話，Wayshk會嘗試盡量配合。一但送貨後 對顏色款式不滿意，恕不退換。</p></br>
                        <p style="font-weight: 700;">3. 如果不慎填錯地址，若您的訂單尚未出貨，請您盡快聯絡我們作出更改。如已為您安排出貨，將無法更改地址。</p></br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Service Section Start -->
<section class="become-service section-b-space">
    <div class="container-fluid-lg">
        <div class="seller-title mb-5 text-center">
            <h2 class="header-title">自取點資料</h2>
        </div>

        <div class="row">
            <div class="col-xl-6 mb-sm-3">
                <div class="service-box">
                    <div class="service-svg">
                        <img src="assets/images/order/warehouse-1.png">
                    </div>

                    <div class="service-detail">
                        <h4>大圍倉庫</h4>
                        <p>地址：大圍成運路21-23號群力工業大廈3樓1室</p>
                        <p>大圍火車站A出口右轉，步行約5分鐘</p>
                        <p>開放時間：不定 （10:30 – 18:15）</p>
                        <p>不設現場入內選貨。先行預約取貨，與我們確認領取時間，到達後請致電並於門口交收。</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="service-box">
                    <div class="service-svg">
                        <img src="assets/images/order/warehouse-2.png">
                    </div>

                    <div class="service-detail">
                        <h4>合作點 --- 兒璞兒童學習及發展中心</h4>
                        <p>地址：灣仔軒尼詩道237-239號25樓</p>
                        <p>灣仔地鐵站A2出口，步行約5分鐘</p>
                        <p>會展站A3出口，步行約6分鐘</p>
                        <p>開放時間： 星期一至五 09:00 - 18:00；星期六 09:00 - 16:00</p>
                        <p>【午餐時間 12:30-13:45 不開放】電話：2877 8787</p>
                        <p>請先查詢庫存，先行預約取貨並確認領取時間</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Service Section End -->


<!-- Business Section Start -->
<section class="business-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xl-7">
                <div class="seller-title h-100 d-flex align-items-center">
                    <div>
                        <h2 class="header-title">海外訂單</h2>
                        <p><i class="fa-regular fa-hand-point-right" style="color: #d99f46;"></i> 海外訂單以順豐快遞 SF EXPRESS配送，運費貨到付款</p>
                        <p><i class="fa-regular fa-hand-point-right" style="color: #d99f46;"></i> 目前開放配送地區為： <span style="font-weight: 700;">澳門、台灣、新加坡、馬來西亞、中國</span></p>
                        <p><i class="fa-regular fa-hand-point-right" style="color: #d99f46;"></i> 海外訂單限以信用卡結帳，交易手續費、匯率與退款手續費依發卡銀行規定，如有任何疑問，請聯繫您的信用卡發卡銀行</p>
                        <p><i class="fa-regular fa-hand-point-right" style="color: #d99f46;"></i> 海外訂單不適用包郵活動</p>
                        <p><i class="fa-regular fa-hand-point-right" style="color: #d99f46;"></i> 各國進口關稅標準不同，若領取包裹時需收取關稅，關稅須由買家自行支付</p>
                        <p><i class="fa-regular fa-hand-point-right" style="color: #d99f46;"></i> 部分商品可能會有無法配送或清關等問題，建議先確認商品是否可送達指定國家後再購買。如商品被扣關，將不獲退款。</p>
                        <p><i class="fa-regular fa-hand-point-right" style="color: #d99f46;"></i> 海外訂單不受理退換貨服務</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 my-auto order-lg-2">
                <div class="poster-box">
                    <div class="poster-image">
                        <img src="assets/images/order/Overseas-Orders.png"
                             class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Business Section End -->


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
