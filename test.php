<?php
session_start();
require_once("admin/include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");
$customer_id = 0;
if (isset($_SESSION['id'])) {
    $customer_id = $_SESSION['id'];
}
$toemail = 'sahamugdho@gmail.com';
$adminemail = 'frogbidofficial@gmail.com';
$payment = 'Cash on Delivery';

$billing_id = $db_handle->runQuery("SELECT * FROM billing_details order by id desc limit 1");
$b_id = $billing_id[0]["id"];


$product_details = $db_handle->runQuery("SELECT * FROM `invoice_details` WHERE `billing_id` = '$b_id'");
$no_product_details = $db_handle->numRows("SELECT * FROM `invoice_details` WHERE `billing_id` = '$b_id'");

// Prepare table HTML
// Prepare table HTML
$tableHtml = '<table style="border-collapse: collapse; width: 100%;">';
$tableHtml .= '<tr>
                    <th style="border: 1px solid #000; padding: 8px; text-align: center;">Product Name</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: center;">Product Quantity</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: center;">Unit Price</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: center;">Total Price</th>
                </tr>';

for ($i = 0; $i < $no_product_details; $i++) {
    $tableHtml .= '<tr>';
    $tableHtml .= '<td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $product_details[$i]['product_name'] . '</td>';
    $tableHtml .= '<td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $product_details[$i]['product_quantity'] . '</td>';
    $tableHtml .= '<td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $product_details[$i]['product_unit_price'] . '</td>';
    $tableHtml .= '<td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $product_details[$i]['product_total_price'] . '</td>';
    $tableHtml .= '</tr>';
}

$tableHtml .= '</table>';
$fetch_customer = $db_handle->runQuery("SELECT `f_name`, `l_name`, `email`, `phone`, `address`, `city`, `zip_code`, `note`FROM `billing_details` WHERE id='$b_id'");
$customer_data = '<p>Customer Name: ' . $fetch_customer[0]['f_name'] . ' ' . $fetch_customer[0]['l_name'] . '</p>';
$customer_data .= '<p>Customer Email: ' . $fetch_customer[0]['email'] . '</p>';
$customer_data .= '<p>Contact Number: ' . $fetch_customer[0]['phone'] . '</p>';
$customer_data .= '<p>Address: ' . $fetch_customer[0]['address'] . '</p>';
$customer_data .= '<p>Note: ' . $fetch_customer[0]['note'] . '</p>';

$payment1 = '<h3>付款方法說明:</h3>';
$payment1 .= ' <h3>(一）選用速遞出貨:</h3>';
$payment1 .= ' <h3>請於7日內，以以下方式付款：</h3>';
$payment1 .= ' <p>⦁ PayMe (電話號碼：5265-7359 WAYSHK )</p>';
$payment1 .= ' <p> ⦁ 轉數快 (電話號碼：5265-7359 WAYSHK )</p>';
$payment1 .= ' <p>⦁ 銀行入數【戶口號碼為 769-334699-883 (恆生銀行) WAYSHK】</p>';
$payment1 .= ' <p> *收到款項後，現貨產品送貨期為1星期。若訂單包含預購產品，將會於所有貨品齊全後一併寄出。</p>';
$payment1 .= ' <p>*七天內如無收到付款證明，訂單將自動取消。</p>';

$payment2 = '<h3>(二）選用自取方式出貨</h3>';
$payment2 .= '<p>請WhatsApp +852 5605 8389 聯絡我們查詢自取點現貨詳情並預約取貨時間。</p>';
$payment2 .= '<p>接受PayMe/轉數快/銀行入數/現場現金付款。</p>';
$payment2 .= '<h3>自取點A 大圍倉庫</h3>';
$payment2 .= '<p>地址：大圍成運路21-23號群力工業大廈3樓1室</p>';
$payment2 .= '<p>大圍火車站A出口右轉，步行約5分鐘</p>';
$payment2 .= '<p>開放時間：不定 （10:30 – 18:15）</p>';
$payment2 .= '<p>不設現場入內選貨。與我們確認領取時間，到達後致電並於門口交收。</p>';
$payment2 .= '<h3>自取點B 兒璞兒童學習及發展中心</h3>';
$payment2 .= '<p>地址：灣仔軒尼詩道237-239號25樓</p>';
$payment2 .= '<p>灣仔地鐵站A2出口，步行約5分鐘/ 會展站A3出口，步行約6分鐘</p>';
$payment2 .= '<p> 開放時間： 星期一至五 09:00 - 18:00；星期六 09:00 - 16:00【午餐時間 12:30-13:45 不開放】</p>';
$payment2 .= '<p>電話：2877 8787</p>';
$payment2 .= '<p>請必須預約取貨時間。</p>';

$button = "<a href='https://wayshk.ngt.hk/print_receipt.php?id=" . $b_id . "' class='password-button' style='margin-left: 60px;' target='_blank'>See Details</a>";

$footer = '<h4 style="font-size: 19px; font-weight: 700; margin: 0;>聯絡我們</h4>';
$footer .= '<h5 style="font-size: 13px; text-transform: uppercase; margin: 0; letter-spacing:1px; font-weight: 500;">如你有任何關於此訂單的查詢，請與Wayshk聯繫。</h5>';
$footer .= '<h5 style="font-size: 13px; text-transform: uppercase; margin: 0; letter-spacing:1px; font-weight: 500;">香港大圍成運路21-23號群力工業大廈3樓1室</h5>';
$footer .= '<h5 style="font-size: 13px; text-transform: uppercase; margin: 0; letter-spacing:1px; font-weight: 500;">產品訂購 WhatsApp +852 56058389/電郵地址wayshk.order@gmail.com</h5>';
$footer .= '<h5 style="font-size: 13px; text-transform: uppercase; margin: 0; letter-spacing:1px; font-weight: 500;">其他查詢WhatsApp +85252657359 /電郵地址ways00.hk@gmail.com</h5>';

$img = '<img src="https://wayshk.ngt.hk/assets/images/welcome-poster.jpg" alt="" style="width: 100%;">';



// Send email
$to = $toemail;
$subject = 'WaysHK';
$message = $img . '<br><br>感謝您購買 Wayshk活籽兒童用品店的商品，您的訂單已經建立，我們將在收到您的付款後，盡快處理您的訂單。訂單編號：WHK' . $b_id .' <br><br>點擊以下連結檢視您的訂單詳情：' . $button . '<br><br>Customer Details:' . $customer_data . '<br><br> Order Details ' . $tableHtml . '<br><br>' . $payment1 . '<br><br>' . $payment2 . '<br><br>' . $footer;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: business@rcrpetsworkshop.com' . "\r\n";

if (mail($to, $subject, $message, $headers)) {
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
        echo "
    <script>
    alert('Your request is received. We will let you know the updates soon!');
    window.location.href = 'Home';
    </script>
    ";
    } else {
        echo "
    <script>
    alert('Something Went Wrong');
    window.location.href = 'Home';
    </script>
    ";
    }
}

?>