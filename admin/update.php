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
    $today_deal = $db_handle->checkValue($_POST['today_deal']);
    $product_price = $db_handle->checkValue($_POST['product_price']);
    $cost = $db_handle->checkValue($_POST['cost']);
    $product_weight = $db_handle->checkValue($_POST['product_weight']);
    $query = '';

    $updated_at = date("Y-m-d H:i:s");

    if (!empty($_FILES['images']['tmp_name'][0])) {
        // At least one image is selected

        $dataFileName = []; // Array to store the file names

        // Loop through each uploaded image file
        foreach ($_FILES['images']['tmp_name'] as $index => $uploadedFile) {
            $originalFileName = $_FILES['images']['name'][$index];
            // Get the original image size and type
            list($originalWidth, $originalHeight, $imageType) = getimagesize($uploadedFile);

            // Create image resource from uploaded file based on image type
            switch ($imageType) {
                case IMAGETYPE_JPEG:
                    $image = imagecreatefromjpeg($uploadedFile);
                    break;
                case IMAGETYPE_PNG:
                    $image = imagecreatefrompng($uploadedFile);
                    break;
                case IMAGETYPE_GIF:
                    $image = imagecreatefromgif($uploadedFile);
                    break;
                default:
                    throw new Exception('Unsupported image type.');
            }

            // Resize the image to 250x250 and save it
            $newImage = imagecreatetruecolor(250, 250);
            imagecopyresampled($newImage, $image, 0, 0, 0, 0, 250, 250, $originalWidth, $originalHeight);
            $RandomAccountNumber = mt_rand(1, 99999);
            imagejpeg($newImage, 'assets/products_image/250/' . $RandomAccountNumber . '_' . $originalFileName);

            // Resize the image to 650x650 and save it
            $newImage = imagecreatetruecolor(650, 650);
            imagecopyresampled($newImage, $image, 0, 0, 0, 0, 650, 650, $originalWidth, $originalHeight);
            imagejpeg($newImage, 'assets/products_image/650/' . $RandomAccountNumber . '_' . $originalFileName);
            $dataFileName[] = 'assets/products_image/650/' . $RandomAccountNumber . '_' . $originalFileName;

            // Free up memory
            imagedestroy($image);
            imagedestroy($newImage);
        }

        $databaseValue = implode(',', $dataFileName);
        $query .= ",`p_image`='" . $databaseValue . "'";
        $fetch_image = $db_handle->runQuery("select p_image from product WHERE id={$id}");
        $img = explode(',', $fetch_image[0]['p_image']);
        foreach ($img as $i) {
            unlink($i);
        }
    }

    $data = $db_handle->insertQuery("UPDATE `product` SET `category_id`='$product_category',`product_code`='$product_code',`p_name`='$p_name',`description`='$product_description',`description_en` = '$product_description_en',
                     `status`='$status',`updated_at`='$updated_at',`product_price`='$product_price',`p_name_en` = '$p_name_en',`cost` = '$cost',`product_weight` = '$product_weight', `deal_today` = '$today_deal'" . $query . " WHERE id={$id}");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Product';
                </script>";
}

