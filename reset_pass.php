<?php
session_start();
include('admin/include/dbController.php');
$db_handle = new DBController();
$email = $_GET['email'];

if(isset($_POST['reset_pass'])){
    $password = $db_handle->checkValue($_POST['new_pass']);
    $confirm_password = $db_handle->checkValue($_POST['confirm_new_pass']);

    if($password == $confirm_password){
        $update_query = $db_handle->insertQuery("UPDATE `customer` SET `password`='$password' WHERE email = '$email'");

        if($update_query){
            if($_SESSION['language'] == 'CN')
                echo "
        <script>
        alert('您的密碼已成功更新。請登入您的帳戶並享受購物。');
        window.location.href = 'Login';
</script>";
            else
                echo "
            <script>
        alert('Your password has been updated successfully. Please login to your account and enjoy shopping.');
        window.location.href = 'Login';
</script>
            ";
        }
    } else{
        if($_SESSION['language'] == 'CN')
            echo "
            <script>
            alert('密碼與確認密碼不相符。');
</script>";
        else
            echo "
            <script>
            alert('Password and Confirm Password do not match');
</script>";
    }



}

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
    <title>Forget Password</title>

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
                    <h2 class="mb-2"><?php if ($_SESSION['language'] === 'CN') echo '忘記密碼'; else echo 'Forget Password';?></h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active"><?php if ($_SESSION['language'] === 'CN') echo '忘記密碼'; else echo 'Forget Password';?></li>
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
            <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                <div class="image-contain">
                    <img src="assets/images/inner-page/log-in.png" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                <div class="log-in-box">
                    <div class="log-in-title">
                        <h3><?php if ($_SESSION['language'] === 'CN') echo '歡迎來到WaysHK'; else echo 'Welcome To WaysHK';?></h3>
                        <h4><?php if ($_SESSION['language'] === 'CN') echo '為您的帳戶重設密碼'; else echo 'Reset Password for your account';?></h4>
                    </div>

                    <div class="input-box">
                        <form class="row g-4" action="#" method="post">
                            <div class="col-12">
                                <div class="form-floating theme-form-floating log-in-form">
                                    <input type="password" class="form-control" id="email" name="new_pass">
                                    <label for="email"><h4><?php if ($_SESSION['language'] === 'CN') echo '新密碼'; else echo 'New Password';?></h4></label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating theme-form-floating log-in-form">
                                    <input type="password" class="form-control" id="email" name="confirm_new_pass">
                                    <label for="email"><h4><?php if ($_SESSION['language'] === 'CN') echo '確認新密碼'; else echo 'Confirm New Password';?></h4></label>
                                </div>
                            </div>


                            <div class="col-12">
                                <button class="btn btn-animation w-100 justify-content-center" name="reset_pass" type="submit"><?php if($_SESSION['language'] === 'CN') echo '登錄'; else echo 'Log In'?></button>
                            </div>
                        </form>
                    </div>

                    <div class="other-log-in">
                        <h6></h6>
                    </div>

                    <div class="sign-up-box">
                        <h4><?php if($_SESSION['language'] === 'CN') echo '沒有帳戶？'; else echo 'Do not have an account?'?></h4>
                        <a href="Sign-Up"><?php if($_SESSION['language'] === 'CN') echo '註冊'; else echo 'Sign Up'?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- log in section end -->

<!-- Footer Section Start -->
<?php
include ('include/footer.php');
?>
<!-- Footer Section End -->

<!-- Tap to top start -->
<div class="theme-option">
    <div class="back-to-top">
        <a id="back-to-top" href="#">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
</div>
<!-- Tap to top end -->

<!-- Deal Box Modal Start -->
<?php include ('include/deal.php');?>
<!-- Deal Box Modal End -->

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
