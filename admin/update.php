<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();

date_default_timezone_set("Asia/Hong_Kong");

if (!isset($_SESSION["userid"])) {
    echo "<script>
                window.location.href='Login';
                </script>";
}

if (isset($_POST['updateCategory'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $name = $db_handle->checkValue($_POST['c_name']);
    $name_en = $db_handle->checkValue($_POST['c_name_en']);
    $status = $db_handle->checkValue($_POST['status']);
    $image = '';
    $query = '';
    if (!empty($_FILES['cat_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['cat_image']['name'];
        $file_size = $_FILES['cat_image']['size'];
        $file_tmp = $_FILES['cat_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif") {
            $image = '';
        } else {
            $data = $db_handle->runQuery("select * FROM `category` WHERE id='{$id}'");
            unlink($data[0]['image']);
            move_uploaded_file($file_tmp, "assets/cat_img/" . $file_name);
            $image = "assets/cat_img/" . $file_name;
            $query .= ",`image`='" . $image . "'";
        }
    }

    $data = $db_handle->insertQuery("update category set c_name='$name',`c_name_en` = '$name_en', status='$status'" . $query . " where id={$id}");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Category';
                </script>";


}


if (isset($_POST['updateProduct'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $p_name = $db_handle->checkValue($_POST['p_name']);
    $p_name_en = $db_handle->checkValue($_POST['p_name_en']);
    $product_code = $db_handle->checkValue($_POST['p_code']);
    $product_description = $db_handle->checkValue($_POST['product_description']);
    $product_description_en = $db_handle->checkValue($_POST['product_description_en']);
    $product_category = $db_handle->checkValue($_POST['product_category']);
    $status = $db_handle->checkValue($_POST['status']);
    $product_price = $db_handle->checkValue($_POST['product_price']);
    $cost = $db_handle->checkValue($_POST['cost']);
    $product_weight = $db_handle->checkValue($_POST['product_weight']);

    $updated_at = date("Y-m-d H:i:s");

    $data = $db_handle->insertQuery("UPDATE `product` SET `category_id`='$product_category',`product_code`='$product_code',`p_name`='$p_name',`description`='$product_description',`description_en` = '$product_description_en',
                     `status`='$status',`updated_at`='$updated_at',`product_price`='$product_price',`p_name_en` = '$p_name_en',`cost` = '$cost',`product_weight` = '$product_weight' WHERE id={$id}");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Product';
                </script>";
}

if (isset($_POST['updateCourse'])) {
    $course_id = $db_handle->checkValue($_POST['id']);
    $course_name = $db_handle->checkValue($_POST['course_name']);
    $course_name_en = $db_handle->checkValue($_POST['course_name_en']);
    $course_duration = $db_handle->checkValue($_POST['course_duration']);
    $course_price = $db_handle->checkValue($_POST['course_price']);
    $course_description = $db_handle->checkValue($_POST['course_description']);
    $course_description_en = $db_handle->checkValue($_POST['course_description_en']);
    $status = $db_handle->checkValue($_POST['status']);
    $updated_at = date("Y-m-d H:i:s");
    $image = '';
    $query = '';
    if (!empty($_FILES['course_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['course_image']['name'];
        $file_size = $_FILES['course_image']['size'];
        $file_tmp = $_FILES['course_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif") {
            $image = '';
        } else {
            $data = $db_handle->runQuery("select * FROM `course` WHERE course_id='{$course_id}'");
            unlink($data[0]['course_image']);
            move_uploaded_file($file_tmp, "assets/course/" . $file_name);
            $image = "assets/course/" . $file_name;
            $query .= ",`course_image`='" . $image . "'";
        }
    }

    $data = $db_handle->insertQuery("UPDATE `course` SET `course_name`='$course_name',`course_name_en`='$course_name_en',`course_duration`='$course_duration',`course_price`='$course_price',`course_description`='$course_description',`course_description_en`='$course_description_en',`status`='$status',`updated_at`='$updated_at'" . $query . " WHERE course_id='{$course_id}'");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Course';
                </script>";
}


if (isset($_POST['update_promo_code'])) {
    $promo_id = $db_handle->checkValue($_POST['id']);
    $updated_at = date("Y-m-d H:i:s");
    $coupon_name = $db_handle->checkValue($_POST['coupon_name']);
    $coupon_code = $db_handle->checkValue($_POST['coupon_code']);
    $coupon_type = $db_handle->checkValue($_POST['coupon_type']);
    $coupon_amount = $db_handle->checkValue($_POST['coupon_amount']);
    $start_date = $db_handle->checkValue($_POST['start_date']);
    $expirey_date = $db_handle->checkValue($_POST['expirey_date']);
    $description = $db_handle->checkValue($_POST['description']);
    $status = $db_handle->checkValue($_POST['status']);

    $data = $db_handle->insertQuery("UPDATE `promo_code` SET `coupon_name`='$coupon_name',`description`='$description',`code`='$coupon_code',`coupon_type`='$coupon_type',`amount`='$coupon_amount',
                        `start_date`='$start_date',`expirey_date`='$expirey_date',`status`='$status',`updated_at`='$updated_at' WHERE id={$promo_id}");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Promo-Code';
                </script>";
}

if (isset($_POST['updateAdmin'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $name = $db_handle->checkValue($_POST['name']);
    $email = $db_handle->checkValue($_POST['email']);
    $role = $db_handle->checkValue($_POST['role']);
    $password = $db_handle->checkValue($_POST['password']);
    $status = $db_handle->checkValue($_POST['status']);
    $image = '';
    $query = '';
    if (!empty($_FILES['image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif") {
            $image = '';
        } else {
            $data = $db_handle->runQuery("select * FROM `admin_login` WHERE id='{$id}'");
            unlink($data[0]['image']);
            move_uploaded_file($file_tmp, "assets/admin/" . $file_name);
            $image = "assets/admin/" . $file_name;
            $query .= ",`image`='" . $image . "'";
        }
    }

    $data = $db_handle->insertQuery("UPDATE `admin_login` SET `name`='$name',`email`='$email',`password`='$password',`role`='$role',`status`='$status'". $query ." WHERE id={$id}");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Admin';
                </script>";
}

if (isset($_POST['updateHomeBanner'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $banner_name = $db_handle->checkValue($_POST['banner_name']);
    $heading_one = $db_handle->checkValue($_POST['heading_one']);
    $heading_one_cn = $db_handle->checkValue($_POST['heading_one_cn']);
    $heading_two = $db_handle->checkValue($_POST['heading_two']);
    $heading_two_cn = $db_handle->checkValue($_POST['heading_two_cn']);
    $heading_three = $db_handle->checkValue($_POST['heading_three']);
    $heading_three_cn = $db_handle->checkValue($_POST['heading_three_cn']);
    $details = $db_handle->checkValue($_POST['details']);
    $details_cn = $db_handle->checkValue($_POST['details_cn']);
    $link_one = $db_handle->checkValue($_POST['link_one']);
    $updated_at = date("Y-m-d H:i:s");
    $image = '';
    $query = '';
    if (!empty($_FILES['banner_img']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['banner_img']['name'];
        $file_size = $_FILES['banner_img']['size'];
        $file_tmp = $_FILES['banner_img']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif") {
            $image = '';
        } else {
            $data = $db_handle->runQuery("SELECT * FROM banner WHERE id='{$id}'");
            unlink("../".$data[0]['banner_img']);
            move_uploaded_file($file_tmp, "../assets/images/banner/" . $file_name);
            $image = "assets/images/banner/" . $file_name;
            $query .= ",`banner_img`='" . $image . "'";
        }
    }

    $data = $db_handle->insertQuery("update banner set `banner_name`='$banner_name',`heading_one`='$heading_one',`heading_two`='$heading_two',`heading_three`='$heading_three',`details`='$details',`link_one`='$link_one',`heading_one_cn` = '$heading_one_cn',`heading_two_cn` = '$heading_two_cn',`heading_three_cn` = '$heading_three_cn',`details_cn` = '$details_cn',`updated_at`='$updated_at'" . $query . " where id={$id}");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Banner';
                </script>";


}


if(isset($_POST['updateDeliveryCharges'])){
    $id = $db_handle->checkValue($_POST['id']);
    $min_charge = $db_handle->checkValue($_POST['min_charge']);
    $weight_upto = $db_handle->checkValue($_POST['weight_upto']);
    $additional_charges = $db_handle->checkValue($_POST['additional_charges']);
    $min_order_amount = $db_handle->checkValue($_POST['min_order_amount']);

    $data = $db_handle->insertQuery("UPDATE `delivery_charges` SET `min_delivery_charge`='$min_charge',`weight_upto`='$weight_upto',`next_per_kg_weight`='$additional_charges',`min_order_free_delivery`='$min_order_amount' WHERE delivery_id = '$id'");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Delivery-Charges';
                </script>";
}


if(isset($_POST['delivery'])){
    $id = $db_handle->checkValue($_POST['billing_id']);
    $date = $db_handle->checkValue($_POST['date']);
    $status = $db_handle->checkValue($_POST['status']);

    $data = $db_handle->insertQuery("UPDATE `billing_details` SET `delivery_date`='$date',`approve` = '$status' WHERE id='$id'");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Pending-Order';
                </script>";
}

if(isset($_POST['approved'])){
    $id = $db_handle->checkValue($_POST['billing_id']);

    $data = $db_handle->insertQuery("UPDATE `billing_details` SET `approve` = '1' WHERE id='$id'");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Confirm-Order';
                </script>";
}

if(isset($_POST['updatePassword'])){
    $o_pass = $db_handle->checkValue($_POST['o_pass']);
    $n_pass = $db_handle->checkValue($_POST['n_pass']);

    $previous_pass = $db_handle->runQuery("select password from admin_login limit 1");
    if($previous_pass[0]['password'] == $o_pass){
        $update = $db_handle->insertQuery("update admin_login set password = '$n_pass' where id = 2");
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Profile';
                </script>";
    }else{
        echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Profile';
                </script>";
    }
}

