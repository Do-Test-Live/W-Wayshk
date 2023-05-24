<?php
session_start();
require_once("admin/include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");
$customer_id = 0;
if (isset($_SESSION['id'])) {
    $customer_id = $_SESSION['id'];
}


function randomPassword()
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}


if (isset($_POST["placeOrder"])) {

    $f_name = $db_handle->checkValue($_POST['f_name']);
    $l_name = $db_handle->checkValue($_POST['l_name']);
    $phone = $db_handle->checkValue($_POST['phone_number']);
    $email = $db_handle->checkValue($_POST['email']);
    $address = $db_handle->checkValue($_POST['address']);
    $city = $db_handle->checkValue($_POST['city']);
    $zip_code = $db_handle->checkValue($_POST['zip_code']);
    $note = $db_handle->checkValue($_POST['note']);
    $discount = $db_handle->checkValue($_POST['discount']);
    $delivery_charge = $db_handle->checkValue($_POST['delivery_charge']);
    $addInfo = 0;
    $payment = $db_handle->checkValue($_POST['payment']);
    $shipping = $db_handle->checkValue($_POST['shipping']);
    $updated_at = date("Y-m-d H:i:s");
    $total_purchase = 0;
    $purchase_points = 0;

    if (isset($_POST['addInfo'])) {
        $addInfo = 1;
    }

    $points = 0;


    foreach ($_SESSION["cart_item"] as $item) {
        $total_purchase += $item["quantity"] * $item["price"];
    }


    if ($customer_id != 0) {
        $purchase_points = floor($total_purchase);

        if (isset($_POST['points'])) {
            if ($total_purchase >= $_POST['points'] / 40) {
                $purchase_points =- $_POST['points'];
            } else {
                $purchase_points = (int)$total_purchase * 40 - $_POST['points'];
            }

        }
    }


    if (isset($_SESSION['id'])) {
        $customer = $_SESSION['id'];
        $insert_point = $db_handle->insertQuery("INSERT INTO `point`( `customer_id`, `points`, `date`) VALUES ('$customer','$purchase_points','$updated_at')");
    }

    $insert_user = $db_handle->insertQuery("INSERT INTO `billing_details`(`customer_id`, `f_name`, `l_name`, 
                              `email`, `phone`, `address`, `city`, `zip_code`, `payment_type`,`shipping_method`, 
                              `discount`,`total_purchase`,`delivery_charges`, `updated_at`,`note`) 
                              VALUES ('$customer_id','$f_name','$l_name','$email','$phone'
                              ,'$address','$city','$zip_code','$payment','$shipping','$discount','$total_purchase','$delivery_charge','$updated_at','$note')");


    $billing_id = $db_handle->runQuery("SELECT * FROM billing_details order by id desc limit 1");

    $id = $billing_id[0]["id"];

    foreach ($_SESSION["cart_item"] as $item) {
        $name = $item["name"];
        $item_price = $item["quantity"] * $item["price"];
        $quantity = $item["quantity"];
        $unit_price = $item["price"];
        $product_id = $item['id'];

        $invoice = $db_handle->insertQuery("INSERT INTO `invoice_details`( `customer_id`, `billing_id`,`product_id`, `product_name`,`product_quantity`, `product_unit_price`,`product_total_price`, `updated_at`) VALUES ('$customer_id','$id','$product_id','$name','$quantity','$unit_price','$item_price', '$updated_at')");
    }

    unset($_SESSION["cart_item"]);

    $name = $f_name . ' ' . $l_name;

    $password = randomPassword();

    $info = '';
    if (!isset($_SESSION['id'])) {
        $select = $db_handle->numRows("SELECT * FROM customer where email='$email'");
        if ($select == 0 && $addInfo == 1) {
            $info = $db_handle->insertQuery("INSERT INTO `customer`(`customer_name`, `email`, `number`, `address`, 
                       `city`, `zip_code`, `password`, `inserted_at`, `updated_at`) 
                       VALUES ('$name','$email','$phone','$address','$city','$zip_code','$password',
                               '$updated_at','$updated_at')");
        }
    }

    if ($payment != 'Credit Card') {
        $email_to = $email;
        $subject = 'Wayshk';


        $headers = "From: Wayshk <" . $db_handle->from_email() . ">\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";

        $message = <<<HTML
                        <html lang="en">
                        
                        <head>
                            <link rel="preconnect" href="https://fonts.googleapis.com/">
                            <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
                            <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
                        
                            <style type="text/css">
                                /* Paste the CSS styles from your original HTML template here */
                                body {
            text-align: center;
            margin: 0 auto;
            width: 650px;
            font-family: 'Public Sans', sans-serif;
            background-color: #e2e2e2;
            display: block;
        }

        .mb-3 {
            margin-bottom: 30px;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            display: inline-block;
            text-decoration: unset;
        }

        a {
            text-decoration: none;
        }

        h5 {
            margin: 10px;
            color: #777;
        }

        .text-center {
            text-align: center
        }

        .header-menu ul li + li {
            margin-left: 20px;
        }

        .header-menu ul li a {
            font-size: 14px;
            color: #252525;
            font-weight: 500;
        }

        .password-button {
            background-color: #0DA487;
            border: none;
            color: #fff;
            padding: 14px 26px;
            font-size: 18px;
            border-radius: 6px;
            font-weight: 700;
            font-family: 'Nunito Sans', sans-serif;
        }

        .footer-table {
            position: relative;
        }

        .footer-table::before {
            position: absolute;
            content: "";
            background-image: url(images/footer-left.svg);
            background-position: top right;
            top: 0;
            left: -71%;
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            z-index: -1;
            background-size: contain;
            opacity: 0.3;
        }

        .footer-table::after {
            position: absolute;
            content: "";
            background-image: url(images/footer-right.svg);
            background-position: top right;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            z-index: -1;
            background-size: contain;
            opacity: 0.3;
        }

        .theme-color {
            color: #0DA487;
        }
                            </style>
                        </head>
                        
                        <body style="margin: 20px auto;">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color: white; width: 100%; box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);-webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);">
                                <!-- Paste the rest of your HTML template code here -->
                                <tbody>
    <tr>
        <td>
            <table class="header-table" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr class="header"
                    style="background-color: #f7f7f7;display: flex;align-items: center;justify-content: space-between;width: 100%;">
                    <td class="header-logo" style="padding: 10px 32px;">
                        <a href="#" style="display: block; text-align: left;">
                            <img src="assets/images/logo/2.png" class="main-logo" alt="logo" style="width: 120px">
                        </a>
                    </td>
                </tr>
            </table>

            <table class="contant-table" style="margin-bottom: -6px;" align="center" border="0" cellpadding="0"
                   cellspacing="0" width="100%">
                <thead>
                <tr>
                    <td>
                        <img src="assets/images/welcome-poster.jpg" alt="">
                    </td>
                </tr>
                </thead>
            </table>

            <table class="contant-table" style="margin-top: 40px;" align="center" border="0" cellpadding="0"
                   cellspacing="0" width="100%">
                <thead>
                <tr style="display: block;">
                    <td style="display: block;">
                        <h3
                                style="font-weight: 700; font-size: 20px; margin: 0; text-transform: uppercase;">
                            Hi Thank You for Your Purchase.!</h3>
                    </td>

                    <td style='display: block;'>
                        <p style="font-size: 14px;font-weight: 600;width: 82%;margin: 8px auto 0;line-height: 1.5;color: #939393;font-family: 'Nunito Sans', sans-serif;">
                            Your order is placed. Hope our products will fulfill all your needs. Have a good day.
                        </p>
                    </td>
                </tr>
                </thead>
            </table>

            <table class="button-table" style="margin: 34px 0;" align="center" border="0" cellpadding="0"
                   cellspacing="0" width="100%">
                <thead>
                <tr style="display: block;">
                    <td style="display: block;">
                        <a href='https://wayshk.ngt.hk/print_receipt.php?id=$id' class="password-button"
                           target="_blank">See Details</a>
                    </td>
                </tr>
                </thead>
            </table>

            <table class="contant-table" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                <tr style="display: block;">
                    <td style="display: block;">
                        <p
                                style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">
                            If you have any question, please email us at <span
                                class="theme-color">wayshk.order@gmail.com</span> or whatsapp at: +852 56058389</p>
                    </td>
                </tr>
                </thead>
            </table>

            <table class="text-center footer-table" align="center" border="0" cellpadding="0" cellspacing="0"
                   width="100%"
                   style="background-color: #282834; color: white; padding: 24px; overflow: hidden; z-index: 0; margin-top: 30px;">
                <tr>
                    <td>
                        <table border="0" cellpadding="0" cellspacing="0" class="footer-social-icon text-center"
                               align="center" style="margin: 8px auto 11px;">
                            <tr>
                                <td>
                                    <h4 style="font-size: 19px; font-weight: 700; margin: 0;">Shop For <span
                                            class="theme-color">WaysHK</span></h4>
                                </td>
                            </tr>
                        </table>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td>
                                    <h5 style="font-size: 13px; text-transform: uppercase; margin: 0; color:#ddd;
                                letter-spacing:1px; font-weight: 500;">Want to change how you receive these emails?
                                    </h5>
                                    <h5 style="font-size: 13px; text-transform: uppercase; margin: 10px 0 0; color:#ddd;
                                letter-spacing:1px; font-weight: 500;">2023 copy right by WaysHK</h5>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    </tbody>
                            </table>
                        </body>
                        
                        </html>
 HTML;
        if (mail($email_to, $subject, $message, $headers)) {

            $email_to = $db_handle->notify_email();
            $subject = 'Wayshk';


            $headers = "From: Wayshk <" . $db_handle->from_email() . ">\r\n";
            $headers .= "Content-Type: text/html; charset=utf-8\r\n";

            $messege = "
            <html>
                <body style='background-color: #eee; font-size: 16px;'>
                <div style='min-width: 200px; background-color: #ffffff; padding: 20px; margin: auto;'>
                    <p style='color:black;'>
                        New Order Arrived. Pyment option: $payment .
                    </p>
                </div>
                </body>
            </html>";

            if (mail($email_to, $subject, $messege, $headers)) {
                if($_SESSION['language'] === 'EN'){
                ?>
                <script>
                    alert("Your order has been placed successfully! Please check your email for more details.");
                    window.location.href = 'Home';
                </script>
                <?php
                } else{
                    ?>
                    <script>
                        alert("您的訂單已經成功提交。請查看您的郵件以獲取更多詳細資訊");
                        window.location.href = 'Home';
                    </script>
                    <?php
                }
            }
        }
    }

    $data = $db_handle->runQuery("SELECT id FROM billing_details order by id desc LIMIT  1");

    $id = $data[0]['id'];

    if (!isset($_SESSION['user_id']) && $info) {
        session_unset();
        session_destroy();

        session_start();
        $_SESSION['user_id'] = $id;

        // Include configuration file
        require_once 'config.php';

    } else if (!isset($_SESSION['user_id']) && $insert_user) {

        // Include configuration file
        require_once 'config.php';
        $_SESSION['user_id'] = $id;

    }
}

