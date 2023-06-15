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
    <title>User Profile</title>

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
                    <h2 class="mb-2">Wayshk網店會員計劃</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active"><a href="Membership-Program">CN</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- log in section start -->
<section class="log-in-section background-image-2 section-b-space">
    <div class="container-fluid-lg w-100">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-3 mb-3 inner-header">常見問題  </h1>
            </div>
            <div class="col-12">
                <div class="faq-accordion">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                        style="font-weight: bold;">
                                    1. 如何加入Wayshk會員計劃？
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                 aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>於官網主頁進入「Wayshk網店會員積分計劃」頁面，再按 「註冊會員」 以電子郵件建立會員帳戶，註冊成功即可獲取200積分。（只限年滿十八歲或以上人士參與）</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"
                                        style="font-weight: bold;">
                                    2. 如何賺取積分？
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>每次購物先登入會員帳戶，每次成功付款提交訂單，積分會自動存入及紀錄在閣下消費帳戶內。</p>
                                    <p>Wayshk網店會員可透過以下方式獲取積分：</p>
                                    <p>
                                        （i）註冊會員- 註冊成為網店會員，可賺取200分。
                                    </p>
                                    <p>（ii）網店消費密密賺- 於網店自行下單購物/參與任何課程，每消費$1，即可賺取1分。
                                        積分會以向下取整的方式計算至個位數，例如優惠後購物淨額為港幣99.5元，顧客 &nbsp;&nbsp;便可穫得99分會員積分。
                                    </p>
                                    <p>
                                        （iii）試玩評價回贈– 購買產品/參與課程後，撰寫含照片的試玩評價，每一個產品評價可額外獲取200分。
                                    </p>
                                    <p>* 消費金額不包括運費及其他服務費用</p>
                                    <p>* 會員積分只在會員登入後付款才可獲贈，如果顧客選用訪客形式結帳，將不能獲得積 &nbsp;&nbsp;分，積分恕不補發</p>
                                    <p>*網店指定產品包括禮包/特價產品不能賺取積分，請留意推廣內容及通知</p>
                                    <p>*會員計劃只適用於Wayshk網店，於線下以其他方式下單未能參與積分計劃</p>
                                    <p>*積分發放後，可自行在「會員積分」記錄頁面查看，恕不會代查積分</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="true"
                                        aria-controls="collapseThree"
                                        style="font-weight: bold;">
                                    3. 如何兌換積分獎賞？
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>進入Wayshk網店，登錄會員帳戶：</p>
                                    <p>（i）會員帳戶內累積積分可以兌換並下載指定訓練教材</p>
                                    <p>（ii）現金回贈- 每40 分可當作1元使用（最低回贈金額為1元，不足40分未能計算）； 於下次購物時，可使用累積積分付款，沒有最低消費限制</p>
                                    <p>* 積分不能兌換現金或轉讓予他人</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour"
                                        style="font-weight: bold;">
                                    4. 積分的有效期是？
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>積分由獲得日開始計算，有效期180天，逾期作廢。</p>
                                    <p>例子: 2023年5月1日建立帳戶成為會員獲得200積分，積分到期日則是2023年10月27日</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive"
                                        style="font-weight: bold;">
                                    5. 如何更改個人資料？
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>先登入會員帳號，按畫面上「個人資料 」按鈕，您可以隨時更改會員賬戶內容。</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix"
                                        style="font-weight: bold;">
                                    6. 忘記登入密碼怎麼辦？
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>如果您忘記了自己的登入密碼，可按畫面上邊的「登入」，然後按「忘記密碼」。您可以輸入已登記的電郵地址，然後按下邊的「送出」按鈕。Wayshk 會把重設密碼連結發送到您的私人密碼發送到您登記的電郵信箱。</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSeven" aria-expanded="true"
                                        aria-controls="collapseSeven"
                                        style="font-weight: bold;">
                                    7. 想要取消會籍怎麼辦？
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>如會員要求取消Wayshk會籍，請電郵至ways00.hk@gmail.com向Wayshk作出申請。於確認有關資料後，Wayshk將於30個工作天內作出安排，所有未兌換的積分及其他優惠會全部被取消。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <h1 class="mt-3 mb-3 inner-header">條款及細則</h1>
                <h2 class="mb-3" style="font-weight: bold;">Wayshk網店會員計劃</h2>
                <p>1. 每位申請人只限申請Wayshk網店會籍乙個。</p>
                <p>2. 申請Wayshk網店會籍費用全免。</p>
                <p>3. Wayshk會員計劃只適用於網頁。</p>
                <p>4.Wayshk網店會員會籍及積分只限會員本人使用，不得轉讓他人。</p>
                <p>5. 所有會員資料、積分及獎賞換領紀錄，均以Wayshk所存之紀錄為準。</p>
                <p>6.倘若發現會員濫用會員計劃、作出不實陳述、提供虛假或無效之文件、違反Wayshk網店會員會籍之任何條款及細則，Wayshk可行使權利暫停或終止有關會員之會籍，其已獲發或累積之積分亦會撤銷或作廢。</p>
                <p>7 Wayshk保留在不提供任何理由的情況下，拒絕任何申請人的申請、審查會員之會籍及終止任何會員所屬會籍之最終決定權。 </p>
                <p>8. Wayshk不會就錯誤積分而負擔任何責任，錯誤積分可因為技術故障或超出本公司控制範圍內的各種因素而導致。</p>
                <p>9. 本網店會員計劃使用細則，將不時作出修改，恕不作通知</p>
                <p>10. 如有任何爭議，Wayshk就所有條款及細則保留任何解釋、行使及決定權利；</p>
                <p>11. 會員計劃如出現任何系統性問題，請盡快與我們聯絡，我們會盡快修正並持續改善相關服務，不便之處，敬請原諒。</p>
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

