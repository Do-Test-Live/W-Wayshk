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
    <title>Defected Products | Wayshk Admin</title>
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
            <!-- Add Category -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Defected Products</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="Insert" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Product Code</label>
                                            <select name="product_id" class="form-control">
                                                <?php
                                                $fetch_product_code = $db_handle->runQuery("SELECT product.product_code,product.id FROM `stock`,`product` WHERE stock.product_id = product.id and stock.quantity > 0");
                                                $no_fetch_product_code = $db_handle->numRows("SELECT product.product_code,product.id FROM `stock`,`product` WHERE stock.product_id = product.id and stock.quantity > 0");
                                                for($i=0; $i<$no_fetch_product_code; $i++){
                                                    ?>
                                                    <option value="<?php echo $fetch_product_code[$i]['id'];?>"><?php echo $fetch_product_code[$i]['product_code'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Quantity</label>
                                            <input type="number" class="form-control" placeholder="" name="quantity" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Note</label>
                                            <textarea class="form-control" name="note" required></textarea>
                                        </div>

                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary w-50" name="defected">Submit</button>
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
