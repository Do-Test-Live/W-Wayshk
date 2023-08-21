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
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet"/>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
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
                            if ($status[0]['approve'] == 3){
                                ?>
                                <div class="basic-form">
                                    <form action="Update" method="post">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <select class="default-select  form-control wide" name="status"
                                                        required>
                                                    <option value='3'>Pending</option>
                                                    <option value='2'>Paid & Accepted</option>
                                                    <option value='1'>Delivered</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <input type="hidden" value="<?php echo $id; ?>" name="billing_id">
                                            <input type="hidden" value="<?php echo $status[0]['email']; ?>"
                                                   name="email">
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
                            } elseif ($status[0]['approve'] == 2){
                            $date = date_create($status[0]["delivery_date"]);
                            $date_formatted = date_format($date, "d F y");
                            ?>
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="text-warning" style="font-weight: bold;">Approximate Delivery
                                        Date: <?php echo $date_formatted; ?></h4>
                                </div>
                            </div>
                            <form action="Update" method="post" class="mt-5">
                                <input type="hidden" value="<?php echo $id; ?>" name="billing_id">
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
                                    <?php
                                    if ($status[0]['approve'] == 3) {
                                        ?>
                                        <th>Action</th>
                                        <?php
                                    }
                                    ?>
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
                                            if ($num_rows > 0) {
                                                if ($stock[0]['quantity'] > 0) {
                                                    echo 'In Stock';
                                                } else {
                                                    echo 'Out of Stock';
                                                }
                                            } else {
                                                echo 'Pre Order';
                                            }
                                            ?></td>
                                        <?php
                                        if ($status[0]['approve'] == 3) {
                                            ?>
                                            <td><a onclick="deleteProduct(<?php echo $invoice_details[$i]["id"]; ?>)"
                                                   class="btn btn-danger shadow btn-xs sharp mr-1" data-toggle="tooltip"
                                                   data-placement="bottom" title="Delete Invoice"><i
                                                            class="fa fa-trash"></i></a></td>
                                            <?php
                                        }
                                        ?>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <h4 class="mt-3">Add new product</h4>
                        <form action="Insert" method="post" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $id;?>" name="billId">
                            <div class="table-responsive">
                                <table id="productTable" class="display min-w850 table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Product Code</th>
                                        <th>Unit Price</th>
                                        <th>QTY</th>
                                        <th>Sub total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="productRow mt-5">
                                        <td>
                                            <select name="product[]" class="productSelect">
                                                <?php
                                                $fetch_product = $db_handle->runQuery("select * from product");
                                                $no_fetch_product = $db_handle->numRows("select * from product");
                                                for ($i = 0; $i < $no_fetch_product; $i++) {
                                                    ?>
                                                    <option value="<?php echo $fetch_product[$i]['id']; ?>"><?php echo $fetch_product[$i]['product_code']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td><input type="text" name="unit_price[]"></td>
                                        <td><input type="text" name="quantity[]"></td>
                                        <td><input type="text" name="subtotal[]"></td>
                                        <td>
                                            <button type="button" class="btn btn-primary addRow">Add</button>
                                            <button type="button" class="btn btn-danger removeRow">Remove</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                        <input type="hidden" name="discount" value="0"></th>
                                        <input type="hidden" name="shipping_fee" value="0">
                                    <tr>
                                        <th colspan="3">Total</th>
                                        <th><input type="number" name="total"></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary w-50" name="custom_product_add">Submit</button>
                            </div>
                        </form>
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

<script>
    function deleteProduct(id) {
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
                        deleteproductId: id
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
<script>
    $(document).ready(function () {

        // Add event listener to the "Add" button
        $(document).on('click', '.addRow', function () {
            var row = $(this).closest('tr').clone();
            row.find('.addRow').removeClass('addRow').addClass('removeRow').text('Remove');
            $('#productTable tbody').append(row);
            $('#productTable tbody tr:last').find('.removeRow').not(':first').remove(); // Remove "Remove" button from previous rows
        });


        // Add event listener to the "Remove" button
        $(document).on('click', '.removeRow', function () {
            $(this).closest('tr').remove();
            calculateTotal(); // Recalculate the total when a row is removed
        });

        // Add event listener to the "change" event of the product select field
        $(document).on('change', '.productSelect', function () {
            var selectedProductId = $(this).val();
            var currentRow = $(this).closest('tr');

            // Send an AJAX request to fetch the unit price from the database
            $.ajax({
                url: 'fetch_unit_price.php', // Replace with the actual URL to your PHP script
                type: 'POST',
                data: {productId: selectedProductId}, // Send the selected product ID as data
                success: function (response) {
                    currentRow.find('input[name="unit_price[]"]').val(response);
                    calculateSubtotal(currentRow);
                }
            });
        });

        // Add event listeners to the unit price and quantity fields
        $(document).on('change', 'input[name="unit_price[]"], input[name="quantity[]"]', function () {
            var currentRow = $(this).closest('tr');
            calculateSubtotal(currentRow);
        });

        // Function to calculate and update the subtotal field in a specific row
        function calculateSubtotal(row) {
            var unitPrice = parseFloat(row.find('input[name="unit_price[]"]').val());
            var quantity = parseFloat(row.find('input[name="quantity[]"]').val());

            // Calculate the subtotal
            var subtotal = unitPrice * quantity;

            // Update the subtotal input field in the current row
            row.find('input[name="subtotal[]"]').val(subtotal);

            calculateTotal(); // Recalculate the total whenever a subtotal is updated
        }

        // Add event listeners to the discount and shipping fee fields
        $(document).on('change', 'input[name="discount"], input[name="shipping_fee"]', function () {
            calculateTotal();
        });

        // Function to calculate and update the total field
        function calculateTotal() {
            var subtotalSum = 0;
            var discount = 0;
            var shippingFee = 0;

            // Iterate over each row and sum up the subtotals
            $('input[name="subtotal[]"]').each(function () {
                var subtotal = parseFloat($(this).val());
                console.log(subtotal);
                if (!isNaN(subtotal)) {
                    subtotalSum += subtotal;
                    console.log(subtotalSum);
                }
            });

            // Calculate the total
            var total = subtotalSum + shippingFee - discount;

            // Update the total input field
            $('input[name="total"]').val(total);
        }

        // Call the calculateTotal function initially to set the initial total value
        calculateTotal();
    });
</script>
</body>
</html>
