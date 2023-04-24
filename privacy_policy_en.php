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
<!--<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2 class="mb-2">Personal Data Collection and Privacy Policy Statement</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active"><a href="privacy_policy.php">CN</a></li>
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
                <h1 class="mb-5 inner-header">Personal Data Collection and Privacy Policy Statement
                </h1>
                <h4>The statement was written in Chinese and translated to English. In case of any dispute, the Chinese version shall prevail.
                </h4>
                <ul>
                    <li>Wayshk children’goods store takes personal privacy seriously and ensures that the procedures for the collection, use, storage, transfer and access of personal data by its services in all circumstances comply with the requirements of the Personal Data (Privacy) Ordinance of Hong Kong. We will ensure that our staff comply strictly with this Personal Information Collection Statement and our Privacy Statement. Please read below to understand our personal data collection policy.</li>
                </ul>
                <h4 class="mt-3" style="font-weight: bold">I. Scope of the Privacy Policy</h4>
                <ul>
                    <li>The Privacy Policy covers how this website handles personally identifiable information collected during your use of the website services. The Privacy Policy does not apply to linked sites outside of this website, nor to persons not entrusted or involved in the management of this website.</li>
                </ul>
                <h4 class="mt-3" style="font-weight: bold">II. Collection, Processing and Use of Personal Information</h4>
                <ul>
                    <li>When you visit this website or use the functional services provided by this website, we will ask you to provide the necessary personal information depending on the functional nature of the service, and we will process and use your personal information within the scope of that specific purpose.
                    </li>
                    <li>This website will retain the name, email address, contact details and time of use provided by you when you use the shopping cart, service mailbox and other functions.
                    </li>

                    <li>
                        This website will use the personal information you provided to offer you the products, activities, courses or services you require, including the purposes associated with participating in all activities, courses or services, issuing receipts, collecting feedback and analysing data. Your personal data will also be used to provide you with promotional information about the activities, courses and services offered by the Wayshk Childrens’ Goods Shop and related units. It is your responsibility to provide the information listed as "required" on the application form or required to initiate the relevant process, otherwise we may not be able to provide the services you have requested.

                    </li>
                    <li>During general browsing, the server will record your IP address, time of use, browser used, browsing and clicking data, etc. for our reference in order to enhance our website services.
                    </li>
                    <li>You may at any time request us to correct or delete your account or personal information collected by this website. Please see the contact details at the bottom of this page for contact details.
                    </li>

                </ul>
                <h4 class="mt-3" style="font-weight: bold">III Protection of data
                </h4>
                <ul>
                    <li>The host of this website is equipped with firewalls, anti-virus systems and other related information security equipment and necessary security measures to protect the website and your personal information using strict protection measures, only authorized personnel can access your personal information, the relevant personnel have signed a confidentiality contract, any breach of confidentiality obligations will be subject to relevant legal sanctions Any breach of confidentiality will be subject to legal action.
                    </li>
                    <li>If it is necessary to engage other parties to provide services for business purposes, this website will also strictly require them to comply with their confidentiality obligations and take necessary checks to ensure that they do so.
                    </li>
                </ul>
                <h4 class="mt-3" style="font-weight: bold">IV．External links to the website</h4>
                <ul>
                    <li>Some of the pages of this website link to other websites. However, the linked sites do not apply to the privacy policy of this website and you must refer to the privacy policy of the linked sites.</li>
                </ul>
                <h4 class="mt-3" style="font-weight: bold">V. Policy on sharing personal information with third parties</h4>
                <ul>
                    <li>This website will not provide, exchange, rent or sell any of your personal information to other individuals, organisations, private businesses or public authorities, except where there is a legal basis or contractual obligation to do so.</li>
                </ul>
                <h4 class="mt-3" style="font-weight: bold">VI. Use of Cookies</h4>
                <ul>
                    <li>In order to provide you with the best possible service, this website may place and access our cookies on your computer. If you do not wish to accept the inclusion of cookies, you can set the privacy level in the function of the browser you are using to refuse the inclusion of cookies, but this may result in some functions of the website not working properly.</li>
                </ul>
                <h4 class="mt-3" style="font-weight: bold">VII. Amendments to the Privacy Policy</h4>
                <ul>
                    <li>The privacy policy of this website will be amended from time to time in response to demand and the amended terms will be posted on the website.</li>
                </ul>
                <h4 class="mt-3" style="font-weight: bold">VIII. Contact information</h4>
                <ul>
                    <li>If you have any questions about our privacy policy, or would like to make a request to change or remove personal information, please go to the "Contact Us" page of this website and submit a form.</li>
                    <li>Or email to: ways00.hk@gmail.com</li>
                </ul>
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

