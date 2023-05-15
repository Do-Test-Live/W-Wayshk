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
    <title>Cart</title>

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

        .alert-error {
            background: #da9393;
        }

        .alert-success {
            background: #93da94;
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
                    <h2><?php if ($_SESSION['language'] === 'CN') echo '購物車'; else echo 'Cart'; ?></h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?php if ($_SESSION['language'] === 'CN') echo '購物車'; else echo 'Cart'; ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Cart Section Start -->
<section class="cart-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row g-sm-5 g-3">
            <div class="col-xxl-12">
                <div class="cart-table">
                    <div class="table-responsive-xl">
                        <table class="table">
                            <tbody>
                            <?php
                            $total_quantity_new = 0;
                            $total_price_new = 0;
                            $total_weight = 0;
                            if (isset($_SESSION["cart_item"])) {
                                foreach ($_SESSION["cart_item"] as $item) {
                                    $item_price = $item["quantity"] * $item["price"];
                                    ?>
                                    <tr class="product-box-contain">
                                        <td class="product-detail">
                                            <div class="product border-0">
                                                <a href="#" class="product-image">
                                                    <img src="admin/<?php echo str_replace("650", "250", strtok($item['image'], ',')); ?>"
                                                         class="img-fluid blur-up lazyload" alt="">
                                                </a>
                                                <div class="product-detail">
                                                    <ul>
                                                        <li class="name">
                                                            <h4 class="table-title text-content"><?php if ($_SESSION['language'] === 'CN') echo '產品名稱'; else echo 'Product Name' ?> </h4>
                                                            <a href="Product-Details?product_id=<?php echo $item["id"]; ?>"><?php if ($_SESSION['language'] === 'CN') echo $item["name"]; else echo $item["en_name"] ?></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="price">
                                            <h4 class="table-title text-content"><?php if ($_SESSION['language'] === 'CN') echo '價格'; else echo 'Price' ?></h4>
                                            <h5><?php echo $item["price"] . ' HKD'; ?></h5>
                                        </td>

                                        <td class="quantity">
                                            <h4 class="table-title text-content"><?php if ($_SESSION['language'] === 'CN') echo '數量'; else echo 'Qty' ?></h4>
                                            <div class="quantity-price">
                                                <div class="cart_qty">
                                                    <div class="input-group">
                                                        <?php echo $item["quantity"]; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="quantity">
                                            <h4 class="table-title text-content"><?php if ($_SESSION['language'] === 'CN') echo '重量（克）'; else echo 'Weight' ?></h4>
                                            <div class="quantity-price">
                                                <div class="cart_qty">
                                                    <div class="input-group">
                                                        <?php echo $item["weight"] * $item['quantity']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="subtotal">
                                            <h4 class="table-title text-content"><?php if ($_SESSION['language'] === 'CN') echo '合計'; else echo 'Total' ?></h4>
                                            <h5><?php echo number_format($item_price, 2) . ' HKD'; ?></h5>
                                        </td>

                                        <td class="save-remove">
                                            <h4 class="table-title text-content"><?php if ($_SESSION['language'] === 'CN') echo '行動'; else echo 'Action' ?></h4>
                                            <a class="remove close_button"
                                               href="Cart?action=remove&product_id=<?php echo $item["id"]; ?>"><?php if ($_SESSION['language'] === 'CN') echo '消除'; else echo 'Remove' ?></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $total_quantity_new += $item["quantity"];
                                    $total_price_new += ($item["price"] * $item["quantity"]);
                                    $total_weight += ($item["weight"] * $item['quantity']);
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div>
                    <p>
                        <?php
                        $points = 0;
                        $customer_id = 0;
                        if (isset($_SESSION['id'])) {
                            $customer_id = $_SESSION['id'];
                        }

                        $query = "SELECT * FROM `point` where customer_id={$customer_id}";
                        $data = $db_handle->runQuery($query);
                        $row = $db_handle->numRows($query);
                        for ($i = 0; $i < $row; $i++) {
                            $points += $data[$i]['points'];
                        }
                        ?>
                        <?php
                        if($_SESSION['language'] == 'EN'){
                            ?>
                            You have <?php echo $points; ?> points in your account.
                            At least 40 point need to craft 1 HKD.
                            <?php
                        } else{
                            ?>
                            你有 <?php echo $points; ?> 您帳戶中的積分。
                            至少需要 40 積分才能製作 1 HKD。
                            <?php
                        }
                        ?>
                    </p>
                </div>
                <div class="mb-3 coupon-box input-group">
                    <div onclick="applyPoints(<?php echo $points; ?>);">
                        <input class="form-check-input" type="checkbox" value=""
                               id="applyPoints" <?php if ($points / 40 < 1) echo 'disabled'; ?>>
                        <label class="form-check-label" for="applyPoints">
                            Apply points for discounts.
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 mt-3">
                <div class="coupon-cart">
                    <h6 class="text-content mb-2"><?php
                        if ($_SESSION['language'] === 'CN')
                            echo '申請優惠卷';
                        else
                            echo 'Coupon Apply';
                        ?></h6>
                    <div id="liveAlertPlaceholder"></div>
                    <div class="mb-3 coupon-box input-group">
                        <input type="hidden" name="totalAmount" id="totalAmount"
                               value="<?php echo $total_price_new; ?>"/>
                        <input type="text" class="form-control" id="coupon" placeholder="<?php
                        if ($_SESSION['language'] === 'CN')
                            echo '輸入優惠卷號碼';
                        else
                            echo 'Enter the Coupon Code Here...'
                        ?>">
                        <button style="border: 1px solid black" class="btn btn-light" onclick="applyCoupon();"><?php
                            if ($_SESSION['language'] === 'CN')
                                echo '申請';
                            else
                                echo 'Apply';
                            ?></button>
                    </div>
                </div>
                <div class="summery-box p-sticky">
                    <div class="button-group cart-button">
                        <ul>
                            <li>
                                <a href="Checkout"
                                   class="btn btn-animation proceed-btn fw-bold mt-3" id="checkout">
                                    <?php if ($_SESSION['language'] === 'CN') echo '結帳'; else echo 'Proceed To Checkout' ?>
                                </a>
                            </li>

                            <li>
                                <button onclick="location.href = 'Home';"
                                        class="btn btn-light shopping-button text-dark">
                                    <i class="fa-solid fa-arrow-left-long"></i> <?php if ($_SESSION['language'] === 'CN') echo '返回購物'; else echo 'Return To Shopping' ?>
                                </button>
                            </li>
                        </ul>
                    </div>
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
<script src="assets/js/bootstrap/popper.min.js"></script>
<script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

<!-- feather icon js-->
<script src="assets/js/feather/feather.min.js"></script>
<script src="assets/js/feather/feather-icon.js"></script>

<!-- Lazyload Js -->
<script src="assets/js/lazysizes.min.js"></script>

<!-- Slick js-->
<script src="assets/js/slick/slick.js"></script>
<script src="assets/js/slick/custom_slick.js"></script>

<!-- Quantity js -->
<script src="assets/js/quantity.js"></script>

<!-- script js -->
<script src="assets/js/script.js"></script>

<!-- thme setting js -->
<script src="assets/js/theme-setting.js"></script>

<script>
    let alertPlaceholder = document.getElementById('liveAlertPlaceholder')

    function alertMessage(message, type) {
        let wrapper = document.createElement('div')
        wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

        alertPlaceholder.append(wrapper)
    }


    async function applyCoupon() {
        let coupon = document.getElementById('coupon').value;
        let totalAmount = document.getElementById('totalAmount').value;

        $.ajax({
            type: 'get',
            contentType: "application/json; charset=utf-8",
            url: 'checkCoupon.php',
            data: {
                coupon: coupon, totalAmount: totalAmount
            },
            success: function (response) {
                console.log(response);
                const obj = JSON.parse(response);

                alertMessage(obj.message, obj.alertType);
                document.getElementById("checkout").href = "Checkout?discount=" + obj.amount;
            }
        });
    }

    async function applyPoints(points) {
        if(document.getElementById("applyPoints").checked){
            document.getElementById("checkout").href = document.getElementById("checkout").getAttribute("href")+"?points="+points+"&applyPoints=1";
        }else{
            document.getElementById("checkout").href ='Checkout';
        }
    }
</script>
</body>
</html>
