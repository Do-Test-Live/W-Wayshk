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
                    <h2 class="mb-2">WAYSHK Online Shop Membership Program</h2>
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
                <h1 class="mt-3 mb-3" style="font-weight: bold; font-size: 40px;">Frequently Asked Questions </h1>
            </div>
            <div class="col-12">
                <div class="faq-accordion">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"
                                        style="font-weight: bold;">
                                    1. How do I join the Wayshk Membership Program? <i
                                            class="fa-solid fa-angle-down"></i>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                 aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Go to the "Wayshk Online Shop Membership Program" page on the official homepage,
                                        then click "Register Member" to create a membership account with your phone
                                        number and receive 200 points upon successful registration. (Only for those who
                                        are 18 years old or above)</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"
                                        style="font-weight: bold;">
                                    2. How do I earn points?<i
                                            class="fa-solid fa-angle-down"></i>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Each time you make a purchase, log in to your member account first. Each time you
                                        submit a successful payment, the points will be automatically credited and
                                        recorded in your spending account.</p>
                                    <p>Wayshk Online Shop members can earn points through the following ways:</p>
                                    <p>(i) Registered Member - Register as a member of the online store and earn 200
                                        points.</p>
                                    <p>(ii) Online Shop Spending - Earn 1 point for every $1 you spend on orders/classes
                                        in the Online Shop. Points will be rounded down to the nearest single digit,
                                        e.g. if the net purchase is HK$99.5 after the discount, the customer will earn
                                        99 points</p>
                                    <p>(iii) Referral Reward - Invite a friend to become Wayshk Online Shop member, and
                                        the referrer will earn 200 points (unlimited number of times) after your
                                        friend's first purchase in the Online Shop.</p>
                                    <p>(iv) Trial Evaluation Rebate - After purchasing a product / taking a course,
                                        write a trial evaluation with photos and you will receive 200 points for each
                                        product evaluation.</p>
                                    <p>* Shipping and other service fees are not included in the purchase amount.</p>
                                    <p>* Member points can only be earned after the member has logged in and paid.</p>
                                    <p>*Points cannot be earned on selected products including gift packs/special
                                        offers.</p>
                                    <p>*Membership program is only applicable to Wayshk online store, orders placed
                                        offline by other means are not eligible for the points program</p>
                                    <p>*After the points are issued, you can check the "Member Points" record page by
                                        yourself, we will not check the points on your behalf.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="true"
                                        aria-controls="collapseThree"
                                        style="font-weight: bold;">
                                    3. How do I redeem my points?<i
                                            class="fa-solid fa-angle-down"></i>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Enter Wayshk online store and login to your member account:</p>
                                    <p>(i) Accumulated points in the member account can be redeemed and downloaded for
                                        designated training materials</p>
                                    <p>(ii) Cash rebate - every 40 points can be used as $1 (minimum rebate amount is
                                        $1, less than 40 points cannot be counted); you can use the accumulated points
                                        to pay for your next purchase with no minimum spending limit</p>
                                    <p>* Points cannot be exchanged for cash or transferred to others.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour"
                                        style="font-weight: bold;">
                                    4. What is the validity period of points?<i
                                            class="fa-solid fa-angle-down"></i>
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Points are valid for 180 days from the date they are earned, after which they are
                                        void.</p>
                                    <p>Example: 200 points will be earned on May 1, 2023, when you create an account,
                                        and the expiration date will be October 27, 2023.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive"
                                        style="font-weight: bold;">
                                    5. How do I change my personal information? <i
                                            class="fa-solid fa-angle-down"></i>
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>You can change your account details at any time by logging into your account and
                                        clicking the "Personal Information" button on the screen.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix"
                                        style="font-weight: bold;">
                                    6. What should I do if I forget my password? <i
                                            class="fa-solid fa-angle-down"></i>
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>If you forget your password, click "Login" on the top of the screen, and then
                                        click "Forget Password". You can enter your registered email address and click
                                        the "Send" button below. Wayshk will send the reset password link to your
                                        registered email address.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSeven" aria-expanded="true"
                                        aria-controls="collapseSeven"
                                        style="font-weight: bold;">
                                    7. What should I do if I want to cancel my membership? <i
                                            class="fa-solid fa-angle-down"></i>
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>If a member wishes to cancel their Wayshk membership, please email
                                        ways00.hk@gmail.com to apply. Once the information is confirmed, Wayshk will
                                        make arrangements within 30 working days and all unredeemed points and other
                                        benefits will be cancelled.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <h1 class="mt-3 mb-3" style="font-weight: bold; font-size: 40px;">Terms and Conditions</h1>
                <h2 class="mb-3" style="font-weight: bold;">Wayshk O Membership Program</h2>
                <p>1. Each applicant can only apply for one Wayshk Online Shop membership.</p>
                <p>2. The application fee for Wayshk Online Shop Membership is free of charge.</p>
                <p>3. The Wayshk Membership Program is only available on the website.</p>
                <p>4. Wayshk online store membership and points can only be used by the member himself/herself and cannot be transferred to others.</p>
                <p>5. All membership information, points and rewards redemption records shall be based on the records kept by Wayshk.</p>
                <p>6. If a member is found to have abused the membership program, made false statements, provided false or invalid documents, or violated any of the terms and conditions of the Wayshk Online Shop membership, Wayshk may exercise the right to suspend or terminate the membership of the member concerned, and the points issued or accumulated by the member will be revoked or nullified.</p>
                <p>7 Wayshk reserves the right to reject the application of any applicant, review the membership of the member and terminate the membership of any member without providing any reason for the final decision. </p>
                <p>8. Wayshk will not be held responsible for incorrect credits, which may be caused by technical failures or factors beyond our control.</p>
                <p>9. The terms and conditions of this membership program are subject to change from time to time without notice.</p>
                <p>10. In case of any dispute, Wayshk reserves the right to interpret, exercise and decide on all terms and conditions;</p>
                <p>11. If there is any systemic problem with the membership program, please contact us as soon as possible, we will correct and continuously improve the relevant services as soon as possible</p>
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

