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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.21.0/ckeditor.js" integrity="sha512-ff67djVavIxfsnP13CZtuHqf7VyX62ZAObYle+JlObWZvS4/VQkNVaFBOO6eyx2cum8WtiZ0pqyxLCQKC7bjcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                                <form action="Insert" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Receipt No. </label>
                                            <?php
                                            $fetch_no = $db_handle->runQuery("select bookkeeping_id from book_keeping order by bookkeeping_id desc limit 1");
                                            if(is_null($fetch_no)){
                                                $serial = 1;
                                            }else{
                                                $serial = $fetch_no[0]['bookkeeping_id'] + 1;
                                            }
                                            ?>
                                            <input type="text" class="form-control" value="00<?php echo $serial;?>" name="recept_no" placeholder="" required readonly>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Date</label>
                                            <input type="date" class="form-control" name="date" placeholder="" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Store Name</label>
                                            <input type="text" class="form-control" name="store_name" placeholder="" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Type</label>
                                            <input type="text" class="form-control" name="type" placeholder="" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Item Name</label>
                                            <input type="text" class="form-control" name="item_name" placeholder="" required>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Amount</label>
                                            <input type="number" class="form-control" placeholder="" name="amount" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Payer</label>
                                            <input type="text" class="form-control" placeholder="" name="payer" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Payment Methods</label>
                                            <input type="text" class="form-control" placeholder="" name="payment_methods" required>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Receipt Upload</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="bimage[]" multiple required>
                                                    <label class="custom-file-label">Choose file</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="add_bookkeeping" class="btn btn-primary w-50">Submit</button>
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

<script>
    CKEDITOR.replace('product_description');
    CKEDITOR.replace('product_description_en');
</script>

</body>
</html>
