<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

if (isset($_SESSION['manage'])):
    $msg = null;
    // もし$_FILES['upfile']があって、一時的なファイル名の$_FILES['upfile']がPOSTでアップロードされたファイルだったら
    if (isset($_FILES['upfile']) && is_uploaded_file($_FILES['upfile']['tmp_name'])):
        $new_name = date("YmdHis");
        $a = 'images/index/' . basename($_FILES['upfile']['name']);
        
        //もし一時的なファイル名の$_FILES['upfile']ファイルをupload/basename($_FILES['upfile']['name'])ファイルに移動したら
        if (move_uploaded_file($_FILES['upfile']['tmp_name'], $a)):
            $msg = '
            <form action="upload.php" method="post" class="">
                <input type="hidden" name="image" value="'.$a.'">
                <img src="./'.$a.'" class="">
                <input type="submit" value="入稿画面へ" class="button">
            </form>';
        else :
            $msg = 'アップロードに失敗しました';
        endif;
    else:
        $msg ='
        <form action="upload.php" method="post" class="">
            <input type="submit" value="入稿画面へ" class="button">
        </form>
        ';
    endif;
require 'head.php';
?>

<body>

<?php require 'header-manage.php'; ?>

<div class="container">
    <div class="section">
        <h2 class="section__head">画像のアップロード</h2>

<?php
?>

<form action="upload-picture.php" method="post" enctype="multipart/form-data">
    <input type="file" name="upfile">
    <input type="submit" value="読み込み" name="yomikomi" class="button">
</form>

<?php
    if (isset($msg) && $msg == true) :
        echo $msg;
    endif;?>
    <meta http-equiv="refresh" content="1800; URL=managelogout-output2.php">
<?php
     else : ?>
    <meta http-equiv="refresh" content="0; URL=index.php">
<?php
        endif;
?>
    </div>
</div>
<?php require 'footer.php'; ?>

</body>