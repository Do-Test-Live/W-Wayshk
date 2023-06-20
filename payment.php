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
    $final_payment_for_stripe = $db_handle->checkValue($_POST['stripe_value']);

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

    if($payment == 'Credit Card') {
        $customer = $_SESSION['id'];
        if($customer != 0){
            $insert_point = $db_handle->insertQuery("INSERT INTO `point`( `customer_id`, `points`, `date`) VALUES ('$customer','$purchase_points','$updated_at')");
        }

    }


    $total_value = 0;

    $orderdetails = '<table class="customTable" style="margin-top: 20px; margin-bottom: 20px;">';
    $orderdetails .= '<thead>
                             <tr>
                                <th>產品名稱</th>
                                <th>產品代碼</th>
                                <th>數量</th>
                                <th>價格</th>
                                <th>合計</th>
                            </tr>
                      </thead>';
    $orderdetails .= '<tbody>';

    $fetch_product_details = $db_handle->runQuery("SELECT * FROM `invoice_details` WHERE `billing_id` = '$id'");
    $no_fetch_product_details = $db_handle->numRows("SELECT * FROM `invoice_details` WHERE `billing_id` = '$id'");

    for($x = 0; $x < $no_fetch_product_details; $x++){
        $orderdetails .= '<tr>';
        $orderdetails .= '<td>' . $fetch_product_details[$x]['product_name'] . '</td>';
        $orderdetails .= '<td>' . $fetch_product_details[$x]['product_id'] . '</td>';
        $orderdetails .= '<td>' . $fetch_product_details[$x]['product_quantity'] . '</td>';
        $orderdetails .= '<td>' . $fetch_product_details[$x]['product_unit_price'] . '</td>';
        $orderdetails .= '<td>' . $fetch_product_details[$x]['product_total_price'] . '</td>';
        $orderdetails .= '</tr>';
    }
    $orderdetails .= '</tbody>';
    $orderdetails .= '<tfoot>';

    $fetch_billing_details = $db_handle->runQuery("SELECT `payment_type`, `shipping_method`, `discount`, `total_purchase`, `delivery_charges` FROM `billing_details` WHERE id='$id'");



    $orderdetails .= '<tr>
                                <td colspan="2">郵寄方式: '. $fetch_billing_details[0]['shipping_method'] .'</td>
                                <td colspan="2">小計</td>
                                <td>'. $fetch_billing_details[0]['total_purchase'] .'</td>
                            </tr>';
    $orderdetails .= '<tr>
                                <td colspan="2">付款方式: '. $fetch_billing_details[0]['payment_type'] .'</td>
                                <td colspan="2">運費</td>
                                <td>'. $fetch_billing_details[0]['delivery_charges'] .'</td>
                            </tr>';

    $final_amount = $fetch_billing_details[0]['delivery_charges'] + $fetch_billing_details[0]['total_purchase'];
    $orderdetails .= '<tr>
                                <td colspan="2"></td>
                                <td colspan="2">全部的</td>
                                <td>'. $final_amount .'</td>
                            </tr>
                            
                            </tfoot>
                        </table>';


    if ($payment != 'Credit Card') {
        $email_to = $email;
        $subject = 'Wayshk活籽兒童用品店：已收到你的訂單';


        $headers = "From: Wayshk <" . $db_handle->from_email() . ">\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";

        $message = <<<HTML
                        <html lang="en">

                        <head>
                            <link rel="preconnect" href="https://fonts.googleapis.com/">
                            <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
                                  rel="stylesheet">
                            <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&amp;display=swap"
                                  rel="stylesheet">
                        
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
                                    background-color: #ffcc18;
                                    border: none;
                                    color: #000;
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
                                    color: #ffcc18;
                                }
                                table.customTable {
                                    width: 100%;
                                    background-color: #FFFFFF;
                                    border-collapse: collapse;
                                    border-width: 2px;
                                    border-color: #ffcc18;
                                    border-style: solid;
                                    color: #000000;
                                }
                                table.customTable td, table.customTable th {
                                    border-width: 1px;
                                    border-color: #ffcc18;
                                    border-style: solid;
                                    padding: 5px;
                                }
                        
                                table.customTable thead {
                                    background-color: #ffcc18;
                                }
                            </style>
                        </head>

                        <body style="margin: 20px auto;">
                            <table align="center" border="0" cellpadding="0" cellspacing="0"
                                   style="background-color: white; width: 100%; box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);-webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);">
                                <!-- Paste the rest of your HTML template code here -->
                                <tbody>
                                <tr>
                                    <td>
                                        <table class="header-table" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr class="header"
                                                style="background-color: #f7f7f7;display: flex;align-items: center;justify-content: space-between;width: 100%;">
                                                <td class="header-logo" style="padding: 10px 32px;">
                                                    <a href="#" style="display: block; text-align: left;">
                                                        <img src="https://wayshk.ngt.hk/assets/images/logo/2.png" class="main-logo" alt="logo" style="width: 120px">
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                            
                                        <table class="contant-table" style="margin-bottom: -6px;" align="center" border="0" cellpadding="0"
                                               cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <td>
                                                    <img src="https://wayshk.ngt.hk/assets/images/welcome-poster.jpg" alt="">
                                                </td>
                                            </tr>
                                            </thead>
                                        </table>
                            
                                        <table class="contant-table" style="margin-top: 40px;" align="center" border="0" cellpadding="0"
                                               cellspacing="0" width="100%">
                                            <thead>
                                            <tr style="display: block;">
                                                <td style="display: block;">
                                                    <h3 style="font-weight: 700; font-size: 20px; margin: 0; text-transform: uppercase; padding: 10px">
                                                        感謝您購買 Wayshk活籽兒童用品店的商品，您的訂單已經建立，我們將在收到您的付款後，盡快處理您的訂單。訂單編號：WHK#01</h3>
                                                </td>
                            
                                                <td style='display: block;'>
                                                    <p style="font-size: 14px;font-weight: 600;width: 82%;margin: 8px auto 0;line-height: 1.5;color: #939393;font-family: 'Nunito Sans', sans-serif;">
                                                        點擊以下連結檢視您的訂單詳情：
                                                    </p>
                                                </td>
                            
                                                <td>
                                                    <table class="button-table" style="margin: 34px 0;" align="center" border="0" cellpadding="0"
                                                           cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr style="display: block;">
                                                            <td style="display: block;">
                                                                <a href='https://wayshk.ngt.hk/print_receipt.php?id=$id' class="password-button" style="margin-left: 60px;"
                                                                   target="_blank">See Details</a>
                                                            </td>
                                                        </tr>
                                                        </thead>
                                                    </table>
                                                </td>
                            
                            
                                                <td style="display: block">
                                                    $orderdetails
                                                </td>
                                                <td style='display: block; margin-left: 20px'>
                                                    <h3>付款方法說明:</h3>
                                                    <h3>(一）選用速遞出貨:</h3>
                                                    <h3>請於7日內，以以下方式付款：<br/><br/></h3>
                                                    <p>
                                                        ⦁ PayMe (電話號碼：5265-7359 WAYSHK )<br/><br/>
                                                        ⦁ 轉數快 (電話號碼：5265-7359 WAYSHK )<br/><br/>
                                                        ⦁ 銀行入數【戶口號碼為 769-334699-883 (恆生銀行) WAYSHK】
                                                        <br/><br/>
                                                        請於付款後，將付款憑證Whatsapp到 +852 5605 8389，並提供訂單編號進行確認。
                                                        亦可直接回覆此電郵。
                                                        <br/><br/>
                                                        *收到款項後，現貨產品送貨期為1星期。若訂單包含預購產品，將會於所有貨品齊全後一併寄出。<br/><br/>
                                                        *七天內如無收到付款證明，訂單將自動取消。<br/><br/>
                                                    </p>
                                                    <h3>(二）選用自取方式出貨</h3>
                                                    <p>請WhatsApp +852 5605 8389 聯絡我們查詢自取點現貨詳情並預約取貨時間。<br/><br/>
                                                        接受PayMe/轉數快/銀行入數/現場現金付款。 <br/><br/>
                                                    </p>
                                                    <h3>自取點A 大圍倉庫</h3>
                                                    <p>
                                                        地址：大圍成運路21-23號群力工業大廈3樓1室<br/><br/>
                                                        大圍火車站A出口右轉，步行約5分鐘<br/><br/>
                                                        開放時間：不定 （10:30 – 18:15）<br/><br/>
                                                        不設現場入內選貨。與我們確認領取時間，到達後致電並於門口交收。<br/><br/>
                                                    </p>
                                                    <h3>自取點B 兒璞兒童學習及發展中心</h3>
                                                    <p>
                                                        地址：灣仔軒尼詩道237-239號25樓<br/><br/>
                                                        灣仔地鐵站A2出口，步行約5分鐘/ 會展站A3出口，步行約6分鐘<br/><br/>
                                                        開放時間： 星期一至五 09:00 - 18:00；星期六 09:00 - 16:00
                                                        【午餐時間 12:30-13:45 不開放】
                                                        <br/><br/>
                                                        電話：2877 8787<br/><br/>
                                                        請必須預約取貨時間。<br/><br/><br/><br/>
                                                    </p>
                            
                                                </td>
                                            </tr>
                                            </thead>
                                        </table>
                            
                            
                                        <table>
                                            <tr>
                                                <td>
                                                    <img src="https://wayshk.ngt.hk/assets/images/wa1.jpg" class="main-logo" alt="logo" style="width: 180px; margin-left: 110px;">
                                                </td>
                                                <td>
                                                    <img src="https://wayshk.ngt.hk/assets/images/wa-2.jpg" class="main-logo" alt="logo" style="width: 180px; margin-left: 50px;">
                                                </td>
                                            </tr>
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
                                                                <h4 style="font-size: 19px; font-weight: 700; margin: 0; color: #FFFFFF">聯絡我們</h4><br/>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td>
                                                                <h5 style="font-size: 13px; text-transform: uppercase; margin: 0; color:#ddd;
                                                            letter-spacing:1px; font-weight: 500;">如你有任何關於此訂單的查詢，請與Wayshk聯繫。</h5>
                                                                <h5 style="font-size: 13px; text-transform: uppercase; margin: 10px 0 0; color:#ddd;
                                                            letter-spacing:1px; font-weight: 500;">香港大圍成運路21-23號群力工業大廈3樓1室</h5>
                                                                <h5 style="font-size: 13px; text-transform: uppercase; margin: 10px 0 0; color:#ddd;
                                                            letter-spacing:1px; font-weight: 500;">產品訂購 WhatsApp +852 56058389/電郵地址wayshk.order@gmail.com</h5>
                                                                <h5 style="font-size: 13px; text-transform: uppercase; margin: 10px 0 0; color:#ddd;
                                                            letter-spacing:1px; font-weight: 500;">其他查詢WhatsApp +85252657359 /電郵地址ways00.hk@gmail.com</h5>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table></body>
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
        return fetch("payment_init.php?total_purchase=<?php echo $final_payment_for_stripe; ?>", {
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


