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
    <title>Cash Capital | Wayshk Admin</title>
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
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModalCenter">Add Cash Capital</button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Cash Capital</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Add Category -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="basic-form">
                                                <form action="Insert" method="post" enctype="multipart/form-data">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Date</label>
                                                            <input type="date" class="form-control" placeholder="" name="date" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Amount</label>
                                                            <input type="number" class="form-control" placeholder="" name="amount" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Note</label>
                                                            <textarea class="form-control" name="note"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary w-50" name="add_cash_flow">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModalCenter1">Withdraw Cash Capital</button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter1">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Withdraw Cash Capital</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Add Category -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="basic-form">
                                                <form action="Insert" method="post" enctype="multipart/form-data">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Date</label>
                                                            <input type="date" class="form-control" placeholder="" name="date" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Amount</label>
                                                            <input type="number" class="form-control" placeholder="" name="amount" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Note</label>
                                                            <textarea class="form-control" name="note"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary w-50" name="withdraw_cash_flow">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mt-3">
                <?php if (isset($_GET['cashId'])) { ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Cash Capital</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="Update" enctype="multipart/form-data">

                                        <?php $data = $db_handle->runQuery("SELECT * FROM cash_flow where cash_id={$_GET['cashId']}"); ?>

                                        <input type="hidden" value="<?php echo $data[0]["cash_id"]; ?>" name="id" required>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Date</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="date"
                                                       value="<?php echo $data[0]["date"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Amount</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="amount"
                                                       value="<?php echo $data[0]["amount"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Note</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" name="note"
                                                          value="<?php echo $data[0]["note"]; ?>"></textarea>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-sm-6 mx-auto">
                                                <button type="submit" class="btn btn-primary w-25"
                                                        name="updateCashFlow">Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } elseif (isset($_GET['cashWithdrawId'])){
                    ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Cash Withdraw</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="Update" enctype="multipart/form-data">

                                        <?php $data = $db_handle->runQuery("SELECT * FROM cash_flow_withdraw where cash_withdraw_id = {$_GET['cashWithdrawId']}"); ?>

                                        <input type="hidden" value="<?php echo $data[0]["cash_withdraw_id"];?>" name="id" required>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Date</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="date"
                                                       value="<?php echo $data[0]["date"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Amount</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="amount"
                                                       value="<?php echo $data[0]["amount"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Note</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" name="note"
                                                          value="<?php echo $data[0]["note"]; ?>"></textarea>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-sm-6 mx-auto">
                                                <button type="submit" class="btn btn-primary w-25"
                                                        name="updateCashFlowWithdraw">Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else { ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Cash Capital List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $cashFlow_data = $db_handle->runQuery("SELECT * FROM cash_flow order by cash_id desc");
                                        $row_count = $db_handle->numRows("SELECT * FROM cash_flow order by cash_id desc");

                                        for ($i = 0; $i < $row_count; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <?php
                                                $date = date_create($cashFlow_data[$i]["inserted_at"]);
                                                $date_formatted = date_format($date, "d F y, g:i A");
                                                ?>
                                                <td><?php echo $date_formatted; ?></td>
                                                <td><?php echo $cashFlow_data[$i]["amount"]; ?></td>
                                                <td><?php echo $cashFlow_data[$i]["note"]; ?></td>

                                                <td>
                                                    <div class="d-flex">
                                                        <a href="Cash-Capital?cashId=<?php echo $cashFlow_data[$i]["cash_id"]; ?>"
                                                           class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                    class="fa fa-pencil"></i></a>
                                                        <a onclick="cashFlowDelete(<?php echo $cashFlow_data[$i]["cash_id"]; ?>);"
                                                           class="btn btn-danger shadow btn-xs sharp"><i
                                                                    class="fa fa-trash"></i></a>
                                                    </div>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Cash Capital Withdraw List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $cashFlow_withdraw_data = $db_handle->runQuery("SELECT * FROM cash_flow_withdraw order by cash_withdraw_id desc");
                                        $row_count = $db_handle->numRows("SELECT * FROM cash_flow_withdraw order by cash_withdraw_id desc");

                                        for ($i = 0; $i < $row_count; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <?php
                                                $date = date_create($cashFlow_withdraw_data[$i]["inserted_at"]);
                                                $date_formatted = date_format($date, "d F y, g:i A");
                                                ?>
                                                <td><?php echo $date_formatted; ?></td>
                                                <td><?php echo $cashFlow_withdraw_data[$i]["amount"]; ?></td>
                                                <td><?php echo $cashFlow_withdraw_data[$i]["note"]; ?></td>

                                                <td>
                                                    <div class="d-flex">
                                                        <a href="Cash-Capital?cashWithdrawId=<?php echo $cashFlow_withdraw_data[$i]["cash_withdraw_id"]; ?>"
                                                           class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                    class="fa fa-pencil"></i></a>
                                                        <a onclick="cashFlowWithdrawDelete(<?php echo $cashFlow_withdraw_data[$i]["cash_withdraw_id"]; ?>);"
                                                           class="btn btn-danger shadow btn-xs sharp"><i
                                                                    class="fa fa-trash"></i></a>
                                                    </div>
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
                    <?php
                }
                ?>
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
    function cashFlowDelete(id) {
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
                        cashFlowId: id
                    },
                    success: function (data) {
                        if (data.toString() === 'P') {
                            Swal.fire(
                                'Not Deleted!',
                                'Your have store in this category.',
                                'error'
                            ).then((result) => {
                                window.location = 'Cash-Capital';
                            });
                        } else {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            ).then((result) => {
                                window.location = 'Cash-Capital';
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
                    window.location = 'Cash-Capital';
                });
            }
        })
    }


    function cashFlowWithdrawDelete(id) {
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
                        cashId: id
                    },
                    success: function (data) {
                        if (data.toString() === 'P') {
                            Swal.fire(
                                'Not Deleted!',
                                'Your have store in this category.',
                                'error'
                            ).then((result) => {
                                window.location = 'Cash-Capital';
                            });
                        } else {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            ).then((result) => {
                                window.location = 'Cash-Capital';
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
                    window.location = 'Cash-Capital';
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
