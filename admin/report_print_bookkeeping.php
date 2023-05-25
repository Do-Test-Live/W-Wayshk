<?php
session_start();
date_default_timezone_set("Asia/Hong_Kong");
require_once("include/dbController.php");
$db_handle = new DBController();
if (!isset($_SESSION['userid'])) {
    header("Location: Login");
}
$today = date("F d, Y");

if(isset($_POST['overallBookReport'])){
    $fdate = $db_handle->checkValue($_POST['fdate']);
    $tdate = $db_handle->checkValue($_POST['tdate']);

    $formattedFdate = date("F d, Y", strtotime($fdate));
    $formattedTdate = date("F d, Y", strtotime($tdate));

    $fetch_book = $db_handle->runQuery("SELECT * FROM `book_keeping` WHERE date BETWEEN '$fdate' AND '$tdate'");
    $no_fetch_book = $db_handle->numRows("SELECT * FROM `book_keeping` WHERE date BETWEEN '$fdate' AND '$tdate'");
}

if(isset($_POST['paymentBookReport'])){
    $fdate = $db_handle->checkValue($_POST['fdate']);
    $tdate = $db_handle->checkValue($_POST['tdate']);
    $payment_methods = $db_handle->checkValue($_POST['payment_methods']);

    $formattedFdate = date("F d, Y", strtotime($fdate));
    $formattedTdate = date("F d, Y", strtotime($tdate));

    $fetch_book = $db_handle->runQuery("SELECT * FROM `book_keeping` WHERE date BETWEEN '$fdate' AND '$tdate' AND payment_method = '$payment_methods'");
    $no_fetch_book = $db_handle->numRows("SELECT * FROM `book_keeping` WHERE date BETWEEN '$fdate' AND '$tdate' AND payment_method = '$payment_methods'");
}

if(isset($_POST['typeBookReport'])){
    $fdate = $db_handle->checkValue($_POST['fdate']);
    $tdate = $db_handle->checkValue($_POST['tdate']);
    $type = $db_handle->checkValue($_POST['type']);

    $formattedFdate = date("F d, Y", strtotime($fdate));
    $formattedTdate = date("F d, Y", strtotime($tdate));

    $fetch_book = $db_handle->runQuery("SELECT * FROM `book_keeping` WHERE date BETWEEN '$fdate' AND '$tdate' AND `type` = '$type'");
    $no_fetch_book = $db_handle->numRows("SELECT * FROM `book_keeping` WHERE date BETWEEN '$fdate' AND '$tdate' AND `type` = '$type'");
}

if(isset($_POST['payerBookReport'])){
    $fdate = $db_handle->checkValue($_POST['fdate']);
    $tdate = $db_handle->checkValue($_POST['tdate']);
    $payer = $db_handle->checkValue($_POST['payer']);

    $formattedFdate = date("F d, Y", strtotime($fdate));
    $formattedTdate = date("F d, Y", strtotime($tdate));

    $fetch_book = $db_handle->runQuery("SELECT * FROM `book_keeping` WHERE date BETWEEN '$fdate' AND '$tdate' AND payer = '$payer'");
    $no_fetch_book = $db_handle->numRows("SELECT * FROM `book_keeping` WHERE date BETWEEN '$fdate' AND '$tdate' AND payer = '$payer'");
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
            <h4>Book Keeping Report</h4>
            <h4>From <?php echo $formattedFdate;?> To <?php echo $formattedTdate;?></h4>
            <h4>Print Date: <?php echo $today;?></h4>
        </div>
    </div>
</div>

<div class="container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Receipt Number</th>
            <th scope="col">Date</th>
            <th scope="col">Store Name</th>
            <th scope="col">Type</th>
            <th scope="col">Item Name</th>
            <th scope="col">Amount</th>
            <th scope="col">Payer</th>
            <th scope="col">Payment Method</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($no_fetch_book > 0){
            for ($i=0; $i < $no_fetch_book; $i++){
                ?>
                <tr>
                    <th scope="row"><?php echo $fetch_book[0]['recept_no'];?></th>
                    <td><?php echo $fetch_book[0]['date'];?></td>
                    <td><?php echo $fetch_book[0]['store_name'];?></td>
                    <td><?php echo $fetch_book[0]['type'];?></td>
                    <td><?php echo $fetch_book[0]['item_name'];?></td>
                    <td><?php echo $fetch_book[0]['amount'];?></td>
                    <td><?php echo $fetch_book[0]['payer'];?></td>
                    <td><?php echo $fetch_book[0]['payment_method'];?></td>
                </tr>
                <?php
            }
        }
        ?>
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
