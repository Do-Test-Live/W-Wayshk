<?php
session_start();
$id = $_GET['id'];
if (isset($_SESSION['id'])) {
    $customer_id = $_SESSION['id'];
} else {
    if ($_SESSION['language'] === 'EN') {
        echo "<script>
alert('Please log in first to download the book.');
window.location.href = 'Textbook-Details?id=$id';
</script>";
    } else {
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


    $img = '<img src="https://wayshk.com/assets/images/welcome-poster.jpg" alt="" style="width: 100%;">';
    $to = $email_to;
    $subject = 'Textbook Download | Wayshk';
    $message = $img . '<br><br> <h3>Order Received Successfully</h3><br>
Your order is successfully placed. Please download the textbook from <a href = ' .$download_link. ' target="_blank">Here</a>';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: business@wayshk.com' . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
        if ($_SESSION['language'] == 'EN') {
            echo "<script>
               alert('Your request is confirmed. Please check your email for more details.');
                window.location.href = 'Textbook-Details?id=$id';
                </script>";
        } else {
            echo "<script>
                alert('所選教材已經發送到您登記的電郵地址內。');
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
