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
    <title>Delivery Charges | Wayshk Admin</title>
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
                <?php if (isset($_GET['deliveryId'])) { ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Delivery Charges</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="Update" enctype="multipart/form-data">

                                        <?php $data = $db_handle->runQuery("SELECT * FROM delivery_charges where delivery_id = {$_GET['deliveryId']}"); ?>

                                        <input type="hidden" value="<?php echo $data[0]["delivery_id"]; ?>" name="id" required>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Min. Delivery Charge</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="min_charge"
                                                       placeholder="Min Charge"
                                                       value="<?php echo $data[0]["min_delivery_charge"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Minimum Charges Applied Upto Weight (GM)</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="weight_upto"
                                                       placeholder="Category Name"
                                                       value="<?php echo $data[0]["weight_upto"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Additional Charge for per GM</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="additional_charges"
                                                       placeholder="Additional Charge"
                                                       value="<?php echo $data[0]["next_per_kg_weight"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Minimum Order for Free Delivery</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="min_order_amount"
                                                       placeholder="Additional Charge"
                                                       value="<?php echo $data[0]["min_order_free_delivery"]; ?>" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-sm-6 mx-auto">
                                                <button type="submit" class="btn btn-primary w-25"
                                                        name="updateDeliveryCharges">Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Delivery Charges</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Min. Delivery Charge</th>
                                            <th>Upto Weight (KG)</th>
                                            <th>Additional Delivery Charges (Per KG)</th>
                                            <th>Min. Order Amount for Free Delivery</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $delivery_charges = $db_handle->runQuery("SELECT * FROM delivery_charges");
                                        $row_count = $db_handle->numRows("SELECT * FROM delivery_charges");

                                        for ($i = 0; $i < $row_count; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo $delivery_charges[$i]["min_delivery_charge"]; ?></td>
                                                <td><?php echo $delivery_charges[$i]["weight_upto"]; ?></td>
                                                <td><?php echo $delivery_charges[$i]["next_per_kg_weight"]; ?></td>
                                                <td><?php echo $delivery_charges[$i]["min_order_free_delivery"]; ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="Delivery-Charges?deliveryId=<?php echo $delivery_charges[$i]["delivery_id"];?>"
                                                           class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-pencil"></i></a>
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
    function categoryDelete(id) {
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
                        catId: id
                    },
                    success: function (data) {
                        if (data.toString() === 'P') {
                            Swal.fire(
                                'Not Deleted!',
                                'Your have store in this category.',
                                'error'
                            ).then((result) => {
                                window.location = 'Category';
                            });
                        } else {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            ).then((result) => {
                                window.location = 'Category';
                            });
                        }
                    }
                });
            } else {
                Swal.fire(
                    'Cancelled!',
                    'Your Category is safe :)',
                    'error'
                ).then((result) => {
                    window.location = 'Category';
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
