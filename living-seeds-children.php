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
<section class="contact-box-section">
    <div class="container-fluid-lg">
        <div class="row g-lg-5 g-3">
            <div class="col-lg-12 mb-5">
                <div class="left-sidebar-box">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact-title text-center mb-5">
                                <h2 class="inner-header">
                                    活籽兒童 服務社
                                </h2>
                                <h4 class="mt-3">
                                    活籽兒童服務社的資深職業治療師可為有需要學童提供校本職業治療服務。透過多元化的治療活動，協助有學習能力差異的學生投入校園及日常生活中。另外，亦可為學校舉辦不同專題的教師/家長互動工作坊或講座。

                                </h4>
                            </div>

                            <!--<div class="contact-detail mt-5">
                                <div class="row g-4">
                                    <div class="col-md-4">
                                        <h2 class="mb-3">服務範圍包括：</h2>
                                        <ul>
                                            <li>學前/小學/中學到校服務（ 評估及訓練</li>
                                            <li> 老師/家長工作坊</li>
                                            <li>線上親子課程</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <div class="contact-detail-box" style="background: #e2caca">
                                                            <div class="contact-icon"><i
                                                                        class="fa-solid fa-arrow-right"></i>
                                                            </div>
                                                            <div class="contact-detail-title">
                                                                <h4>感覺統合</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="contact-detail-box" style="background: #e2caca">
                                                            <div class="contact-icon"><i
                                                                        class="fa-solid fa-arrow-right"></i>
                                                            </div>
                                                            <div class="contact-detail-title">
                                                                <h4>手部功能</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="contact-detail-box" style="background: #e2caca">
                                                            <div class="contact-icon"><i
                                                                        class="fa-solid fa-arrow-right"></i>
                                                            </div>
                                                            <div class="contact-detail-title">
                                                                <h4>視覺感知</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <div class="contact-detail-box" style="background: #e2caca">
                                                            <div class="contact-icon"><i
                                                                        class="fa-solid fa-arrow-right"></i>
                                                            </div>
                                                            <div class="contact-detail-title">
                                                                <h4>幼兒發展</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="contact-detail-box" style="background: #e2caca">
                                                            <div class="contact-icon"><i
                                                                        class="fa-solid fa-arrow-right"></i>
                                                            </div>
                                                            <div class="contact-detail-title">
                                                                <h4>寫前/書寫技巧</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <div class="contact-detail-box" style="background: #e2caca">
                                                            <div class="contact-icon"><i
                                                                        class="fa-solid fa-arrow-right"></i>
                                                            </div>
                                                            <div class="contact-detail-title">
                                                                <h4>專注/執行功能</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <div class="row mb-5 mt-5">
                                <h2 class="mb-3 text-center inner-header">訓練內容例子 : </h2>
                            </div>
                            <div class="row mb-5 mt-5">
                                <h2 class="mb-3">1. 感覺統合訓練</h2>
                                <p>
                                    透過各項動態活動，改善整體感覺調節能力。減低感覺過敏/過弱情況；調節醒覺度，協助活動量異常高或低的同學保持良好的醒覺狀態，提升專注力；改善姿勢控制、平衡、動作計劃及大肌肉協調等等。協助同學應付日常生活和學習需要。
                                </p>
                            </div>
                            <div class="row mb-5">
                                <h2 class="mb-3">2. 感覺處理及眼球控制訓練</h2>
                                <p>以「太空人訓練-聲音激活前庭-視覺規程」（Astronaut Training- A Sound Activated Vestibular-Visual Protocol）為藍本設計的活動，從根本改善感覺調節能力。 配合其他特別設計的教材，提升學生眼球控制/手眼協調/視覺專注能力。目標學生：有明顯讀寫困難、閱讀/抄寫時跳行跳字、容易漏做題目、經常有抄寫錯誤、視覺專注力弱等等。
                                </p>
                            </div>
                            <div class="row mb-5">
                                <h2 class="mb-3">3. 小肌及書寫能力訓練</h2>
                                <p>透過各項評估識別學生的書寫困難，提出跟進或考試調適建議。以多元感官活動作熱身，改善坐姿/專注力/上肢穩定性等等書寫的前提要素 。提升手指力量/手指靈活性，改善執筆姿勢及空間關係，從而提升書寫的速度/耐力、字體的美觀性。</p>
                            </div>
                            <div class="row mb-5">
                                <h2 class="mb-3">4. 專注及執行功能訓練</h2>
                                <p>以團體形式進行各種動態及靜態專注力訓練活動。在互動遊戲中學習團隊合作，同時加強同學任務執行能力、提升工作記憶、情緒控制、靈活變通、時間管理、組織能力等等。另外，也會與學生商討並設計於平日進行的個人化計劃，改善在不同場合的行為表現。</p>
                                <p class="text-center">歡迎向我們查詢詳情/將標書寄予本服務社，以索取報價書。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Cart Section End -->

