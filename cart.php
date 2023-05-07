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

        .alert-error{
            background: #da9393;
        }

        .alert-success{
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
                    <h2><?php if($_SESSION['language'] === 'CN') echo '購物車'; else echo 'Cart';?></h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <?php if($_SESSION['language'] === 'CN') echo '購物車'; else echo 'Cart';?></li>
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
                                                    <img src="admin/<?php echo str_replace("650", "250", strtok($item['image'],','));?>"
                                                         class="img-fluid blur-up lazyload" alt="">
                                                </a>
                                                <div class="product-detail">
                                                    <ul>
                                                        <li class="name">
                                                            <h4 class="table-title text-content"><?php if($_SESSION['language'] === 'CN') echo '產品名稱'; else echo 'Product Name'?> </h4>
                                                            <a href="Product-Details?product_id=<?php echo $item["id"]; ?>"><?php if($_SESSION['language'] === 'CN') echo $item["name"]; else echo $item["en_name"]?></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="price">
                                            <h4 class="table-title text-content"><?php if($_SESSION['language'] === 'CN') echo '價格'; else echo 'Price'?></h4>
                                            <h5><?php echo $item["price"] . ' HKD'; ?></h5>
                                        </td>

                                        <td class="quantity">
                                            <h4 class="table-title text-content"><?php if($_SESSION['language'] === 'CN') echo '數量'; else echo 'Qty'?></h4>
                                            <div class="quantity-price">
                                                <div class="cart_qty">
                                                    <div class="input-group">
                                                        <?php echo $item["quantity"]; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="quantity">
                                            <h4 class="table-title text-content"><?php if($_SESSION['language'] === 'CN') echo '重量'; else echo 'Weight'?></h4>
                                            <div class="quantity-price">
                                                <div class="cart_qty">
                                                    <div class="input-group">
                                                        <?php echo $item["weight"] * $item['quantity']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="subtotal">
                                            <h4 class="table-title text-content"><?php if($_SESSION['language'] === 'CN') echo '合計'; else echo 'Total'?></h4>
                                            <h5><?php echo number_format($item_price, 2) . ' HKD'; ?></h5>
                                        </td>

                                        <td class="save-remove">
                                            <h4 class="table-title text-content"><?php if($_SESSION['language'] === 'CN') echo '行動'; else echo 'Action'?></h4>
                                            <a class="remove close_button" href="Cart?action=remove&product_id=<?php echo $item["id"]; ?>"><?php if($_SESSION['language'] === 'CN') echo '消除'; else echo 'Remove'?></a>
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

            <div class="col-xxl-3 mt-3">
                <div class="coupon-cart">
                    <h6 class="text-content mb-2">Coupon Apply</h6>
                    <div id="liveAlertPlaceholder"></div>
                    <div class="mb-3 coupon-box input-group">
                        <input type="hidden" name="totalAmount" id="totalAmount" value="<?php echo $total_price_new; ?>"/>
                        <input type="text" class="form-control" id="coupon" placeholder="Enter Coupon Code Here...">
                        <button style="border: 1px solid black" class="btn btn-light" onclick="applyCoupon();">Apply</button>
                    </div>
                </div>
                <div class="summery-box p-sticky">
                    <div class="button-group cart-button">
                        <ul>
                            <li>
                                <a href="Checkout"
                                        class="btn btn-animation proceed-btn fw-bold mt-3" id="checkout">
                                    <?php if($_SESSION['language'] === 'CN') echo '結帳'; else echo 'Proceed To Checkout'?>
                                </a>
                            </li>

                            <li>
                                <button onclick="location.href = 'Home';"
                                        class="btn btn-light shopping-button text-dark">
                                    <i class="fa-solid fa-arrow-left-long"></i> <?php if($_SESSION['language'] === 'CN') echo '返回購物'; else echo 'Return To Shopping'?>
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

<!-- Location Modal Start -->
<!--  <div class="modal location-modal fade theme-modal" id="locationModal" tabindex="-1"
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


    async function applyCoupon(){
        let coupon=document.getElementById('coupon').value;
        let totalAmount=document.getElementById('totalAmount').value;

        $.ajax({
            type: 'get',
            contentType: "application/json; charset=utf-8",
            url: 'checkCoupon.php',
            data: {
                coupon: coupon,totalAmount:totalAmount
            },
            success: function(response) {
                console.log(response);
                const obj = JSON.parse(response);

                alertMessage(obj.message, obj.alertType);
                document.getElementById("checkout").href="Checkout?discount="+obj.amount;
            }
        });
    }


</script>
</body>
</html>
