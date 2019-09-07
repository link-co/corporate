<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require 'head.php';
?>

<body>

<?php require 'header-manage.php'; ?>

<?php 
    $alert = "<script type='text/javascript'>alert('一定時間が経過したため、ログアウトしました');</script>";
    echo $alert;
    echo '
    <meta http-equiv="refresh" content="0; URL=index.php">
    ';
?>

<?php require 'footer.php'; ?>

</body>