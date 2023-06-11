<?php
session_start();
require_once("admin/include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");
$customer_id = 0;
if (isset($_SESSION['id'])) {
    $customer_id = $_SESSION['id'];
}
$id = 2;
?>

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
                                style="font-weight: 700; font-size: 20px; margin: 0; text-transform: uppercase; padding: 10px">
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
                                    <a href='https://wayshk.ngt.hk/print_receipt.php?id=$id' class="password-button"
                                       target="_blank">See Details</a>
                                </td>
                            </tr>
                            </thead>
                        </table>
                    </td>


                    <td style="display: block">
                        <table class="customTable" style="margin-top: 20px; margin-bottom: 20px;">
                            <thead>
                            <tr>
                                <th>產品名稱</th>
                                <th>產品代碼</th>
                                <th>數量</th>
                                <th>價格</th>
                                <th>合計</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>紅色/軟 治療膠4oz</td>
                                <td>PU4R</td>
                                <td>3</td>
                                <td>100.00</td>
                                <td>300.00</td>
                            </tr>
                            <tr>
                                <td>太空人訓練轉板</td>
                                <td>SI15</td>
                                <td>5</td>
                                <td>3200.00</td>
                                <td>16000.00</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2">郵寄方式: Home</td>
                                <td colspan="2">小計</td>
                                <td>16300.00 HKD</td>
                            </tr>
                            <tr>
                                <td colspan="2">付款方式: Credit Card</td>
                                <td colspan="2">運費</td>
                                <td>0.00 HKD</td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">全部的</td>
                                <td>16300 HKD</td>
                            </tr>
                            </tfoot>
                        </table>
                    </td>
                    <td style='display: block;'>
                        <p style="font-size: 14px;font-weight: 600;width: 82%;margin: 8px auto 0;line-height: 1.5;color: #939393;font-family: 'Nunito Sans', sans-serif;">
                            選用速遞出貨客人：
                            付款方式：
                            PayMe (號碼：5265-7359 WAYSHK )
                            轉數快 (號碼：5265-7359 WAYSHK )
                            銀行入數【戶口號碼為 769-334699-883 (恆生銀行) WAYSHK】
                            請於下單後WhatsApp 付款憑證到 +852 5605 8389，
                            並提供訂單編號進行確認。 
                            *現貨產品送貨期為1星期。若訂單包含預購產品，將會於所有貨品齊全後一併寄出。

                        </p>
                    </td>
                </tr>
                </thead>
            </table>

            <table class="contant-table" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                <tr style="display: block;">
                    <td style="display: block;">
                        <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">付款方法說明</p>
                        <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">（一）選用速遞出貨
                            請於7日內，以以下方式付款：</p>
                        <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">⦁ PayMe (電話號碼：5265-7359 WAYSHK )</p>
                        <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">⦁ 轉數快 (電話號碼：5265-7359 WAYSHK )</p>
                        <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">⦁ 銀行入數【戶口號碼為 769-334699-883 (恆生銀行) WAYSHK】
                        </p>
                        <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">⦁ 請於付款後，將付款憑證Whatsapp到 +852 5605 8389，並提供訂單編號進行確認。
                            亦可直接回覆此電郵。
                        </p>
                    </td>

                    <td>
                        <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">
                            *收到款項後，現貨產品送貨期為1星期。若訂單包含預購產品，將會於所有貨品齊全後一併寄出。
                        </p>
                        <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">
                            *七天內如無收到付款證明，訂單將自動取消。
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">
                            （二）選用自取方式出貨
                        </p>
                        <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">
                            請WhatsApp +852 5605 8389 聯絡我們查詢自取點現貨詳情並預約取貨時間。
                            接受PayMe/轉數快/銀行入數/現場現金付款。
                        </p>
                    </td>
                </tr>
                <tr>
                    <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">
                        自取點A 大圍倉庫
                    </p>
                    <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">
                        地址：大圍成運路21-23號群力工業大廈3樓1室
                    </p>
                    <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">
                        大圍火車站A出口右轉，步行約5分鐘
                    </p>
                    <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">
                        開放時間：不定 （10:30 – 18:15）
                    </p>
                    <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">
                        不設現場入內選貨。與我們確認領取時間，到達後致電並於門口交收。
                    </p>
                </tr>
                <tr>
                    <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">
                        自取點B 兒璞兒童學習及發展中心
                    </p>
                    <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">
                        地址：灣仔軒尼詩道237-239號25樓
                    </p>
                    <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">
                        灣仔地鐵站A2出口，步行約5分鐘/ 會展站A3出口，步行約6分鐘
                        開放時間： 星期一至五 09:00 - 18:00；星期六 09:00 - 16:00
                        【午餐時間 12:30-13:45 不開放】

                    </p>
                    <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">
                        開放時間： 星期一至五 09:00 - 18:00；星期六 09:00 - 16:00
                        【午餐時間 12:30-13:45 不開放】
                    </p>
                    <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">
                        【午餐時間 12:30-13:45 不開放】
                    </p>
                    <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">
                        電話：2877 8787
                    </p>
                    <p style="font-size: 14px; font-weight: 600; width: 82%; margin: 0 auto; line-height: 1.5; color: #939393; font-family: 'Nunito Sans', sans-serif;">
                        請必須預約取貨時間。
                    </p>
                </tr>
                </thead>
            </table>
            <table>
                <tr>
                    <td>
                        <img src="https://wayshk.ngt.hk/assets/images/wa1.jpg" class="main-logo" alt="logo" style="width: 180px; margin-left: 50px;">
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
                                    <h4 style="font-size: 19px; font-weight: 700; margin: 0; color: #FFFFFF">聯絡我們</h4>
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
</table>
</body>

</html>