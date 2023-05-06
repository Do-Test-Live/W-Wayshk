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
    <title>Product Analysis | Wayshk Admin</title>
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
                            <h4 class="card-title">Stock Quantity</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display min-w850">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category Name</th>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>Total Sell Quantity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $data = $db_handle->runQuery("SELECT category.c_name, product.p_name,product.product_code, product.id FROM `product`,`category` WHERE product.category_id = category.id");
                                    $row_count = $db_handle->numRows("SELECT category.c_name, product.p_name, product.product_code, product.id FROM `product`,`category` WHERE product.category_id = category.id");

                                    for ($i = 0; $i < $row_count; $i++) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i + 1; ?></td>
                                            <td><?php echo $data[$i]["c_name"]; ?></td>
                                            <td><?php echo $data[$i]["p_name"]; ?></td>
                                            <td><?php echo $data[$i]["product_code"]; ?></td>
                                            <td>
                                                <?php

                                                $product_sell = $db_handle->runQuery("SELECT product_quantity FROM `invoice_details` WHERE product_id = {$data[$i]['id']}");
                                                $row = $db_handle->numRows("SELECT product_quantity FROM `invoice_details` WHERE product_id = {$data[$i]['id']}");

                                                $quantity=0;
                                                for($j=0;$j<$row;$j++){
                                                    $quantity+=$product_sell[$j]["product_quantity"];
                                                }
                                                echo $quantity;
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
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
