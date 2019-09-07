<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

if (isset($_SESSION['manage'])):
    unset($_SESSION['manage']);
    $alert='';
    $msg='<meta http-equiv="refresh" content="0; URL=index.php">';
else :
    $alert = "<script type='text/javascript'>alert('すでにログアウトしています');</script>";
    $msg='
    <meta http-equiv="refresh" content="0; URL=index.php">
    ';
endif;
require 'head.php';
?>

<body>

<?php require 'header-manage.php'; ?>

<?php 
    echo $alert;
    echo $msg;
?>

<?php require 'footer.php'; ?>

</body>