<?php
session_start();
$lan = $_GET['language'];
unset($_SESSION['language']);
if($lan === 'EN'){
    $_SESSION['language'] = 'EN';
    echo "<script>
                window.location.href='Home';
                </script>";
}elseif ($lan === 'CN'){
    $_SESSION['language'] = 'CN';
    echo "<script>
                window.location.href='Home';
                </script>";
}