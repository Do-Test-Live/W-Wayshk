<?php
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
    <title>Sign Up</title>

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


    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2><?php if ($_SESSION['language'] === 'CN') echo '註冊'; else echo 'Sign Up';?></h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.php">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active"><?php if ($_SESSION['language'] === 'CN') echo '註冊'; else echo 'Sign Up';?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- log in section start -->
    <section class="log-in-section section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="assets/images/inner-page/sign-up.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3><?php if ($_SESSION['language'] === 'CN') echo '歡迎來到 WAYSHK'; else echo 'Welcome To WAYSHK';?></h3>
                            <h4><?php if ($_SESSION['language'] === 'CN') echo '建立新帳戶'; else echo 'Create New Account';?></h4>
                        </div>

                        <div class="input-box">
                            <form class="row g-4" action="admin/insert.php" method="post">
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control" id="fullname" placeholder="<?php if ($_SESSION['language'] === 'CN') echo '全名'; else echo 'Full Name';?>" name="customer_name" required>
                                        <label for="fullname"><?php if ($_SESSION['language'] === 'CN') echo '全名'; else echo 'Full Name';?></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="<?php if ($_SESSION['language'] === 'CN') echo '電子郵件地址'; else echo 'Email Address';?>" name="customer_email" required>
                                        <label for="email"><?php if ($_SESSION['language'] === 'CN') echo '電子郵件地址'; else echo 'Email Address';?></label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control" id="email" placeholder="<?php if ($_SESSION['language'] === 'CN') echo '聯繫電話'; else echo 'Contact Number';?>" name="customer_number" required>
                                        <label for="text"><?php if ($_SESSION['language'] === 'CN') echo '聯繫電話'; else echo 'Contact Number';?></label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Password" name="password" required>
                                        <label for="password"><?php if ($_SESSION['language'] === 'CN') echo '密碼'; else echo 'Password';?></label>
                                    </div>
                                </div>

                                <div class="col-12 my-3">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox"
                                                id="flexCheckDefault" required>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <?php if($_SESSION['language'] === 'CN') echo '我同意
                                                <span>私隱</span> 政策 及 <span>條款細則</span>'; else echo 'I agree with
                                                <span>Terms</span> and <span>Privacy</span>';?>
                                                </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100" type="submit" name="customer_signup"><?php if ($_SESSION['language'] === 'CN') echo '註冊'; else echo 'Sign Up';?></button>
                                </div>
                            </form>
                        </div>

                        <!--<div class="other-log-in">
                            <h6>or</h6>
                        </div>

                        <div class="log-in-button">
                            <ul>
                                <li>
                                    <a href="https://accounts.google.com/signin/v2/identifier?flowName=GlifWebSignIn&amp;flowEntry=ServiceLogin"
                                        class="btn google-button w-100">
                                        <img src="assets/images/inner-page/google.png" class="blur-up lazyload"
                                             alt="">
                                        Sign up with Google
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/" class="btn google-button w-100">
                                        <img src="assets/images/inner-page/facebook.png" class="blur-up lazyload"
                                             alt=""> Sign up with Facebook
                                    </a>
                                </li>
                            </ul>
                        </div>-->

                        <div class="other-log-in">
                            <h6></h6>
                        </div>

                        <div class="sign-up-box">
                            <h4><?php if($_SESSION['language'] === 'CN') echo '已有帳戶？'; else echo 'Already have an account?';?></h4>
                            <a href="login.php"><?php if($_SESSION['language'] === 'CN') echo '登錄'; else echo 'Log In';?></a>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-7 col-xl-6 col-lg-6"></div>
            </div>
        </div>
    </section>
    <!-- log in section end -->

    <!-- Footer Section Start -->
    <?php
    include ('include/footer.php');
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
</body>
</html>
