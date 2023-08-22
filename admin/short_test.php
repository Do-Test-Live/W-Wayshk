<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
if (!isset($_SESSION['userid'])) {
    header("Location: Login");
}
date_default_timezone_set("Asia/Hong_Kong");
$inserted_at = date("Y-m-d H:i:s");


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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <style>
        #sortable-list li{
            border: 1px solid black;
            font-size: 20px;
            font-weight: 700;
            margin: 10px 0 0 10px;
            padding: 10px;
        }
    </style>
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
                <div class="col-4 text-center">
                    <ul id="sortable-list">
                        <?php
                        $fetch_products = $db_handle->runQuery("select * from product order by order_no");
                        $no_fetch_products = $db_handle->numRows("select * from product order by order_no");
                        for ($i = 0; $i < $no_fetch_products; $i++){
                            ?>
                            <li data-id="<?php echo $fetch_products[$i]['id'];?>"><?php echo $fetch_products[$i]['order_no'];?> - <?php echo $fetch_products[$i]['product_code'];?></li>
                            <?php
                        }
                        ?>
                    </ul>
                    <div class="text-center">
                        <button id="save-button" class="btn btn-primary w-50 mt-5">Submit</button>
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
    document.addEventListener("DOMContentLoaded", function() {
        const sortableList = document.getElementById("sortable-list");
        const saveButton = document.getElementById("save-button");

        // Initialize sortable
        const sortable = new Sortable(sortableList, {
            animation: 150,
            ghostClass: "sortable-ghost",
        });

        // Save the new order
        saveButton.addEventListener("click", function() {
            const itemElements = sortableList.querySelectorAll("li");
            const newOrder = Array.from(itemElements).map(item => item.getAttribute("data-id"));

            // Send the new order to the backend
            saveOrderToBackend(newOrder);
        });

        // Send order to PHP backend using Fetch API
        async function saveOrderToBackend(newOrder) {
            try {
                const response = await fetch("save_order.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({ order: newOrder }),
                });

                if (response.ok) {
                    const data = await response.json();
                    console.log(data.message); // Response from the server
                    alert("Order saved!");
                } else {
                    console.error("Response Error:", response.statusText);
                }
            } catch (error) {
                console.error("Fetch Error:", error);
            }
        }
    });



</script>
</body>
</html>
