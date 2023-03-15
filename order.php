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
    <title>訂購方法 | Wayshk</title>

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

        .about-us-title .second::before {
            content: "";
            position: absolute;
            width: calc(106px + (175 - 106) * ((100vw - 320px) / (1920 - 320)));
            height: 3px;
            bottom: calc(-7px + (6 - 7) * ((100vw - 320px) / (1920 - 320)));
            left: 0;
            background: rgba(0, 0, 0, 0);
        }

        .about-us-title .second{
            margin-bottom: 17px;
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

<!-- Client Section Start -->
<section class="client-section section-lg-space">
    <div class="container-fluid-lg">
        <!-- come oder page-->
        <div class="row">
            <div class="col-12">
                <div class="about-us-title text-center">
                    <h2 class="center" style="color: #ffa53b">訂購方法及條款細則</h2>
                </div>
                <div class="about-us-title text-center">
                    <h2 class="center second">投下訂單</h2>
                </div>
                <div class="slider-3_1 product-wrapper">
                    <div>
                        <div class="clint-contain" style="background: #f8eab3">
                            <div class="client-icon">
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/3/work.svg"
                                     class="blur-up lazyload" alt="">
                            </div>
                            <h4>網上下單 （自行於網站下單可享網站優惠價）</h4>
                            <p>
                                第一步： 於網站直接把需要的貨品放進購物車<br/>
                                第二步： A. 網上付款，默認以順豐到付出貨 （每筆訂單需收取 $25 網上交易手續費）
                                B. 下單後將訂單編號 Whatsapp 發給+ 852 52657359 離線付款
                            </p>
                        </div>
                    </div>
                    <div>
                        <div class="clint-contain" style="background: #f8eab3">
                            <div class="client-icon">
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/3/buy.svg"
                                     class="blur-up lazyload" alt="">
                            </div>
                            <h4>填妥產品訂購表格</h4>
                            <p>
                                點擊按鈕下載產品訂購表格，電郵到 wayshk.order@gmail.com 或以 Whatsapp 發給 +852 52657359
                            </p>
                        </div>
                    </div>
                </div>
                <div class="about-us-title text-center mt-5">
                    <h2 class="center second">付款</h2>
                </div>
                <div class="slider-3_1 product-wrapper mt-1">
                    <div>
                        <div class="clint-contain" style="background: #e1e193">
                            <div class="client-icon">
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/3/work.svg"
                                     class="blur-up lazyload" alt="">
                            </div>
                            <h4>歡迎以以下方式付款</h4>
                            <p>
                                線上付款：信用卡<br/>
                                離線付款： 轉數快 FPS/PayMe/恆生銀行入數/郵寄支票/現金<br/>
                                *** 於網上下單均有電子單據 ； 以其他方法下單如需報價單/收帳單/收據，先於下單時列明提出
                            </p>
                        </div>
                    </div>
                </div>
                <div class="about-us-title text-center mt-5">
                    <h2 class="center second">出貨</h2>
                </div>
                <div class="slider-3_1 product-wrapper mt-1">
                    <div>
                        <div class="clint-contain" style="background: #ddf0ff">
                            <div class="client-icon">
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/3/work.svg"
                                     class="blur-up lazyload" alt="">
                            </div>
                            <h4>出貨方式 （滿$2000免費送貨）</h4>
                            <p>
                                ● 順豐到付/自付郵費郵寄<br/>
                                ● ​自取
                            </p>
                            <p>
                                *** 帶有標籤「即將到貨」或顯示為沒有庫存的貨品， 即為預購產品， 到貨期不定。
                                將會等候訂單內貨品齊全後才出貨。 歡迎向我們查詢詳情。<br/>
                                *** 貨品顏色及款色將隨機發放； 但Wayshk明白孩子對顏色的執著，
                                如有任何特別要求可以在新增說明裏填寫。Wayshk會嘗試盡量配合。
                            </p>
                        </div>
                    </div>
                </div>
                <div class="about-us-title text-center mt-5">
                    <h2 class="center second">​自取點</h2>
                </div>
                <div class="slider-3_1 product-wrapper mt-1">
                    <div>
                        <div class="clint-contain" style="background: #e2caca">
                            <div class="client-icon">
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/3/work.svg"
                                     class="blur-up lazyload" alt="">
                            </div>
                            <h4>大圍倉庫</h4>
                            <p>
                                地址：香港新界大圍成運路21-23號群力工業大廈3樓1室 【大圍火車站A出口，步行約5分鐘】<br/>
                                取貨需預約，先行下單確認領取時間，到達後請致電，並於門口交收，接受現金付款
                            </p>
                        </div>
                    </div>
                    <div>
                        <div class="clint-contain" style="background: #e2caca">
                            <div class="client-icon">
                                <img src="https://themes.pixelstrap.com/fastkart/assets/svg/3/work.svg"
                                     class="blur-up lazyload" alt="">
                            </div>
                            <h4>兒璞兒童學習及發展中心</h4>
                            <p>
                                地址：灣仔軒尼詩道237-239號25樓【灣仔地鐵站A2出口，步行約5分鐘】<br/>
                                開放時間：星期一至五 09:00 - 18:00；星期六 09:00 - 16:00  【午餐時間 12:30-13:45 不開放】<br/>
                                電話：2877 8787<br/>
                                請先查詢庫存，先行下單確認領取時間，接受現金付款
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Client Section End -->

<!-- Fresh Vegetable Section Start -->
<section class="fresh-vegetable-section section-lg-space">
    <div class="container-fluid-lg">
        <div class="row gx-xl-5 gy-xl-0 g-3 ratio_148_1">
            <!--  come from demo website about us page-->
            <div class="col-12">
                <div class="fresh-contain">
                    <div>
                        <div class="review-title text-center">
                            <p style="font-size: 28px;font-weight: bold">條款細則</p>
                        </div>

                        <div class="delivery-list">
                            <p class="text-content">
                                閣下遞交及/或確認訂單即表示閣下明白並接受Wayshk（下稱本店）的購物條款及細則，遞交及確認方式不限於網上購物平台，亦包括透過電話、電郵或親臨寄賣店等遞交及確認的訂單。
                                <br/>
                                1. 所有貨品售完即止。如有任何貨品售罄，本店將不會作出事前通知。本店亦保留拒絕接受及/或限制訂單數量的權利，且毋須給予任何解釋。如有上述情況，本店將以透過電話或電郵通知閣下。
                                <br/>
                                2. 到貨後5天之內退換保證條款：
                                <br/>
                                - 到貨後發現與訂購商品不同 (只接受未開封之全新商品)/商品有明顯瑕疵或損壞可以退換
                                <br/>
                                - 只適用於非人為損毀產品，因不滿意貨品表現等原因恕不接受
                                <br/>
                                - 任何被退換貨品只限更換同等價值或價值更高之貨品，客戶須支付價值較高之貨品差額。如更換價值較低之貨品，所有餘額將不獲退回
                                <br/>
                                - 退貨費用：以送貨地址為準，由本店負擔退貨運費，但可能會按實際情況收取行政費用
                                <br/>
                                - 涉及個人衞生的產品或配件在任何情況下都不設退換服務（如: 牙膠，治療刷）
                                <br/>
                                - 本店保留更換產品之最終決定權
                                <br/>
                                3.  優惠券代碼、優惠、贈品只適用於指定客戶或推廣，如有錯誤的使用情況下，不論是人為出錯或系統故障造成，本店將自動更正並會以電話        或電郵通知閣下再確認。如果客戶在提交訂單之前未輸入優惠券代碼，則將被視為放棄使用優惠券的優惠。
                                <br/>
                                4. 購買前請先諮詢店員有關產品用法，本店不會就錯誤或不當使用產品而引至任何問題承擔任何責任；本店保留不時修改和修訂售價、送貨收      費及網上購物條款及細則的權利，並毋須作出事前通知；如有任何爭議，Wayshk保留最終決定權。
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fresh Vegetable Section End -->


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
                        <li class="list-1">
                            <div class="deal-offer-contain">
                                <a href="#" class="deal-image">
                                    <img src="assets/images/vegetable/product/10.png" class="blur-up lazyload"
                                         alt="">
                                </a>

                                <a href="#" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57
                                        <del>57.62</del>
                                        <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-2">
                            <div class="deal-offer-contain">
                                <a href="#" class="deal-image">
                                    <img src="assets/images/vegetable/product/11.png" class="blur-up lazyload"
                                         alt="">
                                </a>

                                <a href="#" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57
                                        <del>57.62</del>
                                        <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-3">
                            <div class="deal-offer-contain">
                                <a href="#" class="deal-image">
                                    <img src="assets/images/vegetable/product/12.png" class="blur-up lazyload"
                                         alt="">
                                </a>

                                <a href="#" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57
                                        <del>57.62</del>
                                        <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-1">
                            <div class="deal-offer-contain">
                                <a href="#" class="deal-image">
                                    <img src="assets/images/vegetable/product/13.png" class="blur-up lazyload"
                                         alt="">
                                </a>

                                <a href="#" class="deal-contain">
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
