<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");

if (isset($_POST["add_cat"])) {
    $name = $db_handle->checkValue($_POST['cat_name']);
    $name_cn = $db_handle->checkValue($_POST['cat_name_cn']);
    $image = '';
    if (!empty($_FILES['cat_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['cat_image']['name'];
        $file_size = $_FILES['cat_image']['size'];
        $file_tmp  = $_FILES['cat_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg") {
            $attach_files = '';
            echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Add-Category';
                </script>";

        } else {
            move_uploaded_file($file_tmp, "assets/cat_img/" . $file_name);
            $image = "assets/cat_img/" . $file_name;
        }
    }

    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db_handle->insertQuery("INSERT INTO `category`(`c_name`,`c_name_en`, `image`,  `inserted_at`) VALUES ('$name_cn','$name','$image','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Category';
                </script>";
}

if (isset($_POST["add_product"])) {
    $product_name = $db_handle->checkValue($_POST['product_name']);
    $product_name_en = $db_handle->checkValue($_POST['product_name_en']);
    $product_code = $db_handle->checkValue($_POST['product_code']);
    $product_weight = $db_handle->checkValue($_POST['product_weight']);
    $product_category = $db_handle->checkValue($_POST['product_category']);
    $selling_price = $db_handle->checkValue($_POST['selling_price']);
    $cost = $db_handle->checkValue($_POST['cost']);
    $product_status = $db_handle->checkValue($_POST['product_status']);
    $today_deal = $db_handle->checkValue($_POST['today_deal']);
    $product_description = $db_handle->checkValue($_POST['product_description']);
    $product_description_en = $db_handle->checkValue($_POST['product_description_en']);
    $inserted_at = date("Y-m-d H:i:s");

    $products_image='';
    $arr = array();
    if (!empty($_FILES['product_image']['name'][0])) {
        $RandomAccountNumber = mt_rand(1, 99999);

        foreach ($_FILES['product_image']['name'] as $key => $tmp_name) {

            $file_name = $RandomAccountNumber.$key."_" . $_FILES['product_image']['name'][$key];
            $file_size = $_FILES['product_image']['size'][$key];
            $file_tmp = $_FILES['product_image']['tmp_name'][$key];
            $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg") {
                $products_image = '';
            } else {
                move_uploaded_file($file_tmp, "assets/products_image/" .$file_name);
                $arr[] = "assets/products_image/" . $file_name;
            }
        }
        $products_image = implode(',', $arr);
    } else {
        $products_image = '';
    }

    $insert = $db_handle->insertQuery("INSERT INTO `product` (`category_id`, `product_code`,`product_weight`, `p_name`,`p_name_en`,`product_price`, `description`,`description_en`, `p_image`,`status`, `inserted_at`,`cost`,`deal_today`) VALUES 
                ('$product_category','$product_code','$product_weight','$product_name','$product_name_en','$selling_price','$product_description','$product_description_en','$products_image','$product_status','$inserted_at','$cost','$today_deal')");
    if($insert){
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Product';
                </script>";
    }


}

if(isset($_POST['add_course'])){
    $course_name = $db_handle->checkValue($_POST['course_name']);
    $course_name_en = $db_handle->checkValue($_POST['course_name_en']);
    $course_type = $db_handle->checkValue($_POST['course_type']);
    $course_duration = $db_handle->checkValue($_POST['course_duration']);
    $course_price = $db_handle->checkValue($_POST['course_price']);
    $course_price_poor = $db_handle->checkValue($_POST['course_price_poor']);
    $course_description = $db_handle->checkValue($_POST['course_description']);
    $course_description_en = $db_handle->checkValue($_POST['course_description_en']);
    $inserted_at = date("Y-m-d H:i:s");

    $image = '';
    if (!empty($_FILES['course_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['course_image']['name'];
        $file_size = $_FILES['course_image']['size'];
        $file_tmp  = $_FILES['course_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg") {
            echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Add-Category';
                </script>";

        } else {
            move_uploaded_file($file_tmp, "assets/course/" . $file_name);
            $image = "assets/course/" . $file_name;
        }
    }

    $insert = $db_handle->insertQuery("INSERT INTO `course`(`course_name`,`course_name_en`, `course_duration`, `course_description`,`course_description_en`,`course_image`, `inserted_at`,`course_price`,`course_price_poor`,`course_type`) VALUES ('$course_name','$course_name_en','$course_duration','$course_description','$course_description_en','$image','$inserted_at','$course_price','$course_price_poor','$course_type')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Course';
                </script>";
}

if(isset($_POST['add_promo_code'])){
    $coupon_name = $db_handle->checkValue($_POST['coupon_name']);
    $coupon_code = $db_handle->checkValue($_POST['coupon_code']);
    $promo_type = $db_handle->checkValue($_POST['promo_type']);
    $coupon_amount = $db_handle->checkValue($_POST['coupon_amount']);
    $start_date = $db_handle->checkValue($_POST['start_date']);
    $expirey_date = $db_handle->checkValue($_POST['expirey_date']);
    $coupon_description = $db_handle->checkValue($_POST['coupon_description']);
    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db_handle->insertQuery("INSERT INTO `promo_code`(`coupon_name`, `description`, `code`, `coupon_type`, `amount`, `start_date`, `expirey_date`, `inserted_at`) 
VALUES ('$coupon_name','$coupon_description','$coupon_code','$promo_type','$coupon_amount','$start_date','$expirey_date','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Promo-Code';
                </script>";

}

if (isset($_POST["admin_insert"])) {
    $admin_name = $db_handle->checkValue($_POST['admin_name']);
    $admin_role = $db_handle->checkValue($_POST['admin_role']);
    $admin_email = $db_handle->checkValue($_POST['admin_email']);
    $password = $db_handle->checkValue($_POST['password']);
    $image = '';
    if (!empty($_FILES['admin_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['admin_image']['name'];
        $file_size = $_FILES['admin_image']['size'];
        $file_tmp  = $_FILES['admin_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg") {
            $attach_files = '';
            echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Add-Category';
                </script>";

        } else {
            move_uploaded_file($file_tmp, "assets/admin/" . $file_name);
            $image = "assets/admin/" . $file_name;
        }
    }

    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db_handle->insertQuery("INSERT INTO `admin_login`(`name`, `image`, `email`, `password`, `role`) VALUES ('$admin_name','$image','$admin_email','$password',' $admin_role')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Admin';
                </script>";
}

if(isset($_POST['customer_signup'])){
    $customer_name = $db_handle->checkValue($_POST['customer_name']);
    $customer_email = $db_handle->checkValue($_POST['customer_email']);
    $password = $db_handle->checkValue($_POST['password']);
    $customer_number = $db_handle->checkValue($_POST['customer_number']);
    $membership_point = 200;
    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db_handle->insertQuery("INSERT INTO `customer`(`customer_name`, `email`, `number`, `password`, `inserted_at`,`membership_point`) 
VALUES ('$customer_name','$customer_email','$customer_number','$password','$inserted_at','$membership_point')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='../login.php';
                </script>";
}


if(isset($_POST['add_quantity'])){
    $category_id = $db_handle->checkValue($_POST['category_id']);
    $product_id = $db_handle->checkValue($_POST['product_id']);
    $product_quantity = $db_handle->checkValue($_POST['product_quantity']);

    $inserted_at = date("Y-m-d H:i:s");

    $check_value = $db_handle->runQuery("SELECT `quantity` FROM `stock` WHERE category_id='$category_id' AND product_id='$product_id'");
    $row = $db_handle->numRows("SELECT `quantity` FROM `stock` WHERE category_id='$category_id' AND product_id='$product_id'");
    if($row > 0){
        for($i=0; $i<$row; $i++){
            $previous_quantity = $check_value[$i]['quantity'];
        }
        $updated_quantity = $product_quantity + $previous_quantity;
        $update = $db_handle ->insertQuery("UPDATE `stock` SET `quantity`='$updated_quantity',`inserted_at`='$inserted_at' WHERE category_id='$category_id' AND product_id='$product_id'");
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Stock';
                </script>";
    }else{
        $insert_stock = $db_handle->insertQuery("INSERT INTO `stock`(`category_id`, `product_id`, `quantity`, `inserted_at`) VALUES ('$category_id','$product_id','$product_quantity','$inserted_at')");
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Stock';
                </script>";
    }
}