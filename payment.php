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
                $purchase_points = -$_POST['points'];
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

        $messege = "
            <html>
                <body style='background-color: #eee; font-size: 16px;'>
                <div style='min-width: 200px; background-color: #ffffff; padding: 20px; margin: auto;'>
                    <h3 style='color:black'>Order Placed Successfully</h3>
                    <p style='color:black;'>
                    Your order is successfully placed. We will inform you about the delivery status soon. Please download the copy of your invoice from: <a href = 'https://wayshk.ngt.hk/print_receipt.php?id=$id' target='_blank'>Here</a>
                    </p>
                </div>
                </body>
            </html>";
        if (mail($email_to, $subject, $messege, $headers)) {

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
                ?>
                echo "
                <script>
                    alert("Your order has been placed successfully! Please check your email for more details.");
                    window.location.href = 'Home';
                </script>";
                <?php
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


