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
    <title>Pending Order | Wayshk Admin</title>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Category List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Status</th>
                                    <th>Details</th>
                                    <th>Order No</th>
                                    <th>Platform</th>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Contact No.</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Zip Code</th>
                                    <th>Note</th>
                                    <th>Payment Type</th>
                                    <th>Shipping Method</th>
                                    <th>Total (HKD)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $bill_data = $db_handle->runQuery("SELECT * FROM billing_details where delivery_status = '0' or payment_status = '0' order by id desc");
                                $row_count = $db_handle->numRows("SELECT * FROM billing_details where delivery_status = '0' or payment_status = '0' order by id desc");

                                for ($i = 0; $i < $row_count; $i++) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i + 1; ?></td>
                                        <?php
                                        if ($bill_data[$i]["approve"] == 0) {
                                            ?>
                                            <td>Pending</td>
                                            <?php
                                        } else{
                                            ?>
                                            <td>Approved</td>
                                            <?php
                                        }
                                        ?>
                                        <td>
                                            <div class="d-flex">
                                                <a href="Order-Details?id=<?php echo $bill_data[$i]["id"]; ?>"
                                                   class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                            class="fa fa-eye"></i></a>
                                                <a href="../print_receipt.php?id=<?php echo $bill_data[$i]["id"]; ?>"
                                                   class="btn btn-primary shadow btn-xs sharp mr-1" data-toggle="tooltip" data-placement="bottom" title="Print Receipt"><i
                                                            class="fa fa-print"></i></a>
                                                <a href="print_invoice.php?id=<?php echo $bill_data[$i]["id"]; ?>"
                                                   class="btn btn-primary shadow btn-xs sharp mr-1" data-toggle="tooltip" data-placement="bottom" title="Print Invoice"><i
                                                            class="fa fa-print"></i></a>
                                                <a onclick="deleteInvoice(<?php echo $bill_data[$i]["id"];?>)"
                                                   class="btn btn-danger shadow btn-xs sharp mr-1" data-toggle="tooltip" data-placement="bottom" title="Delete Invoice"><i
                                                            class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                        <td><?php echo '#WHK'.$bill_data[$i]['id'];?></td>
                                        <td><?php echo $bill_data[$i]['platform'];?></td>
                                        <td><?php echo $bill_data[$i]["f_name"] . ' ' . $bill_data[$i]["l_name"]; ?></td>
                                        <td><?php echo $bill_data[$i]["email"]; ?></td>
                                        <td><?php echo $bill_data[$i]["phone"]; ?></td>
                                        <td><?php echo $bill_data[$i]["address"]; ?></td>
                                        <td><?php echo $bill_data[$i]["city"]; ?></td>
                                        <td><?php echo $bill_data[$i]["zip_code"]; ?></td>
                                        <td><?php echo $bill_data[$i]["note"]; ?></td>
                                        <td><?php echo $bill_data[$i]["payment_type"]; ?></td>
                                        <td><?php echo $bill_data[$i]["shipping_method"]; ?></td>
                                        <td><?php echo $bill_data[$i]["total_purchase"]; ?></td>
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

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    function deleteInvoice(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'get',
                    url: 'Delete',
                    data: {
                        invoiceId: id
                    },
                    success: function (data) {
                        if (data.toString() === 'P') {
                            Swal.fire(
                                'Not Deleted!',
                                '',
                                'error'
                            ).then((result) => {
                                window.location = 'Pending-Order';
                            });
                        } else {
                            Swal.fire(
                                'Deleted!',
                                'Invoice data has been deleted.',
                                'success'
                            ).then((result) => {
                                window.location = 'Pending-Order';
                            });
                        }
                    }
                });
            } else {
                Swal.fire(
                    'Cancelled!',
                    'Your Data is safe :)',
                    'error'
                ).then((result) => {
                    window.location = 'Pending-Order';
                });
            }
        })
    }
</script>
<!-- Datatable -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="js/plugins-init/datatables.init.js"></script>
</body>
</html>
