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
    <title>Product | Wayshk Admin</title>
    <!-- Datatable -->
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
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
            <!-- Product List -->
            <div class="row">
                <?php if (isset($_GET['bookID'])) { ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Book Keeping</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="Update" enctype="multipart/form-data">

                                        <?php $data = $db_handle->runQuery("SELECT * FROM book_keeping where bookkeeping_id = {$_GET['bookID']}"); ?>

                                        <input type="hidden" value="<?php echo $data[0]["bookkeeping_id"]; ?>" name="id" required>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Date</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="date"
                                                       placeholder="Date"
                                                       value="<?php echo $data[0]["date"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Store Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="store_name"
                                                       placeholder="Store Name"
                                                       value="<?php echo $data[0]["store_name"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Type</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="type"
                                                       placeholder="Type"
                                                       value="<?php echo $data[0]["type"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Item Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="item_name"
                                                       placeholder="Item Name"
                                                       value="<?php echo $data[0]["item_name"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Amount</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="amount"
                                                       placeholder="Amount"
                                                       value="<?php echo $data[0]["amount"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Payer</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="payer"
                                                       placeholder="Payer"
                                                       value="<?php echo $data[0]["payer"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Payment Method</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="payment_method"
                                                       placeholder="Payment Method"
                                                       value="<?php echo $data[0]["payment_method"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Image</label>
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="images[]" accept="image/png, image/jpeg, image/jpg, application/pdf" multiple>
                                                        <label class="custom-file-label">Choose file (png, jpg, jpeg)</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $image = explode(",",$data[0]['image']);
                                            foreach ($image as $img){
                                                ?>
                                                <div class="col-sm-3">
                                                    <img src="<?php echo $img ?>" class="img-fluid"
                                                         alt=""/>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-sm-6 mx-auto">
                                                <button type="submit" class="btn btn-primary w-25"
                                                        name="updateBook">Submit
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
                                <h4 class="card-title">Book Keeping List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                        <tr>
                                            <th>Receipt No.</th>
                                            <th>Date</th>
                                            <th>Store Name</th>
                                            <th>Type</th>
                                            <th>Item Name</th>
                                            <th>Amount</th>
                                            <th>Payer</th>
                                            <th>Payment methods </th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $bookkeeping = $db_handle->runQuery("SELECT * FROM `book_keeping` order by bookkeeping_id desc");
                                        $no_bookkeeping = $db_handle->numRows("SELECT * FROM `book_keeping` order by bookkeeping_id desc");

                                        for ($i = 0; $i < $no_bookkeeping; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $bookkeeping[$i]['recept_no']; ?></td>
                                                <?php
                                                $date = date_create($bookkeeping[$i]["date"]);
                                                $date_formatted = date_format($date, "d F y");
                                                ?>
                                                <td><?php echo $date_formatted; ?></td>
                                                <td><?php echo $bookkeeping[$i]["store_name"]; ?></td>
                                                <td><?php echo $bookkeeping[$i]["type"]; ?></td>
                                                <td><?php echo $bookkeeping[$i]["item_name"]; ?></td>
                                                <td><?php echo $bookkeeping[$i]["amount"]; ?></td>
                                                <td><?php echo $bookkeeping[$i]["payer"]; ?></td>
                                                <td><?php echo $bookkeeping[$i]["payment_method"]; ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="Book-Keeping?bookID=<?php echo $bookkeeping[$i]["bookkeeping_id"]; ?>"
                                                           class="btn btn-primary shadow btn-xs sharp mr-1">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a onclick="bookDelete(<?php echo $bookkeeping[$i]["bookkeeping_id"]; ?>);"
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
    function bookDelete(id) {
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
                        bookId: id
                    },
                    success: function (data) {
                        if (data.toString() === 'P') {
                            Swal.fire(
                                'Not Deleted!',
                                'error'
                            ).then((result) => {
                                window.location = 'Book-Keeping';
                            });
                        } else {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            ).then((result) => {
                                window.location = 'Book-Keeping';
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
                    window.location = 'Book-Keeping';
                });
            }
        })
    }
</script>
<!-- Datatable -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="js/plugins-init/datatables.init.js"></script>
<script>
    CKEDITOR.replace('product_description');
    CKEDITOR.replace('product_description_en');
</script>
</body>
</html>
