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
    <title>Living Seeds Children's Services | Wayshk </title>

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
        <div class="row g-lg-5 g-3">
            <h1>Therapy Gel Exercise 3 Sessions</h1>
            <p class="mt-3">There are cute little animals/insects as the theme, learn the basic method of using therapeutic glue in a fun way, and train small muscles [kindergarten group]</p>
            <table style="border: 1px solid #000000; margin: 25px; max-width:400px;padding: 15px;">
                <thead>
                <tr>
                    <td style="border: 1px solid #000000">Over</td>
                    <td style="border: 1px solid #000000">$300; ​​low-income families $150</td>
                    <td style="border: 1px solid #000000">Online Meeting</td>
                </tr>
                </thead>
            </table>
            <p class="mt-3" style="font-weight: bold;">Service Description</p>
            <p class="mt-3">Please bring your own tools for class:</p>
            <p>Textbooks, Healing Gel</p>
            <p class="mt-3">Group size:</p>
            <p>2-6 people (must be accompanied by parents)</p>
            <p class="mt-3">Low Income Families Enrollment:</p>
            <p>When registering, please show the low-income family certificate / explain the reason for the fee reduction.</p>
            <p class="mt-3" style="font-weight: bold;">Cancellation Policy</p>
            <p>No refunds will be issued once the course booking has been confirmed. If you notify three days before the start of the course, you can arrange to change to the next make-up class for free. Since the progress of each course will vary according to the student's ability, after the course starts, if there is no make-up class for the remaining classes, 50% of the paid amount can be exchanged for products of equal or lower value.</p>
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
