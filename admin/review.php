<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
if (!isset($_SESSION['userid'])) {
    header("Location: Login");
}
date_default_timezone_set("Asia/Hong_Kong");
$inserted_at = date("Y-m-d H:i:s");

if(isset($_GET['catId'])){
    $id = $_GET['catId'];
    $data = $db_handle->insertQuery("UPDATE `review` SET `status`='1' WHERE review_id = '$id'");

    $fetch_details = $db_handle->runQuery("select * from review where review_id = '$id'");
    $customer_id = $fetch_details[0]['customer_id'];
    $points = 200;
    $insert_point = $db_handle->insertQuery("INSERT INTO `point`(`customer_id`, `points`, `date`) VALUES ('$customer_id','$points','$inserted_at')");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Review';
                </script>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Review | Wayshk Admin</title>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">review List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Customer Name</th>
                                            <th>Review</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $review_data = $db_handle->runQuery("select * from customer,review where customer.id=review.customer_id order by review.review_id desc");
                                        $row_count = $db_handle->numRows("select * from customer,review where customer.id=review.customer_id order by review.review_id desc");

                                        for ($i = 0; $i < $row_count; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo $review_data[$i]["customer_name"]; ?></td>
                                                <td><?php echo $review_data[$i]["description"]; ?></td>
                                                <td><a href="<?php echo $review_data[$i]["image"]; ?>" target="_blank">Image</a></td>
                                                <?php
                                                if ($review_data[$i]["status"] == 1) {
                                                    ?>
                                                    <td>Approved</td>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <td>Pending</td>
                                                    <?php
                                                }
                                                ?>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="Review?catId=<?php echo $review_data[$i]["review_id"]; ?>"
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
</body>
</html>
