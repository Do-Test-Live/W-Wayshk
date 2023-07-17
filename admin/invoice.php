<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");
$updated_at = date("Y-m-d");
if (!isset($_SESSION['userid'])) {
    header("Location: Login");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Build Invoice | Wayshk Admin</title>
    <?php include 'include/css.php'; ?>

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

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
            <!-- Add Category -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Prepare Invoice</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="Insert" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Order Date</label>
                                            <input type="text" class="form-control" placeholder="" name="order_date" value="<?php echo $updated_at;?>" required readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Order Number</label>
                                            <input type="text" class="form-control" placeholder="" name="order_number" value="#WHK" required readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Platform</label>
                                            <input type="text" class="form-control" placeholder="" name="platform" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Payment Methods </label>
                                            <select name="payment_method" class="form-control">
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
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Delivery Methods</label>
                                            <input type="text" class="form-control" placeholder="" name="delivery_methods" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Organization Name</label>
                                            <input type="text" class="form-control" placeholder="" name="organization_name">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Contact Person Name</label>
                                            <input type="text" class="form-control" placeholder="" name="c_name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Contact Person Email</label>
                                            <input type="text" class="form-control" placeholder="" name="c_email">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Contact Person No</label>
                                            <input type="text" class="form-control" placeholder="" name="phone">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Address</label>
                                            <textarea type="text" class="form-control" placeholder="" name="address"></textarea>
                                        </div>
                                    </div>

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
                                                        for($i=0; $i<$no_fetch_product; $i++){
                                                            ?>
                                                            <option value="<?php echo $fetch_product[$i]['id'];?>"><?php echo $fetch_product[$i]['product_code'];?></option>
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
                                            <tr>
                                                <th colspan="3">Discount</th>
                                                <th><input type="number" name="discount"></th>
                                            </tr>
                                            <tr>
                                                <th colspan="3">Shipping Fee</th>
                                                <th><input type="number" name="shipping_fee"></th>
                                            </tr>
                                            <tr>
                                                <th colspan="3">Total</th>
                                                <th><input type="number" name="total"></th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary w-50" name="add_invoice">Submit</button>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!--<script>
    // Initialize Select2
    $(document).ready(function () {
        $('.productSelect').select2();
    });

</script>-->

<script>
    $(document).ready(function() {

        // Add event listener to the "Add" button
        $(document).on('click', '.addRow', function() {
            var row = $(this).closest('tr').clone();
            row.find('.addRow').removeClass('addRow').addClass('removeRow').text('Remove');
            $('tbody').append(row);
            $('tbody tr:last').find('.removeRow').not(':first').remove(); // Remove "Remove" button from previous rows
        });


        // Add event listener to the "Remove" button
        $(document).on('click', '.removeRow', function() {
            $(this).closest('tr').remove();
            calculateTotal(); // Recalculate the total when a row is removed
        });

        // Add event listener to the "change" event of the product select field
        $(document).on('change', '.productSelect', function() {
            var selectedProductId = $(this).val();
            var currentRow = $(this).closest('tr');

            // Send an AJAX request to fetch the unit price from the database
            $.ajax({
                url: 'fetch_unit_price.php', // Replace with the actual URL to your PHP script
                type: 'POST',
                data: { productId: selectedProductId }, // Send the selected product ID as data
                success: function(response) {
                    currentRow.find('input[name="unit_price[]"]').val(response);
                    calculateSubtotal(currentRow);
                }
            });
        });

        // Add event listeners to the unit price and quantity fields
        $(document).on('change', 'input[name="unit_price[]"], input[name="quantity[]"]', function() {
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
        $(document).on('change', 'input[name="discount"], input[name="shipping_fee"]', function() {
            calculateTotal();
        });

        // Function to calculate and update the total field
        function calculateTotal() {
            var subtotalSum = 0;
            var discount = parseFloat($('input[name="discount"]').val()) || 0;
            var shippingFee = parseFloat($('input[name="shipping_fee"]').val()) || 0;

            // Iterate over each row and sum up the subtotals
            $('input[name="subtotal[]"]').each(function() {
                var subtotal = parseFloat($(this).val());
                if (!isNaN(subtotal)) {
                    subtotalSum += subtotal;
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

</script>
<?php include 'include/js.php'; ?>


</body>
</html>