$total_purchase = (int)$total_purchase + (int)$shipping - (int)$discount;

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .loader {
            position: absolute;
            width: 100px;
            height: 100px;
            left: 50%;
            top: 50%;
            margin-left: -50px;
            margin-top: -50px;
        }

        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #ffcba3;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>
<div class="loader"></div>
<button class="btn btn-primary stripe-button" id="payButton" style="display: none">
    <div class="spinner hidden" id="spinner"></div>
    <span id="buttonText">Pay Now</span>
</button>

<!-- Stripe JavaScript library -->
<script src="https://js.stripe.com/v3/"></script>

<script>
    window.onload = function () {
        document.getElementById('payButton').click();
    }


    // Set Stripe publishable key to initialize Stripe.js
    const stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

    // Select payment button
    const payBtn = document.querySelector("#payButton");

    // Payment request handler
    payBtn.addEventListener("click", function (evt) {
        setLoading(true);

        createCheckoutSession().then(function (data) {
            if (data.sessionId) {
                stripe.redirectToCheckout({
                    sessionId: data.sessionId,
                }).then(handleResult);
            } else {
                handleResult(data);
            }
        });
    });

    // Create a Checkout Session with the selected product
    const createCheckoutSession = function (stripe) {
        <?php $total_purchase = (int)$total_purchase + ((int)$total_purchase * 0.05);?>
        return fetch("payment_init.php?total_purchase=<?php echo $total_purchase; ?>", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                createCheckoutSession: 1,
            }),
        }).then(function (result) {
            return result.json();
        });
    };

    // Handle any errors returned from Checkout
    const handleResult = function (result) {
        if (result.error) {
            showMessage(result.error.message);
        }

        setLoading(false);
    };

    // Show a spinner on payment processing
    function setLoading(isLoading) {
        if (isLoading) {
            // Disable the button and show a spinner
            payBtn.disabled = true;
            document.querySelector("#spinner").classList.remove("hidden");
            document.querySelector("#buttonText").classList.add("hidden");
        } else {
            // Enable the button and hide spinner
            payBtn.disabled = false;
            document.querySelector("#spinner").classList.add("hidden");
            document.querySelector("#buttonText").classList.remove("hidden");
        }
    }

    // Display message
    function showMessage(messageText) {

    }
</script>
</body>
</html>


