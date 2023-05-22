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
                                            <input type="text" class="form-control" placeholder="" name="payment_method" required>
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

                                    <table id="example3" class="display min-w850">
                                        <thead>
                                        <tr>
                                            <th>Product Code</th>
                                            <th>Unit Price</th>
                                            <th>QTY</th>
                                            <th>Sub total</th>
                                            <th>Add</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <select name="product" id="mySelect">
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
                                            <td><input type="text" name="unit_price"></td>
                                            <td><input type="text" name="Quantity"></td>
                                            <td><input type="text" name="Sub_total"></td>
                                            <td><button type="button" class="btn btn-primary">Add</button></td>
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

                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary w-50" name="add_cat">Submit</button>
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
<script>
    // Initialize Select2
    $(document).ready(function () {
        $('#mySelect').select2();
    });

</script>

<script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    // Wait for the document to be ready
    $(document).ready(function() {
        // Add an event listener to the 'change' event of the select field
        $('#mySelect').change(function() {
            // Get the selected option value
            var selectedProductId = $(this).val();

            // Send an AJAX request to fetch the unit price from the database
            $.ajax({
                url: 'fetch_unit_price.php', // Replace with the actual URL to your PHP script
                type: 'POST',
                data: { productId: selectedProductId }, // Send the selected product ID as data
                success: function(response) {
                    // Update the unit_price input field with the fetched value
                    $('input[name="unit_price"]').val(response);
                }
            });
        });
    });
</script>

</script>
<?php include 'include/js.php'; ?>


</body>
</html>
