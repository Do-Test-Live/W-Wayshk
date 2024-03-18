<?php
session_start();
if (isset($_SESSION['id'])) {
    $customer_id = $_SESSION['id'];
}
$verify = '0';
include('admin/include/dbController.php');
$db_handle = new DBController();
if(isset($_POST['verify'])){
    $pass = $db_handle->checkValue($_POST['password']);
    if($pass == 'ngthk'){
        $_SESSION['verify'] = '1';
        echo "
        <script>
        window.location.href = 'Home';
</script>
        ";
    } else {
        echo "
        <script>
        alert('Something went wrong');
        window.location.href = 'Verify';
</script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Input Field</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0; /* optional background color */
        }

        .container {
            text-align: center;
        }

        .center-form {
            display: inline-block;
        }

        .center-input {
            padding: 10px;
            width: 300px; /* Adjust width as needed */
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
        }

        .submit-button {
            padding: 10px 20px;
            margin-left: 10px; /* Add space between input and button */
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
<div class="container">
    <form class="center-form" action="#" method="post">
        <input type="password" class="center-input" placeholder="Enter your password here..." name="password">
        <button type="submit" name="verify" class="submit-button">Submit</button>
    </form>
</div>


</body>
</html>