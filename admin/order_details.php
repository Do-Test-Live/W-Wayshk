<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
if (!isset($_SESSION['userid'])) {
    header("Location: Login");
}
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Order Details | Wayshk Admin</title>
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
            <!-- Category List -->
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Order Details</h4>
                            </div>
                            <div class="card-body">
                                <?php
                                $status = $db_handle->runQuery("select approve,delivery_date,email from billing_details where id='$id'");
                                if($status[0]['approve'] == 3){
                                    ?>
                                    <div class="basic-form">
                                        <form action="Update" method="post">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Status</label>
                                                <div class="col-sm-9">
                                                    <select class="default-select  form-control wide" name="status"
                                                            required>
                                                        <option value = '3'>Pending</option>
                                                        <option value = '2'>Accepted</option>
                                                        <option value = '1'>Delivered</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <input type="hidden" value="<?php echo $id;?>" name="billing_id">
                                                <input type="hidden" value="<?php echo $status[0]['email'];?>" name="email">
                                                <label class="col-sm-3 col-form-label">Approximate Delivery Date</label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" name="date"
                                                           placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-6 mx-auto">
                                                    <button type="submit" class="btn btn-primary w-25"
                                                            name="delivery">Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                } elseif($status[0]['approve'] == 2){
                                    $date = date_create($status[0]["delivery_date"]);
                                    $date_formatted = date_format($date, "d F y");
                                    ?>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="text-warning" style="font-weight: bold;">Approximate Delivery Date: <?php echo $date_formatted; ?></h4>
                                            </div>
                                        </div>
                                        <form action="Update" method="post" class="mt-5">
                                                <input type="hidden" value="<?php echo $id;?>" name="billing_id">
                                            <div class="mb-3 row">
                                                <div class="col-sm-12 mx-auto">
                                                    <button type="submit" class="btn btn-primary w-25"
                                                            name="approved">Mark As Delivered
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                }
                                ?>

                                <div class="table-responsive mt-5">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Product Name</th>
                                            <th>Product Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total Price</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $invoice_details = $db_handle->runQuery("SELECT * FROM invoice_details where billing_id = '$id'");
                                        $row_count = $db_handle->numRows("SELECT * FROM invoice_details where billing_id = '$id'");

                                        for ($i = 0; $i < $row_count; $i++) {
                                            $product_id = $invoice_details[$i]['product_id'];
                                            ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo $invoice_details[$i]["product_name"]; ?></td>
                                                <td><?php echo $invoice_details[$i]["product_quantity"]; ?></td>
                                                <td><?php echo $invoice_details[$i]["product_unit_price"]; ?></td>
                                                <td><?php echo $invoice_details[$i]["product_total_price"]; ?></td>
                                                <td><?php
                                                    $stock = $db_handle->runQuery("select quantity from stock where product_id = '$product_id'");
                                                    $num_rows = $db_handle->numRows("select quantity from stock where product_id = '$product_id'");
                                                    if($num_rows > 0){
                                                        if($stock[0]['quantity'] > 0){
                                                            echo 'In Stock';
                                                        }else{
                                                            echo 'Out of Stock';
                                                        }
                                                    }else{
                                                        echo 'Pre Order';
                                                    }
                                                    ?></td>
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