if (isset($_POST['updateCourse'])) {
    $course_id = $db_handle->checkValue($_POST['id']);
    $course_name = $db_handle->checkValue($_POST['course_name']);
    $course_name_en = $db_handle->checkValue($_POST['course_name_en']);
    $course_type = $db_handle->checkValue($_POST['course_type']);
    $course_duration = $db_handle->checkValue($_POST['course_duration']);
    $course_price = $db_handle->checkValue($_POST['course_price']);
    $course_price_poor = $db_handle->checkValue($_POST['course_price_poor']);
    $course_description = $db_handle->checkValue($_POST['course_description']);
    $course_description_en = $db_handle->checkValue($_POST['course_description_en']);
    $form_link = $db_handle->checkValue($_POST['form_link']);
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

    $data = $db_handle->insertQuery("UPDATE `course` SET `course_name`='$course_name',`course_name_en`='$course_name_en',`course_duration`='$course_duration',`course_price`='$course_price',`course_price_poor`='$course_price_poor',`course_description`='$course_description',`course_description_en`='$course_description_en',`status`='$status',`updated_at`='$updated_at',`course_type`='$course_type',`form_link`='$form_link'" . $query . " WHERE course_id='{$course_id}'");
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
    $min_order_amount = $db_handle->checkValue($_POST['min_order_amount']);

    $data = $db_handle->insertQuery("UPDATE `promo_code` SET `coupon_name`='$coupon_name',`description`='$description',`code`='$coupon_code',`coupon_type`='$coupon_type',`amount`='$coupon_amount',
                        `start_date`='$start_date',`expirey_date`='$expirey_date',`status`='$status',`updated_at`='$updated_at',`minimum_order` = '$min_order_amount' WHERE id={$promo_id}");
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

    $data = $db_handle->insertQuery("UPDATE `admin_login` SET `name`='$name',`email`='$email',`password`='$password',`role`='$role',`status`='$status'" . $query . " WHERE id={$id}");
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
            unlink("../" . $data[0]['banner_img']);
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


if (isset($_POST['updateDeliveryCharges'])) {
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


if (isset($_POST['payment_status'])) {
    $id = $db_handle->checkValue($_POST['billing_id']);
    $email = $db_handle->checkValue($_POST['email']);
    $payment_status = $db_handle->checkValue($_POST['payment']);

    $data = $db_handle->insertQuery("UPDATE `billing_details` SET `payment_status` = '$payment_status' WHERE id='$id'");

    if($payment_status == '1'){
        $fetch_customer = $db_handle->runQuery("select customer_id,total_purchase,updated_at,payment_type from billing_details where id='$id'");
        $customer = $fetch_customer[0]['customer_id'];
        $points = $fetch_customer[0]['total_purchase'];
        $date = $fetch_customer[0]['updated_at'];
        $payment = $fetch_customer[0]['payment_type'];

        if ($payment != 'Credit Card' && $customer != 0) {
            $insert_point = $db_handle->insertQuery("INSERT INTO `point`( `customer_id`, `points`, `date`) VALUES ('$customer','$points','$date')");
        }

        if ($data) {
            $product_details = $db_handle->runQuery("SELECT * FROM `invoice_details`, `product` WHERE `billing_id` = '$id' and invoice_details.product_id = product.id");
            $no_product_details = $db_handle->numRows("SELECT * FROM `invoice_details`, `product` WHERE `billing_id` = '$id' and invoice_details.product_id = product.id");
            $tableHtml = '<table style="border-collapse: collapse; width: 100%;">';
            $tableHtml .= '<tr>
                    <th style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">產品名稱</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">產品代碼</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">數量</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">價格</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">合計</th>
                </tr>';

            for ($i = 0; $i < $no_product_details; $i++) {
                $tableHtml .= '<tr>';
                $tableHtml .= '<td style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">' . $product_details[$i]['product_name'] . '</td>';
                $tableHtml .= '<td style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">' . $product_details[$i]['product_code'] . '</td>';
                $tableHtml .= '<td style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">' . $product_details[$i]['product_quantity'] . '</td>';
                $tableHtml .= '<td style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">' . $product_details[$i]['product_unit_price'] . '</td>';
                $tableHtml .= '<td style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">' . $product_details[$i]['product_total_price'] . '</td>';
                $tableHtml .= '</tr>';
            }

            $tableHtml .= '</table>';

            $payment1 = '<h3>消費積分獎賞</h3>';
            $payment1 .= ' <p>如為Wayshk活籽兒童用品店網店會員，每消費1元即可賺取1積分。本次消費積分已經加入您的帳戶，可當作現金使用或下載各類創意教學資源。</p>';
            $payment1 .= ' <p>登入會員帳號查看積分：https://www.wayshk.com/Login</p>';
            $payment1 .= ' <p>立即使用現金回贈： https://www.wayshk.com/Shop</p>';
            $payment1 .= ' <p>下載教學資源： https://www.wayshk.com/Resources-Download  </p>';

            $payment2 = '<h3>評價回贈獎賞</h3>';
            $payment2 .= '<p>第一步：撰寫Carousell/Facebook好評或直接提供試玩照片及建議</p>';
            $payment2 .= '<p>第二步：截圖回覆此電郵/傳送到WhatsApp 5605 8389</p>';
            $payment2 .= '<p>第三步：經店員確認後可獲得額外200積分（=$5購物現金）</p>';
            $payment2 .= '<h3>聯絡我們</h3>';
            $payment2 .= '<p>如你有任何關於此訂單的查詢，請與Wayshk聯繫。</p>';
            $payment2 .= '<p>香港大圍成運路21-23號群力工業大廈3樓1室</p>';
            $payment2 .= '<p>產品訂購 WhatsApp +852 56058389/電郵地址wayshk.order@gmail.com</p>';
            $payment2 .= '<p>其他查詢WhatsApp +852 52657359 /電郵地址ways00.hk@gmail.com</p>';

            $button = "<a href='https://wayshk.com/print_receipt.php?id=" . $id . "' class='password-button' style='margin-left: 60px;' target='_blank'>See Details</a>";


            $img = '<img src="https://wayshk.com/assets/images/email-banner.jpg" alt="" style="width: 100%;">';
            $email_to = $email;
            $subject = 'Wayshk 活籽兒童用品店 – 訂單確認';

            $headers = "From: Business <" . $db_handle->from_email() . ">\r\n";
            $headers .= "Content-Type: text/html; charset=utf-8\r\n";

            $message = $img . '<br><br>感謝您購買 Wayshk活籽兒童用品店的商品。  您的訂單 #WHK' . $id . '已經確認 <br><br>點擊連結檢視訂單詳情，並下載收據 ：' . $button . '<br><br> 訂單摘要： ' . $tableHtml . '<br><br>' . $payment1. '<br><br>' . $payment2;
            if (mail($email_to, $subject, $message, $headers)) {
                echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Pending-Order';
                </script>";
            }
        }
    } else{
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Pending-Order';
                </script>";
    }

}

if (isset($_POST['delivery'])) {
    $id = $db_handle->checkValue($_POST['billing_id']);
    $email = $db_handle->checkValue($_POST['email']);
    $delivery_status = $db_handle->checkValue($_POST['delivery_status']);

    $data = $db_handle->insertQuery("UPDATE `billing_details` SET delivery_status = '$delivery_status' WHERE id='$id'");

    if($delivery_status == '1'){
        if ($data) {
            $fetch_product = $db_handle->runQuery("select * from invoice_details where billing_id = '$id'");
            $no_fetch_product = $db_handle->numRows("select * from invoice_details where billing_id = '$id'");
            for ($i = 0; $i < $no_fetch_product; $i++) {
                $quantity = $fetch_product[$i]['product_quantity'];
                $product_id = $fetch_product[$i]['product_id'];
                $fetch_stock = $db_handle->runQuery("select quantity from stock where product_id = '$product_id'");
                $no_fetch_stock = $db_handle->numRows("select quantity from stock where product_id = '$product_id'");
                if ($no_fetch_stock > 0) {
                    $s_quantity = $fetch_stock[0]['quantity'];
                    $s_quantity = $s_quantity - $quantity;
                    $update_stock = $db_handle->insertQuery("UPDATE `stock` SET `quantity`='$s_quantity' WHERE product_id = '$product_id'");
                }
            }

            $product_details = $db_handle->runQuery("SELECT * FROM `invoice_details`, `product` WHERE `billing_id` = '$id' and invoice_details.product_id = product.id");
            $no_product_details = $db_handle->numRows("SELECT * FROM `invoice_details`, `product` WHERE `billing_id` = '$id' and invoice_details.product_id = product.id");
            $tableHtml = '<table style="border-collapse: collapse; width: 100%;">';
            $tableHtml .= '<tr>
                    <th style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">產品名稱</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">產品代碼</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">數量</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">價格</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">合計</th>
                </tr>';

            for ($i = 0; $i < $no_product_details; $i++) {
                $tableHtml .= '<tr>';
                $tableHtml .= '<td style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">' . $product_details[$i]['product_name'] . '</td>';
                $tableHtml .= '<td style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">' . $product_details[$i]['product_code'] . '</td>';
                $tableHtml .= '<td style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">' . $product_details[$i]['product_quantity'] . '</td>';
                $tableHtml .= '<td style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">' . $product_details[$i]['product_unit_price'] . '</td>';
                $tableHtml .= '<td style="border: 1px solid #000; padding: 8px; text-align: center; text-align: center;">' . $product_details[$i]['product_total_price'] . '</td>';
                $tableHtml .= '</tr>';
            }

            $tableHtml .= '</table>';

            $button = "<a href='https://wayshk.com/print_receipt.php?id=" . $id . "' class='password-button' style='margin-left: 60px;' target='_blank'>See Details</a>";

            $footer = '<h4 style="font-size: 19px; font-weight: 700; margin: 0;>期待您再次光臨Wayshk！</h4></br></br>';
            $footer = '<h4 style="font-size: 19px; font-weight: 700; margin: 0;>聯絡我們</h4>';
            $footer .= '<h5 style="font-size: 13px; text-transform: uppercase; margin: 0; letter-spacing:1px; font-weight: 500;">如你有任何關於此訂單的查詢，請與Wayshk聯繫。</h5>';
            $footer .= '<h5 style="font-size: 13px; text-transform: uppercase; margin: 0; letter-spacing:1px; font-weight: 500;">香港大圍成運路21-23號群力工業大廈3樓1室</h5>';
            $footer .= '<h5 style="font-size: 13px; text-transform: uppercase; margin: 0; letter-spacing:1px; font-weight: 500;">產品訂購 WhatsApp +852 56058389/電郵地址wayshk.order@gmail.com</h5>';
            $footer .= '<h5 style="font-size: 13px; text-transform: uppercase; margin: 0; letter-spacing:1px; font-weight: 500;">其他查詢WhatsApp +852 52657359 /電郵地址ways00.hk@gmail.com</h5>';

            $img = '<img src="https://wayshk.com/assets/images/email-banner.jpg" alt="" style="width: 100%;">';
            $email_to = $email;
            $subject = 'Wayshk 活籽兒童用品店 – 訂單更新 ';
            $headers = "From: Business <" . $db_handle->from_email() . ">\r\n";
            $headers .= "Content-Type: text/html; charset=utf-8\r\n";
            $message = $img . '<br><br>您的訂單 WHK #' . $id . ' <br><br>已經完成出貨程序。點擊以下連結檢視您的訂單詳情：' . $button . '<br><br> 訂單摘要： ' . $tableHtml . '<br><br>' . $footer;
            if (mail($email_to, $subject, $message, $headers)) {
                echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Pending-Order';
                </script>";
            }
        }
    }  echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Pending-Order';
                </script>";

}



if (isset($_POST['updatePassword'])) {
    $o_pass = $db_handle->checkValue($_POST['o_pass']);
    $n_pass = $db_handle->checkValue($_POST['n_pass']);

    $previous_pass = $db_handle->runQuery("select password from admin_login limit 1");
    if ($previous_pass[0]['password'] == $o_pass) {
        $update = $db_handle->insertQuery("update admin_login set password = '$n_pass' where id = 2");
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Profile';
                </script>";
    } else {
        echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Profile';
                </script>";
    }
}


if (isset($_POST['update_files'])) {
    $product_catalouge = '';
    $product_order_form = '';
    $updated_at = date("Y-m-d H:i:s");

    $RandomAccountNumber = mt_rand(1, 99999);
    $file_name = $RandomAccountNumber . "_" . $_FILES['product_catalouge']['name'];
    $file_size = $_FILES['product_catalouge']['size'];
    $file_tmp = $_FILES['product_catalouge']['tmp_name'];

    $RandomAccountNumber1 = mt_rand(1, 99999);
    $file_name1 = $RandomAccountNumber . "_" . $_FILES['product_order_form']['name'];
    $file_size1 = $_FILES['product_order_form']['size'];
    $file_tmp1 = $_FILES['product_order_form']['tmp_name'];

    $RandomAccountNumber1 = mt_rand(1, 99999);
    $file_name2 = $RandomAccountNumber . "_" . $_FILES['product_order_form_en']['name'];
    $file_size2 = $_FILES['product_order_form_en']['size'];
    $file_tmp2 = $_FILES['product_order_form_en']['tmp_name'];

    $RandomAccountNumber = mt_rand(1, 99999);
    $file_name3 = $RandomAccountNumber . "_" . $_FILES['product_catalouge_en']['name'];
    $file_size3 = $_FILES['product_catalouge_en']['size'];
    $file_tmp3 = $_FILES['product_catalouge_en']['tmp_name'];

    $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    if ($file_type != "pdf") {
        $product_catalouge = '';
    } else {
        $data = $db_handle->runQuery("SELECT * FROM files");
        unlink("../assets/document/" . $data[0]['path']);
        move_uploaded_file($file_tmp, "../assets/document/" . $file_name);
        unlink("../assets/document/" . $data[1]['path']);
        move_uploaded_file($file_tmp1, "../assets/document/" . $file_name1);
        unlink("../assets/document/" . $data[2]['path']);
        move_uploaded_file($file_tmp2, "../assets/document/" . $file_name2);
        unlink("../assets/document/" . $data[3]['path']);
        move_uploaded_file($file_tmp3, "../assets/document/" . $file_name3);
        $update = $db_handle->insertQuery("UPDATE `files` SET `path`='$file_name',`updated_at`='$updated_at' WHERE id = '1'");
        $update2 = $db_handle->insertQuery("UPDATE `files` SET `path`='$file_name1',`updated_at`='$updated_at' WHERE id = '2'");
        $update2 = $db_handle->insertQuery("UPDATE `files` SET `path`='$file_name2',`updated_at`='$updated_at' WHERE id = '3'");
        $update2 = $db_handle->insertQuery("UPDATE `files` SET `path`='$file_name3',`updated_at`='$updated_at' WHERE id = '4'");
        if ($update && $update2) {
            echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='update_files.php';
                </script>";
        }
    }
}


if (isset($_POST['updateTextbook'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $title = $db_handle->checkValue($_POST['title']);
    $title_en = $db_handle->checkValue($_POST['title_en']);
    $category = $db_handle->checkValue($_POST['category']);
    $category_en = $db_handle->checkValue($_POST['category_en']);
    $points = $db_handle->checkValue($_POST['points']);
    $link = $db_handle->checkValue($_POST['link']);
    $description = $db_handle->checkValue($_POST['description']);
    $description_en = $db_handle->checkValue($_POST['description_en']);
    $image = '';
    $query = '';
    $updated_at = date("Y-m-d H:i:s");
    if (!empty($_FILES['textbook_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['textbook_image']['name'];
        $file_size = $_FILES['textbook_image']['size'];
        $file_tmp = $_FILES['textbook_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "gif") {
            $image = '';
        } else {
            $data = $db_handle->runQuery("select * FROM `textbook` WHERE id='{$id}'");
            unlink($data[0]['image']);
            move_uploaded_file($file_tmp, "assets/textbook/" . $file_name);
            $image = "assets/textbook/" . $file_name;
            $query .= ",`image`='" . $image . "'";
        }
    }
    $data = $db_handle->insertQuery("UPDATE `textbook` SET `textbook_title`='$title',`textbook_title_en`='$title_en',`textbook_cat`='$category',`textbook_cat_en`='$category_en',
                      `textbook_point`='$points',`download_link`='$link',`textbook_details`='$description',`textbook_details_en`='$description_en',`updated_at`='$updated_at'" . $query . " where id={$id}");
    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Textbook';
                </script>";

}


if (isset($_POST['updateBook'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $date = $db_handle->checkValue($_POST['date']);
    $store_name = $db_handle->checkValue($_POST['store_name']);
    $type = $db_handle->checkValue($_POST['type']);
    $item_name = $db_handle->checkValue($_POST['item_name']);
    $amount = $db_handle->checkValue($_POST['amount']);
    $payer = $db_handle->checkValue($_POST['payer']);
    $payment_method = $db_handle->checkValue($_POST['payment_method']);

    $query = '';

    $updated_at = date("Y-m-d H:i:s");

    if (!empty($_FILES['images']['tmp_name'][0])) {
        // Unlink previous images
        $fetch_image = $db_handle->runQuery("SELECT image FROM book_keeping WHERE bookkeeping_id={$id}");
        $img = explode(',', $fetch_image[0]['image']);
        foreach ($img as $i) {
            unlink($i);
        }

        // Move and store new images with random numbers
        $dataFileName = [];
        $totalFiles = count($_FILES['images']['tmp_name']);
        for ($i = 0; $i < $totalFiles; $i++) {
            $tempFilePath = $_FILES['images']['tmp_name'][$i];
            if ($tempFilePath != "") {
                $fileExtension = pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION);
                $fileName = uniqid() . '_' . $fileExtension; // Generate unique file name with random number
                $targetFilePath = "assets/book_keeping/" . $fileName; // Specify the target directory for uploaded files
                move_uploaded_file($tempFilePath, $targetFilePath);
                $dataFileName[] = $targetFilePath;
            }
        }

        $databaseValue = implode(',', $dataFileName);
        $query .= ", `image`='" . $databaseValue . "'";
    }

    $data = $db_handle->insertQuery("UPDATE `book_keeping` SET `date`='$date',`store_name`='$store_name',`type`='$type',`item_name`='$item_name',`amount`='$amount',`payer`='$payer',`payment_method`='$payment_method'" . $query . " WHERE bookkeeping_id={$id}");
    if ($data) {
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Book-Keeping';
                </script>";
    }
}

if (isset($_POST['updateCashFlow'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $date = $db_handle->checkValue($_POST['date']);
    $amount = $db_handle->checkValue($_POST['amount']);
    $note = $db_handle->checkValue($_POST['note']);
    $updated_at = date("Y-m-d H:i:s");

    $data = $db_handle->insertQuery("UPDATE `cash_flow` SET `date`='$date',`amount`='$amount',`note`='$note',`updated_at`='$updated_at' WHERE cash_id = '$id'");
    if ($data) {
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Cash-Capital';
                </script>";
    }
}

if (isset($_POST['updateCashFlowWithdraw'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $date = $db_handle->checkValue($_POST['date']);
    $amount = $db_handle->checkValue($_POST['amount']);
    $note = $db_handle->checkValue($_POST['note']);
    $updated_at = date("Y-m-d H:i:s");

    $data = $db_handle->insertQuery("UPDATE `cash_flow_withdraw` SET `date`='$date',`amount`='$amount',`note`='$note',`updated_at`='$updated_at' WHERE cash_withdraw_id  = '$id'");
    if ($data) {
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Cash-Capital';
                </script>";
    }
}

if (isset($_POST['updateBankInterest'])) {
    $id = $db_handle->checkValue($_POST['id']);
    $date = $db_handle->checkValue($_POST['date']);
    $amount = $db_handle->checkValue($_POST['amount']);
    $note = $db_handle->checkValue($_POST['note']);
    $updated_at = date("Y-m-d H:i:s");

    $data = $db_handle->insertQuery("UPDATE `bank_interest` SET `date`='$date',`amount`='$amount',`note`='$note',`updated_at`='$updated_at' WHERE bank_id = '$id'");
    if ($data) {
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Bank-Interest';
                </script>";
    }
}

