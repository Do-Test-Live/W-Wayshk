<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
if (!isset($_SESSION['userid'])) {
    header("Location: Login");
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Add Product | Wayshk Admin</title>
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
            <!-- Add Product -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Book Keeping</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="Report_Print-Book" method="post" enctype="multipart/form-data">
                                    <h4>Over All Expense Report</h4>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label>Form Date</label>
                                            <input type="date" class="form-control" name="fdate">
                                        </div>
                                        <div class="col-md-6">
                                            <label>To Date</label>
                                            <input type="date" class="form-control" name="tdate">
                                        </div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" name="overallBookReport" class="btn btn-primary w-50">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="basic-form mt-5">
                                <form action="Report_Print-Book" method="post" enctype="multipart/form-data">
                                    <h4>Payment Method Wise Expense Report</h4>
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <label>Form Date</label>
                                            <input type="date" class="form-control" name="fdate">
                                        </div>
                                        <div class="col-md-4">
                                            <label>To Date</label>
                                            <input type="date" class="form-control" name="tdate">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Payment Methods </label>
                                            <select name="payment_methods" class="form-control">
                                                <option value="PayMe" selected>PayMe</option>
                                                <option value="FPS">FPS</option>
                                                <option value="Credit Card">Credit Card</option>
                                                <option value="Alipay">Alipay</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Direct Bank Transfer">Direct Bank Transfer</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" name="paymentBookReport" class="btn btn-primary w-50">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="basic-form mt-5">
                                <form action="Report_Print-Book" method="post" enctype="multipart/form-data">
                                    <h4>Type Wise Expense Report</h4>
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <label>Form Date</label>
                                            <input type="date" class="form-control" name="fdate">
                                        </div>
                                        <div class="col-md-4">
                                            <label>To Date</label>
                                            <input type="date" class="form-control" name="tdate">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Type</label>
                                            <select name="type" class="form-control">
                                                <option value="Restock" selected>Restock</option>
                                                <option value="Restock Shipping">Restock Shipping</option>
                                                <option value="Shipping">Shipping</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Salary">Salary</option>
                                                <option value="Rent">Rent</option>
                                                <option value="Promotions">Promotions</option>
                                                <option value="Office Use">Office Use</option>
                                                <option value="Packing">Packing</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" name="typeBookReport" class="btn btn-primary w-50">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="basic-form mt-5">
                                <form action="Report_Print-Book" method="post" enctype="multipart/form-data">
                                    <h4>Payer Wise Expense Report</h4>
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <label>Form Date</label>
                                            <input type="date" class="form-control" name="fdate">
                                        </div>
                                        <div class="col-md-4">
                                            <label>To Date</label>
                                            <input type="date" class="form-control" name="tdate">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Payer</label>
                                            <input type="text" class="form-control" name="payer">
                                        </div>
                                    </div>
                                    <div class="text-center mt-3">
                                        <button type="submit" name="payerBookReport" class="btn btn-primary w-50">Submit</button>
                                    </div>
                                </form>
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


</body>
</html>
