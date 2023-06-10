<?php
session_start();
$id = $_GET['id'];
if (isset($_SESSION['id'])) {
    $customer_id = $_SESSION['id'];
} else {
    if($_SESSION['language'] === 'EN'){
        echo "<script>
alert('Please log in first to download the book.');
window.location.href = 'Textbook-Details?id=$id';
</script>";
    }else{
        echo "<script>
alert(' 請先登入會員，並使用積分下載訓練教材');
window.location.href = 'Textbook-Details?id=$id';
</script>";
    }

}
include('admin/include/dbController.php');
$db_handle = new DBController();

$fetch_point = $db_handle->runQuery("SELECT SUM(points) as p FROM `point` WHERE customer_id = '6'");

$required_points = $db_handle->runQuery("SELECT * FROM `textbook` WHERE id = '$id'");
$download_link = $required_points[0]['download_link'];
$r_point = $required_points[0]['textbook_point'];

if ($fetch_point[0]['p'] > $required_points[0]['textbook_point']) {
    echo 'working';
    $select_points = $db_handle->runQuery("select point_id,points from point where customer_id = '$customer_id'");

    $no_points = $db_handle->numRows("select point_id,points from point where customer_id = '$customer_id'");

    for ($i = 0; $i < $no_points; $i++) {
        $point_id = $select_points[$i]['point_id'];
        echo 'For working';
        if ($select_points[$i]['points'] == $r_point) {
            $update = $db_handle->insertQuery("update point set points = '0' where point_id = '$point_id'");
            $r_point = 0;
        } elseif ($select_points[$i]['points'] < $r_point) {
            $update = $db_handle->insertQuery("update point set points = '0' where point_id = '$point_id'");
            $r_point = $r_point - $select_points[$i]['points'];
        } else {
            $points = $select_points[$i]['points'] - $r_point;
            $update = $db_handle->insertQuery("update point set points = '$points' where point_id = '$point_id'");
            $r_point = 0;
        }
    }
    $fetch_email = $db_handle->runQuery("SELECT email FROM `customer` WHERE id='$customer_id'");
    $email_to = $fetch_email[0]['email'];
    $subject = 'Textbook Download | Wayshk';


    $headers = "From: Wayshk <" . $db_handle->from_email() . ">\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";

    $messege = "
            <html>
                <body style='background-color: #eee; font-size: 16px;'>
                <div style='min-width: 200px; background-color: #ffffff; padding: 20px; margin: auto;'>
                    <h3 style='color:black'>Order Received Successfully</h3>
                    <p style='color:black;'>
                    Your order is successfully placed. Please download the textbook from <a href = '$download_link' target='_blank'>Here</a>
                    </p>
                </div>
                </body>
            </html>";
    if (mail($email_to, $subject, $messege, $headers)) {
    if($_SESSION['language'] === 'EN'){
        echo "
        <script>
                alert('Your request is confirmed. Please check your email for more details.');
                window.location.href = 'Textbook-Details?id=$id';
          </script>";
    } else{
        echo "
        <script>
                alert('收到你的指示。 所選訓練教材已經發送到你的登記電郵');
                window.location.href = 'Textbook-Details?id=$id';
          </script>";
    }

    }
} else {
    echo "<script>
                alert('You do not have enough point to buy the book');
                window.location.href = 'Textbook-Details?id=$id';
          </script>";
}
