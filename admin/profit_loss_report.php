<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
if (!isset($_SESSION['userid'])) {
    header("Location: Login");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Profit-Loss Analysis | Wayshk Admin</title>
    <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <?php include 'include/css.php'; ?>
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
<div id="main-wrapper">

    <?php include 'include/header.php'; ?>

    <?php include 'include/nav.php'; ?>

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <!-- Add Order -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Profit-Loss Report</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display min-w850">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Product Name</th>
                                        <th>Sales Date</th>
                                        <th>Sales Quantity</th>
                                        <th>Total Profit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sum_profit = 0;
                                    $invoice_details = $db_handle->runQuery("SELECT * FROM `invoice_details`");
                                    $row_count = $db_handle->numRows("SELECT * FROM `invoice_details`");

                                    for ($i = 0; $i < $row_count; $i++) {
                                        $product_id = $invoice_details[$i]['product_id'];
                                        $quantity = $invoice_details[$i]['product_quantity'];
                                        $selling_price = $invoice_details[$i]['product_unit_price'];
                                        $product_cost = $db_handle->runQuery("select cost,p_name from product where id = '$product_id'");
                                        $cost = $product_cost[0]['cost'];
                                        $profit = ($selling_price - $cost) * $quantity;
                                        $sum_profit = $sum_profit + $profit;
                                        $product_name = $product_cost[0]['p_name'];
                                        ?>
                                        <tr>
                                            <td><?php echo $i+1;?></td>
                                            <td><?php echo $product_name;?></td>
                                            <td><?php
                                                $date = date_create($invoice_details[$i]["updated_at"]);
                                                $date_formatted = date_format($date, "d F y, g:i A");
                                                echo $date_formatted;
                                                ?></td>
                                            <td><?php echo $quantity;?></td>
                                            <td><?php echo $profit;?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="4" style="font-weight: bold;">Total Profit</td>
                                        <td style="font-weight: bold;"><?php echo $sum_profit;?></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

    <?php include 'include/footer.php'; ?>

</div>
<!--**********************************
    Main wrapper end
***********************************-->

<?php include 'include/js.php'; ?>
<!-- Datatable -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="js/plugins-init/datatables.init.js"></script>
</body>
</html>
