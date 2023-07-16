<?php
session_start();
if (isset($_SESSION['id'])) {
    $customer_id = $_SESSION['id'];
}
include('admin/include/dbController.php');
$db_handle = new DBController();

$id = $_GET['id'];

$fetch_details = $db_handle->runQuery("select * from course where course_id = '$id'");
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
    <title>Course Details | Wayshk </title>

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
<section class="contact-box-section mb-5 mt-5">
    <div class="container-fluid-lg">
        <div class="row mx-auto">
            <img class="img-fluid" src="admin/<?php echo $fetch_details[0]['course_image']; ?>" alt="course details"
                 style="max-width: 500px;">
        </div>
        <div class="row g-lg-5 g-3 mt-5">
            <h1 style="font-size: 32px;"><?php
                if ($_SESSION['language'] === 'CN')
                    echo $fetch_details[0]['course_name'];
                else
                    echo $fetch_details[0]['course_name_en']; ?>
            </h1>
            <table style="border: 1px solid #000000; margin: 25px; max-width:400px;padding: 15px;">
                <thead>
                <tr>
                    <td style="border: 1px solid #000000">
                        <?php
                        if($_SESSION['language'] === 'CN')
                            echo '課程價格';
                        else
                            echo 'Course Price'
                        ?></td>
                    <td style="border: 1px solid #000000"><?php echo $fetch_details[0]['course_price']; ?></td>
                </tr>
                </thead>
            </table>
            <p>
                <?php
                if ($_SESSION['language'] === 'CN')
                    echo $fetch_details[0]['course_description'];
                else
                    echo $fetch_details[0]['course_description_en'];
                ?>
            </p>
            <div class="row mt-3">
                <div class="col-3">
                    <a href="#" class="btn text-white home-button mend-auto theme-bg-color" style="max-width: 350px">
                        <?php if($_SESSION['language'] === 'CN') echo '立即報名'; else echo 'Register Now';?>  <i class="fa-solid fa-right-long icon ms-2"></i></a>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Cart Section End -->


<!-- Footer Section Start -->
<?php
include('include/footer.php');
?>
<!-- Footer Section End -->

<!-- Deal Box Modal Start -->
<?php include('include/deal.php'); ?>
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
