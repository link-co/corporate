<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

if (isset($_SESSION['manage'])) :
require_once('data.php');
require 'head.php';
?>

<body>

<?php require 'header-manage.php'; ?>

<?php
    if (isset($_REQUEST['command'])):
    require_once('data-uploadconfirm.php');
        ?>
        <div class="l-wideColumn l-wideColumn--first">
        <div class="BorderBox">
        <?php
		if ($add):
            ;?>
            <p class="BorderBox__body title">追加に成功しました。</p>
            
            <meta http-equiv="refresh" content="1; URL=posts.php">
            <?php
        else:
            ;?>
            <p class="BorderBox__body title">追加に失敗しました。</p>
            
            <meta http-equiv="refresh" content="1; URL=upload.php">
            <?php
        endif;
            ?>
            </div>
            </div>
            <?php
        endif;
    ?>
    <div class="container">
        <div class="section">
            <h3 class="section__head">確認画面</h3>
            <form class="ib" action="./upload-confirm.php" method="post">
                <input type="hidden" name="command" value="upload">
                <input type="hidden" name="title1" value="<?php echo $_REQUEST['title1'];?>">
                <input type="hidden" name="title2" value="<?php echo $_REQUEST['title2'];?>">
                <input type="hidden" name="text" value='<?php echo $_REQUEST['text'];?>'>
                <input type="hidden" name="tag" value="<?php echo $_REQUEST['tag'];?>">
                <input type="hidden" name="image" value="<?php echo $_REQUEST['image'];?>">
                <input type="hidden" name="draft" value="<?php echo $_REQUEST['draft'];?>">
   <?php  
    //*************************************************************
    //以下実際に表示されるコンテンツ
    //*************************************************************
 ;?>
            <p class="postForm__input"><?php echo $_REQUEST['title1'];?></p>
            <p class="postForm__input"><?php echo $_REQUEST['title2'];?></p>
            <div class="postForm__input --large"><?php echo $_REQUEST['text'];?></div>
                <p class="postForm__input"><?php echo $_REQUEST['tag'];?></p>
                <p class="postForm__input"><?php echo $_REQUEST['draft'];?></p>
                <img src="<?php echo $_REQUEST['image'];?>">

    <?php 
    //*************************************************************
    //以上実際に表示されるコンテンツ
    //*************************************************************
    ;?>
       <input type="submit" value="追加" class="postForm__foot button">
       </form>
   <form class="ib" action="./upload-correction.php" method="post" class="Form">
        <input type="hidden" name="title1" value="<?php echo $_REQUEST['title1'];?>">
       <input type="hidden" name="title2" value="<?php echo $_REQUEST['title2'];?>">
<input type="hidden" name="text" value='<?php echo $_REQUEST['text'];?>'>
       <input type="hidden" name="tag" value="<?php echo $_REQUEST['tag'];?>">
       <input type="hidden" name="image" value="<?php echo $_REQUEST['image'];?>">
       <input type="hidden" name="draft" value="<?php echo $_REQUEST['draft'];?>">
       <input type="submit" value="修正" class="postForm__foot button">
   </form>

<meta http-equiv="refresh" content="1800; URL=managelogout-output2.php">
<?php
else:
    ;?><meta http-equiv="refresh" content="0; URL=index.php">
<?php endif
?>
</div>
</div>
<?php require 'footer.php'; ?>

</body>