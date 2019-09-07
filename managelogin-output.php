<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
unset($_SESSION['manage']);
require_once('data.php');
$sql2=$pdo->prepare('select*from manage where login=? and password=?');
$sql2->execute([$_REQUEST['login'],$_REQUEST['password']]);
$login=$sql2->fetchAll();
require 'head.php';
?>

<body>

<?php require 'header.php'; ?>

<?php


foreach ($login as $row) :
    $_SESSION['manage']=['id'=> $row['id'], 'login'=>$row['login'],'password'=>$row['password']];
endforeach;

if (isset($_SESSION['manage'])): ?>
    <meta http-equiv="refresh" content="0; URL=upload-picture.php">
<?php
     else: 
    echo $login;?>
    <script type='text/javascript'>alert('IDまたはパスワードが違います');</script>
        <meta http-equiv="refresh" content="0; URL=managelogin-input.php">
    <?php
    endif;?>

<?php require 'footer.php'; ?>

</body>