<!-- Breadcrumb Section Start -->
<!--<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2>Contact Us</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!-- Breadcrumb Section End -->

<!-- Contact Box Section Start -->
<!--<section class="contact-box-section">
    <div class="container-fluid-lg">
        <div class="row g-lg-5 g-3">
            <div class="col-lg-6">
                <div class="left-sidebar-box">
                    <div class="row">

                        <div class="col-xl-12">
                            <div class="contact-title">
                                <h3>Get In Touch</h3>
                            </div>

                            <div class="contact-detail">
                                <div class="row g-4">
                                    <div class="col-xxl-6 col-lg-12 col-sm-6">
                                        <div class="contact-detail-box">
                                            <div class="contact-icon">
                                                <i class="fa-solid fa-phone"></i>
                                            </div>
                                            <div class="contact-detail-title">
                                                <h4>Phone</h4>
                                            </div>

                                            <div class="contact-detail-contain">
                                                <p>+852 52657359</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-6 col-lg-12 col-sm-6">
                                        <div class="contact-detail-box">
                                            <div class="contact-icon">
                                                <i class="fa-solid fa-envelope"></i>
                                            </div>
                                            <div class="contact-detail-title">
                                                <h4>Email</h4>
                                            </div>

                                            <div class="contact-detail-contain">
                                                <p>ways00.hk@gmail.com</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xxl-6 col-lg-12 col-sm-6">
                                        <div class="contact-detail-box">
                                            <div class="contact-icon">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </div>
                                            <div class="contact-detail-title">
                                                <h4>Address</h4>
                                            </div>

                                            <div class="contact-detail-contain">
                                                <p>香港大圍成運路21-23號群力工業大廈3樓1室</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="title d-xxl-none d-block">
                    <h2>Contact Us</h2>
                </div>
                <div class="right-sidebar-box">
                    <div class="row">
                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                            <div class="mb-md-4 mb-3 custom-form">
                                <label for="exampleFormControlInput" class="form-label">First Name</label>
                                <div class="custom-input">
                                    <input type="text" class="form-control" id="exampleFormControlInput"
                                           placeholder="Enter First Name">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                            <div class="mb-md-4 mb-3 custom-form">
                                <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                                <div class="custom-input">
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                           placeholder="Enter Last Name">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                            <div class="mb-md-4 mb-3 custom-form">
                                <label for="exampleFormControlInput2" class="form-label">Email Address</label>
                                <div class="custom-input">
                                    <input type="email" class="form-control" id="exampleFormControlInput2"
                                           placeholder="Enter Email Address">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                            <div class="mb-md-4 mb-3 custom-form">
                                <label for="exampleFormControlInput3" class="form-label">Phone Number</label>
                                <div class="custom-input">
                                    <input type="tel" class="form-control" id="exampleFormControlInput3"
                                           placeholder="Enter Your Phone Number" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value =
                                        this.value.slice(0, this.maxLength);">
                                    <i class="fa-solid fa-mobile-screen-button"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-md-4 mb-3 custom-form">
                                <label for="exampleFormControlTextarea" class="form-label">Message</label>
                                <div class="custom-textarea">
                                    <textarea class="form-control" id="exampleFormControlTextarea"
                                              placeholder="Enter Your Message" rows="6"></textarea>
                                    <i class="fa-solid fa-message"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-animation btn-md fw-bold ms-auto">Send Message</button>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!-- Contact Box Section End -->

<!-- Map Section Start -->
<!--<section class="map-section">
    <div class="container-fluid p-0">
        <div class="map-box">
            <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1125.317043789715!2d114.18058410077128!3d22.376025312012693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x340407a864400001%3A0x15f7365383c741b2!2z5qiT5LiKIC0g5aSn5ZyN5bqX!5e1!3m2!1sen!2sbd!4v1676801498144!5m2!1sen!2sbd"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
       </div>
    </div>
</section>-->
<!-- Map Section End -->


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
