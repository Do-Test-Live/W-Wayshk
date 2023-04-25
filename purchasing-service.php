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
    <title>產品代購服務 | Wayshk</title>

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


<!-- Fresh Vegetable Section Start -->
<section class="fresh-vegetable-section section-lg-space">
    <div class="container-fluid-lg">
        <div class="row gx-xl-5 gy-xl-0 g-3 ratio_148_1">
            <div class="col-12 text-center">
                <h2 class="inner-header">機構/學校訂購</h2>
            </div>
            <div class="row mt-5" style="padding-left: 21px !important;">
                <div class="col-md-6">
                    <div class="row align-middle pt-2">
                        <div class="col-4">
                            <p style="padding-left: 5px">產品目錄</p>
                        </div>
                        <div class="col-8">
                            <a href="assets/document/b05373_09898414966d4b53bb8a6a843ef4168c.pdf" target="_blank" class="btn text-white home-button mend-auto theme-bg-color" style="max-width: 350px">
                                下載 <i class="fa-solid fa-right-long icon ms-2"></i></a>
                        </div>
                    </div>
                    <div class="row mt-3 align-middle">
                        <div class="col-4">
                            <p style="padding-left: 5px">產品訂購表格</p>
                        </div>
                        <div class="col-8">
                            <a href="assets/document/b05373_bfe59f57fdbb4780bd62fcdf57eed338.pdf" target="_blank" class="btn text-white home-button mend-auto theme-bg-color" style="max-width: 350px">
                                下載 <i class="fa-solid fa-right-long icon ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-sm-0 px-md-5">
                    <p style="font-weight: bold;">請填妥產品訂購表格後</p>
                    <p>1.  電郵到wayshk.order@gmail.com</p>
                    <p>2.  以 Whatsapp 傳送給 +852 5605 8389</p>
                    <p>我們將盡快為貴機構/貴校報價</p>
                </div>
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="mb-3">代購項目：</h2>
                    <p>我們亦提供代購服務，協助客人訂購不同國家不同平台的評估工具及治療用品，歡迎私訊洽詢詳情。</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="mb-3">出貨方式：</h2>
                <p>1. 大圍倉庫自取 （需要預約）</p>
                <p>2. 地址：大圍成運路21-23號群力工業大廈3樓1室</p>
                <p>3. 灣仔合作點自取 （需要預約）</p>
                <p>4. 地址：灣仔軒尼詩道237-239號25樓兒璞兒童學習及發展中心</p>
                <p>5. 速遞送貨（運費到付/取得運費報價）</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="mb-3">送貨時間：</h2>
                <p>由一至八星期不等，歡迎先聯絡本公司查詢現貨庫存。</p>
                <p>如需大量訂購產品，建議及早確認訂單。貨品到港後我們會盡快安排送貨。</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="mb-3">付款方式：</h2>
                <p>1. 自取點取貨時以現金付款</p>
                <p>2. PayMe/轉數快</p>
                <p>3. 郵寄支票 （支票抬頭：WAYSHK）</p>
                <p style="padding-left: 10px;">寄往：大圍成運路21-23號群力工業大廈3樓1室【Attn：WAYSHK】</p>
                <p>4. 銀行過數 (恆生銀行：769-334699-883 戶口名稱：WASYHK) </p>
                <p>5. 可於貨到後30日內支付費用</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="mb-3">機構/學校訂購優惠：</h2>
                <p>1. 訂購滿$2000享有香港島、九龍及新界免費送貨服務，不包括離島及偏遠地區</p>
                <p>2. 歡迎向我們查詢其他推廣優惠</p>
            </div>
        </div>
    </div>
</section>
<!-- Fresh Vegetable Section End -->

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
include ('include/footer.php');
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
