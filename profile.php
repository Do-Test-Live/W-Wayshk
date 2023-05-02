<?php
session_start();
include('admin/include/dbController.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");
if (!isset($_SESSION['id'])) {
    header('Location: index.php');
}else{
    $customer_id = $_SESSION['id'];
}


if (isset($_POST['submit'])) {
    $review = $db_handle->checkValue($_POST['review']);
    $inserted_at = date("Y-m-d H:i:s");
    $query = $db_handle->insertQuery("INSERT INTO `review`(`customer_id`, `description`, `inserted_at`) VALUES ('$customer_id','$review','$inserted_at')");
    echo "<script>
                window.location.href='index.php';
                </script>";

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
                    <h2 class="mb-2">User Profile</h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Profile</li>
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
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table order-tab-table">
                                <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Invoice Number</th>
                                    <th>Payment Type</th>
                                    <th>Shipping Method</th>
                                    <th>Price</th>
                                    <th>Print Invoice</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $fetch_data = $db_handle->runQuery("select * from customer, billing_details where customer.id=billing_details.customer_id and customer.id='$customer_id'");
                                $no_fetch_data = $db_handle->numRows("select * from customer, billing_details where customer.id=billing_details.customer_id and customer.id='$customer_id'");
                                for($i=0; $i<$no_fetch_data;$i++){
                                    ?>
                                    <tr>
                                        <td><?php echo $i+1;?></td>
                                        <td>#WHK<?php echo $fetch_data[$i]['id'];?></td>
                                        <td><?php echo $fetch_data[$i]['payment_type'];?></td>
                                        <td><?php echo $fetch_data[$i]['shipping_method'];?></td>
                                        <td><?php echo $fetch_data[$i]['total_purchase'];?></td>
                                        <td><a href="admin/print_invoice.php?id=<?php echo $fetch_data[$i]['id'];?>" target="_blank"><i class="fa fa-print"></i></a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                <div class="log-in-box">
                    <div class="log-in-title">
                        <h3>Membership Points:</h3>
                        <h3 class="text-warning">
                            <?php
                            $points = $db_handle->runQuery("select sum(purchase_points) as points from billing_details where customer_id = '$customer_id'");
                            echo $points[0]['points'];
                            ?>
                         Points</h3>
                    </div>
                    <div class="log-in-title">
                        <h3>Previous Comment</h3>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table order-tab-table">
                                    <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Comment</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $comment = $db_handle->runQuery("select * from review where customer_id = '$customer_id'");
                                    $no_comment = $db_handle->numRows("select * from review where customer_id = '$customer_id'");
                                    for($i=0; $i<$no_comment;$i++){
                                        ?>
                                        <tr>
                                            <td><?php echo $i+1;?></td>
                                            <td><?php echo $comment[$i]['description'];?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="log-in-title mt-5">
                        <h3>Welcome To WaysHK</h3>
                        <h4>Submit your Comment.</h4>
                    </div>

                    <div class="input-box">
                        <form class="row g-4" action="#" method="post">
                            <div class="col-12">
                                <div class="form-floating theme-form-floating log-in-form">
                                    <textarea class="form-control" rows="4" name="review"></textarea>
                                    <label for="email">Comment</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-animation w-100 justify-content-center" name="submit"
                                        type="submit">Submit
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="other-log-in">
                        <h6></h6>
                    </div>

                </div>
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

