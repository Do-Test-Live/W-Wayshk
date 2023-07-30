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
    if (!empty($_FILES['product_image']['tmp_name'][0])) {
        // At least one image is selected

        $dataFileName = []; // Array to store the file names

        // Loop through each uploaded image file
        foreach ($_FILES['product_image']['tmp_name'] as $index => $uploadedFile) {
            $originalFileName = $_FILES['product_image']['name'][$index];
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
        $products_image = $databaseValue;
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
    $form_link = $db_handle->checkValue($_POST['form_link']);
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

    $insert = $db_handle->insertQuery("INSERT INTO `course`(`course_name`,`course_name_en`, `course_duration`, `course_description`,`course_description_en`,`course_image`, `inserted_at`,`course_price`,`course_price_poor`,`course_type`,`form_link`) VALUES ('$course_name','$course_name_en','$course_duration','$course_description','$course_description_en','$image','$inserted_at','$course_price','$course_price_poor','$course_type','$form_link')");

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
    $min_order_amount = $db_handle->checkValue($_POST['min_order_amount']);
    $coupon_description = $db_handle->checkValue($_POST['coupon_description']);
    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db_handle->insertQuery("INSERT INTO `promo_code`(`coupon_name`, `description`, `code`, `coupon_type`, `amount`, `start_date`, `expirey_date`, `inserted_at`,`minimum_order`) 
VALUES ('$coupon_name','$coupon_description','$coupon_code','$promo_type','$coupon_amount','$start_date','$expirey_date','$inserted_at','$min_order_amount')");

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

    $check_customer = $db_handle->numRows("select * from customer where email = '$customer_email'");

    if($check_customer == 0){
        $insert = $db_handle->insertQuery("INSERT INTO `customer`(`customer_name`, `email`, `number`, `password`, `inserted_at`) 
VALUES ('$customer_name','$customer_email','$customer_number','$password','$inserted_at')");
        if($insert){
            $fetch_customer_id = $db_handle->runQuery("SELECT id FROM `customer` ORDER BY id desc limit 1");
            $customer_id = $fetch_customer_id[0]['id'];
            $insert_point = $db_handle->insertQuery("INSERT INTO `point`(`customer_id`, `points`, `date`) VALUES ('$customer_id','200','$inserted_at')");
            if($insert_point){
                $img = '<img src="https://wayshk.com/assets/images/welcome-poster.jpg" alt="" style="width: 100%;">';
                $to = $customer_email;
                $subject = 'WAYSHK 活籽兒童用品店會員註冊 ';
                $message = $img . '<p style="font-size: 20px;"><br><br> 感謝您註冊成為WAYSHK 活籽兒童用品店的會員<br>您已成功登記。現在可以使用您的電郵和密碼登錄。<br><br> 成功註冊會員已獲贈200積分，可用於下載指定訓練教材，或兌換成$5港元現金獎賞使用（沒有最低消費限制）。 <br><br>
立即登入帳戶並兌換獎賞：<a href="https://wayshk.com/" target="_blank">www.wayshk.com</a><br><br>*積分有效期為180天 <br><br>聯絡我們:<br>如你有任何查詢，請與Wayshk聯繫。<br>香港大圍成運路21-23號群力工業大廈3樓1室
<br>產品訂購 WhatsApp +852 56058389/電郵地址wayshk.order@gmail.com<br>其他查詢WhatsApp +852 52657359 /電郵地址ways00.hk@gmail.com</p>';
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: business@wayshk.com' . "\r\n";

                if (mail($to, $subject, $message, $headers)) {
                    if($_SESSION['language'] == 'EN'){
                        echo "<script>
                alert('Congratulation! You have successfully registered in our website.');
                window.location.href='../login.php';
                </script>";
                    }else{
                        echo "<script>
                alert('恭喜您！您已成功在我們的網站註冊。');
                window.location.href='../login.php';
                </script>";
                    }
                }
            }
        }
    } else{
        if($_SESSION['language'] == 'EN'){
            echo "<script>
                alert('Sorry, This email is already registered with us!');
                window.location.href='../login.php';
                </script>";
        }else{
            echo "<script>
                alert('抱歉，此電子郵件已經在我們的系統中註冊！');
                window.location.href='../login.php';
                </script>";
        }
    }
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

if(isset($_POST['add_textbook'])){
    $textbook_title = $db_handle->checkValue($_POST['textbook_title']);
    $textbook_title_en = $db_handle->checkValue($_POST['textbook_title_en']);
    $textbook_cat = $db_handle->checkValue($_POST['textbook_cat']);
    $textbook_cat_en = $db_handle->checkValue($_POST['textbook_cat_en']);
    $textbook_point = $db_handle->checkValue($_POST['textbook_point']);
    $textbook_details = $db_handle->checkValue($_POST['textbook_details']);
    $textbook_details_en = $db_handle->checkValue($_POST['textbook_details_en']);
    $file_download = $db_handle->checkValue($_POST['file_download']);
    $image = '';
    $inserted_at = date("Y-m-d H:i:s");
    if (!empty($_FILES['textbook_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['textbook_image']['name'];
        $file_size = $_FILES['textbook_image']['size'];
        $file_tmp  = $_FILES['textbook_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg") {
            $attach_files = '';
            echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Add-Textbook';
                </script>";

        } else {
            move_uploaded_file($file_tmp, "assets/textbook/" . $file_name);
            $image = "assets/textbook/" . $file_name;
            $insert_query = $db_handle->insertQuery("INSERT INTO `textbook`(`textbook_title`, `textbook_title_en`, `textbook_cat`, `textbook_cat_en`, `textbook_point`, `textbook_details`, `textbook_details_en`, `image`, `inserted_at`,`download_link`) VALUES ('$textbook_title','$textbook_title_en','$textbook_cat','$textbook_cat_en','$textbook_point','$textbook_details','$textbook_details_en','$image','$inserted_at','$file_download')");
            echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Textbook';
                </script>";
        }
    }
}


if(isset($_POST['add_invoice'])){
    // Retrieve the values from the form fields
    $inserted_at = date("Y-m-d H:i:s");
    $platform = $_POST['platform'];
    $paymentMethod = $_POST['payment_method'];
    $deliveryMethods = $_POST['delivery_methods'];
    $organizationName = $_POST['organization_name'];
    $contactPersonName = $_POST['c_name'];
    $contactPersonEmail = $_POST['c_email'];
    $contactPersonPhone = $_POST['phone'];
    $address = $_POST['address'];
    $discount = $_POST['discount'];
    $shipping_fee = $_POST['shipping_fee'];
    $total = $_POST['total'];
    $note = $_POST['note'];

    // Retrieve the values of the appended rows
    $productCodes = $_POST['product'];
    $unitPrices = $_POST['unit_price'];
    $quantities = $_POST['quantity'];
    $subtotals = $_POST['subtotal'];

    // Convert the variables to arrays if they are not already
    $productCodes = is_array($productCodes) ? $productCodes : [$productCodes];
    $unitPrices = is_array($unitPrices) ? $unitPrices : [$unitPrices];
    $quantities = is_array($quantities) ? $quantities : [$quantities];
    $subtotals = is_array($subtotals) ? $subtotals : [$subtotals];

    $insertBillingDetails = $db_handle->insertQuery("INSERT INTO `billing_details`(`f_name`, `organization_name`, `email`, `phone`, `address`, `payment_type`, `shipping_method`, `discount`, `note`, `total_purchase`, `delivery_charges`, `purchase_points`, `updated_at`,`platform`) VALUES ('$contactPersonName','$organizationName','$contactPersonEmail','$contactPersonPhone','$address','$paymentMethod','$deliveryMethods','$discount','$note','$total','$shipping_fee','0','$inserted_at','$platform')");

    $fetchBillNumber = $db_handle->runQuery("select id from billing_details order by id desc limit 1");
    $billId = $fetchBillNumber[0]['id'];

    // Display the values of the appended rows
    for ($i = 0; $i < count($productCodes); $i++) {
        $fetchProductName = $db_handle->runQuery("select p_name from product where id = '$productCodes[$i]'");
        $productName = $fetchProductName[0]['p_name'];
        $insertProducts = $db_handle->insertQuery("INSERT INTO `invoice_details`(`customer_id`, `billing_id`, `product_id`, `product_name`, `product_quantity`, `product_unit_price`, `product_total_price`, `updated_at`) VALUES ('0','$billId','$productCodes[$i]','$productName','$quantities[$i]','$unitPrices[$i]','$subtotals[$i]','$inserted_at')");
    }

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Invoice';
                </script>";
}


if(isset($_POST['add_bookkeeping'])){
    $recept_no = $db_handle->checkValue($_POST['recept_no']);
    $date = $db_handle->checkValue($_POST['date']);
    $store_name = $db_handle->checkValue($_POST['store_name']);
    $type = $db_handle->checkValue($_POST['type']);
    $item_name = $db_handle->checkValue($_POST['item_name']);
    $amount = $db_handle->checkValue($_POST['amount']);
    $payer = $db_handle->checkValue($_POST['payer']);
    $payment_methods = $db_handle->checkValue($_POST['payment_methods']);

    $inserted_at = date("Y-m-d H:i:s");

    $receipt_image='';
    $arr = array();
    if (!empty($_FILES['bimage']['name'][0])) {
        $RandomAccountNumber = mt_rand(1, 99999);

        foreach ($_FILES['bimage']['name'] as $key => $tmp_name) {

            $file_name = $RandomAccountNumber.$key."_" . $_FILES['bimage']['name'][$key];
            $file_size = $_FILES['bimage']['size'][$key];
            $file_tmp = $_FILES['bimage']['tmp_name'][$key];
            $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg" && $file_type != "pdf") {
                $products_image = '';
            } else {
                move_uploaded_file($file_tmp, "assets/book_keeping/" .$file_name);
                $arr[] = "assets/book_keeping/" . $file_name;
            }
        }
        $receipt_image = implode(',', $arr);
    } else {
        $receipt_image = '';
    }

    $insert = $db_handle->insertQuery("INSERT INTO `book_keeping`(`recept_no`, `date`, `store_name`, `type`, `item_name`, `amount`, `payer`, `payment_method`, `image`, `inserted_at`) 
VALUES ('$recept_no','$date','$store_name','$type','$item_name','$amount','$payer','$payment_methods','$receipt_image','$inserted_at')");
    if($insert){
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Book-Keeping';
                </script>";
    }
}

if(isset($_POST['defected'])){
    $product_id = $db_handle->checkValue($_POST['product_id']);
    $quantity = $db_handle->checkValue($_POST['quantity']);
    $note = $db_handle->checkValue($_POST['note']);
    $inserted_at = date("Y-m-d H:i:s");

    $inserted_defected = $db_handle->insertQuery("INSERT INTO `defected_products`(`product_id`, `quantity`, `note`, `inserted_at`) VALUES ('$product_id','$quantity','$note','$inserted_at')");

    if($inserted_defected){
        $fetch_quantity = $db_handle->runQuery("select stock_id, quantity from stock where product_id = '$product_id'");

        $stock_id = $fetch_quantity[0]['stock_id'];
        $quantity_previous = $fetch_quantity[0]['quantity'];
        $updated_quantity = $quantity_previous - $quantity;

        $update_quantity = $db_handle->insertQuery("update stock set quantity = '$updated_quantity' where stock_id = '$stock_id'");
        if($update_quantity){
            echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Defected-Products';
                </script>";
        }
    }
}

if(isset($_POST['add_cash_flow'])){
    $date = $_POST['date'];
    $amount = $_POST['amount'];
    $note = $_POST['note'];
    $inserted_at = date("Y-m-d H:i:s");

    $query = $db_handle->insertQuery("INSERT INTO `cash_flow`(`date`, `amount`, `note`, `inserted_at`) VALUES ('$date','$amount','$note','$inserted_at')");
    if($query){
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Cash-Capital';
                </script>";
    }
}

if(isset($_POST['add_bank_interest'])){
    $date = $_POST['date'];
    $amount = $_POST['amount'];
    $note = $_POST['note'];
    $inserted_at = date("Y-m-d H:i:s");

    $query = $db_handle->insertQuery("INSERT INTO `bank_interest`(`date`, `amount`, `note`, `inserted_at`) VALUES ('$date','$amount','$note','$inserted_at')");
    if($query){
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Bank-Interest';
                </script>";
    }
}

if(isset($_POST['add_quotation'])){
    // Retrieve the values from the form fields
    $inserted_at = date("Y-m-d H:i:s");
    $note = $_POST['platform'];
    $paymentMethod = $_POST['payment_method'];
    $deliveryMethods = $_POST['delivery_methods'];
    $organizationName = $_POST['organization_name'];
    $contactPersonName = $_POST['c_name'];
    $contactPersonEmail = $_POST['c_email'];
    $contactPersonPhone = $_POST['phone'];
    $address = $_POST['address'];
    $discount = $_POST['discount'];
    $shipping_fee = $_POST['shipping_fee'];
    $total = $_POST['total'];

    // Retrieve the values of the appended rows
    $productCodes = $_POST['product'];
    $unitPrices = $_POST['unit_price'];
    $quantities = $_POST['quantity'];
    $subtotals = $_POST['subtotal'];

    // Convert the variables to arrays if they are not already
    $productCodes = is_array($productCodes) ? $productCodes : [$productCodes];
    $unitPrices = is_array($unitPrices) ? $unitPrices : [$unitPrices];
    $quantities = is_array($quantities) ? $quantities : [$quantities];
    $subtotals = is_array($subtotals) ? $subtotals : [$subtotals];

    $insertBillingDetails = $db_handle->insertQuery("INSERT INTO `quotation_details`(`f_name`, `organization_name`, `email`, `phone`, `address`, `payment_type`, `shipping_method`, `discount`, `note`, `total_purchase`, `delivery_charges`, `purchase_points`, `updated_at`) VALUES ('$contactPersonName','$organizationName','$contactPersonEmail','$contactPersonPhone','$address','$paymentMethod','$deliveryMethods','$discount','$note','$total','$shipping_fee','0','$inserted_at')");

    $fetchBillNumber = $db_handle->runQuery("select id from quotation_details order by id desc limit 1");
    $billId = $fetchBillNumber[0]['id'];

    // Display the values of the appended rows
    for ($i = 0; $i < count($productCodes); $i++) {
        $fetchProductName = $db_handle->runQuery("select p_name from product where id = '$productCodes[$i]'");
        $productName = $fetchProductName[0]['p_name'];
        $insertProducts = $db_handle->insertQuery("INSERT INTO `quatation_products`(`customer_id`, `billing_id`, `product_id`, `product_name`, `product_quantity`, `product_unit_price`, `product_total_price`, `updated_at`) VALUES ('0','$billId','$productCodes[$i]','$productName','$quantities[$i]','$unitPrices[$i]','$subtotals[$i]','$inserted_at')");
    }

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Invoice';
                </script>";
}

if(isset($_POST['add_points'])){
    $customer_id = $db_handle->checkValue($_POST['customer']);
    $points = $db_handle->checkValue($_POST['point']);
    $inserted_at = date("Y-m-d H:i:s");

    $insert_point = $db_handle->insertQuery("INSERT INTO `point`(`customer_id`, `points`, `date`,`flag`) VALUES ('$customer_id','$points','$inserted_at','1')");
    if($insert_point){
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Point-Customer';
                </script>";
    }
}