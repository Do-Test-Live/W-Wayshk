<?php
session_start();
date_default_timezone_set("Asia/Hong_Kong");
require_once("include/dbController.php");
$db_handle = new DBController();
if (!isset($_SESSION['userid'])) {
    header("Location: Login");
}
$today = date("F d, Y");

$total = 0;
$currentMonth = $db_handle->checkValue($_POST['month']);
$currentYear = $db_handle->checkValue($_POST['year']);

if($currentMonth == '1'){
    $month = 'January, '. $currentYear;
}elseif ($currentMonth == '2'){
    $month = 'February, '. $currentYear;
}elseif ($currentMonth == '3'){
    $month = 'March, '. $currentYear;
}elseif ($currentMonth == '4'){
    $month = 'April, '. $currentYear;
}elseif ($currentMonth == '5'){
    $month = 'May, '. $currentYear;
}elseif ($currentMonth == '6'){
    $month = 'June, '. $currentYear;
}elseif ($currentMonth == '7'){
    $month = 'July, '. $currentYear;
}elseif ($currentMonth == '8'){
    $month = 'August, '. $currentYear;
}elseif ($currentMonth == '9'){
    $month = 'September, '. $currentYear;
}elseif ($currentMonth == '10'){
    $month = 'October, '. $currentYear;
}elseif ($currentMonth == '11'){
    $month = 'November, '. $currentYear;
}elseif ($currentMonth == '12'){
    $month = 'December, '. $currentYear;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Report Print | Wayshk Admin</title>
    <?php include 'include/css.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

</head>
<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div class="container">
    <div class="row mt-3">
        <div class="col-6">
            <img src="../assets/images/logo/2.png" alt="WaysHK" style="width: 150px;">
        </div>
        <div class="col-6 text-right">
            <h4>Payment Methodwise Monthly Report</h4>
            <h4>For the month of <?php echo $month; ?></h4>
            <h4>Print Date: <?php echo $today; ?></h4>
        </div>
    </div>
</div>

<div class="container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Order No</th>
            <th scope="col">Payment</th>
            <th scope="col">FPS</th>
            <th scope="col">Cash</th>
            <th scope="col">Cheque</th>
            <th scope="col">Stripe</th>
            <th scope="col">PayMe</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $fetch_data = $db_handle->runQuery("SELECT * FROM `billing_details` WHERE `payment_status` = '1' and `delivery_status` = '1' and MONTH(updated_at) = $currentMonth AND YEAR(updated_at) = $currentYear;");
        $no_fetch_data = $db_handle->numRows("SELECT * FROM `billing_details` WHERE `payment_status` = '1' and `delivery_status` = '1' and MONTH(updated_at) = $currentMonth AND YEAR(updated_at) = $currentYear;");
        if ($no_fetch_data > 0) {
            for ($i = 0; $i < $no_fetch_data; $i++) {
                ?>
                <tr>
                    <td>WHK# <?php echo $fetch_data[$i]['id']; ?> </td>
                    <td><?php echo $fetch_data[$i]['total_purchase']; ?></td>
                    <td><?php if ($fetch_data[$i]['payment_type'] == 'Transfer FPS') echo $fetch_data[$i]['total_purchase']; else echo ''; ?></td>
                    <td><?php if ($fetch_data[$i]['payment_type'] == 'Pay by cash when picking up') echo $fetch_data[$i]['total_purchase']; else echo ''; ?></td>
                    <td><?php if ($fetch_data[$i]['payment_type'] == 'Check') echo $fetch_data[$i]['total_purchase']; else echo ''; ?></td>
                    <td><?php if ($fetch_data[$i]['payment_type'] == 'Credit Card') echo $fetch_data[$i]['total_purchase']; else echo ''; ?></td>
                    <td><?php if ($fetch_data[$i]['payment_type'] == 'PayMe') echo $fetch_data[$i]['total_purchase']; else echo ''; ?></td>
                </tr>
                <?php
            }
        }
        $total = $db_handle->runQuery("SELECT SUM(`total_purchase`) as total FROM `billing_details` WHERE `payment_status` = '1' and `delivery_status` = '1' and MONTH(updated_at) = $currentMonth AND YEAR(updated_at) = $currentYear;");
        $transfer_fps = $db_handle->runQuery("SELECT SUM(`total_purchase`) as fps FROM `billing_details` WHERE `payment_type` = 'Transfer FPS' and `payment_status` = '1' and `delivery_status` = '1' and MONTH(updated_at) = $currentMonth AND YEAR(updated_at) = $currentYear;");
        $cash_payment = $db_handle->runQuery("SELECT SUM(`total_purchase`) as cash FROM `billing_details` WHERE `payment_type` = 'Pay by cash when picking up' and `payment_status` = '1' and `delivery_status` = '1' and MONTH(updated_at) = $currentMonth AND YEAR(updated_at) = $currentYear;");
        $check_payment = $db_handle->runQuery("SELECT SUM(`total_purchase`) as cheque FROM `billing_details` WHERE `payment_type` = 'Check' and `payment_status` = '1' and `delivery_status` = '1' and MONTH(updated_at) = $currentMonth AND YEAR(updated_at) = $currentYear;");
        $credit_card = $db_handle->runQuery("SELECT SUM(`total_purchase`) as card FROM `billing_details` WHERE `payment_type` = 'Credit Card' and `payment_status` = '1' and `delivery_status` = '1' and MONTH(updated_at) = $currentMonth AND YEAR(updated_at) = $currentYear;");
        $payme = $db_handle->runQuery("SELECT SUM(`total_purchase`) as pay FROM `billing_details` WHERE `payment_type` = 'PayMe' and `payment_status` = '1' and `delivery_status` = '1' and MONTH(updated_at) = $currentMonth AND YEAR(updated_at) = $currentYear;");
        ?>
        <tr>
            <td>Total</td>
            <td><?php echo $total[0]['total']; ?></td>
            <td><?php echo $transfer_fps[0]['fps']; ?></td>
            <td><?php echo $cash_payment[0]['cash']; ?></td>
            <td><?php echo $check_payment[0]['cheque']; ?></td>
            <td><?php echo $credit_card[0]['card']; ?></td>
            <td><?php echo $payme[0]['pay']; ?></td>
        </tr>
        </tbody>
    </table>

    <div class="text-center">
        <button id="printBtn" class="btn btn-primary">Print</button>
    </div>
</div>
<!--**********************************
    Main wrapper end
***********************************-->
<script>
    // Print button action
    document.getElementById('printBtn').addEventListener('click', function () {
        // Hide the print button during printing
        document.getElementById('printBtn').style.display = 'none';
        window.print();
        // Restore the print button after printing
        document.getElementById('printBtn').style.display = 'block';
    });
</script>

<?php include 'include/js.php'; ?>


</body>
</html>
