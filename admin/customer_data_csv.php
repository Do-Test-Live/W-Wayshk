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
    <title>Customer | Wayshk Admin</title>
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

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <!-- Add Order -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Customer List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Zip Code</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $customer_data = $db_handle->runQuery("SELECT * FROM customer where status = 0 order by id desc");
                                $row_count = $db_handle->numRows("SELECT * FROM customer where status = 0 order by id desc");

                                for ($i = 0; $i < $row_count; $i++) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i + 1; ?></td>
                                        <td><?php echo $customer_data[$i]["customer_name"]; ?></td>
                                        <td><?php echo $customer_data[$i]["email"]; ?></td>
                                        <td><?php echo $customer_data[$i]["number"]; ?></td>
                                        <td><?php echo $customer_data[$i]["address"]; ?></td>
                                        <td><?php echo $customer_data[$i]["city"]; ?></td>
                                        <td><?php echo $customer_data[$i]["zip_code"]; ?></td>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Listed Customers for Promotion</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example4" class="display min-w850">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Zip Code</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $customer_data = $db_handle->runQuery("SELECT * FROM customer where status = 1 order by id desc");
                                $row_count = $db_handle->numRows("SELECT * FROM customer where status = 1 order by id desc");

                                for ($i = 0; $i < $row_count; $i++) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i + 1; ?></td>
                                        <td><?php echo $customer_data[$i]["customer_name"]; ?></td>
                                        <td><?php echo $customer_data[$i]["email"]; ?></td>
                                        <td><?php echo $customer_data[$i]["number"]; ?></td>
                                        <td><?php echo $customer_data[$i]["address"]; ?></td>
                                        <td><?php echo $customer_data[$i]["city"]; ?></td>
                                        <td><?php echo $customer_data[$i]["zip_code"]; ?></td>
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
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example3').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'csv'
            ]
        } );
        $('#example4').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'csv'
            ]
        } );
    } );
</script>

</body>
</html>
