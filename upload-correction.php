<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require 'head.php';
?>

<body>

<?php require 'header.php'; ?>

<?php
if (isset($_SESSION['manage'])):
    ;?>
    <div class="container">
        <div class="section">
        <h3 class="section__head">修正画面</h3>
        <form class="postForm" action="./upload-confirm.php" method="post" class="Form">
            <input type="text" name="title1" placeholder="タイトル" class="postForm__input" value="<?php echo $_REQUEST['title1'];?>" required>
            <input type="text" name="title2" placeholder="サブタイトル" class="postForm__input" value="<?php echo $_REQUEST['title2'];?>" required>
            <textarea name="text" placeholder="プレス本文" class="postForm__input --large" required><?php echo $_REQUEST['text'];?></textarea>
            <input type="text" name="image" placeholder="画像パス" class="postForm__input" value="<?php echo $_REQUEST['image'];?>">
            <select class="postForm__input" name="tag" required>
                <option class="body-copy" value="">タグを選択してください</option>
                <option class="body-copy" value="サービスニュース"  <?php if($_REQUEST['tag']==='サービスニュース') echo 'selected';?>>サービスニュース</option>
                <option class="body-copy" value="プレスリリース" <?php if($_REQUEST['tag']==='プレスリリース') echo 'selected';?>>プレスリリース</option>
                <option class="body-copy" value="お知らせ"  <?php if($_REQUEST['tag']==='お知らせ') echo 'selected';?>>お知らせ</option>
            </select>
            <select class="postForm__input" name="draft" required>
                <option class="body-copy" value="">下書きですか？</option>
                <option class="body-copy" value="yes" <?php if($_REQUEST['draft']==='yes') echo 'selected';?>>yes</option>
                <option class="body-copy" value="no" <?php if($_REQUEST['draft']==='no') echo 'selected';?>>no</option>
            </select>
            <input type="submit" value="確認画面へ" class="postForm__foot button">
        </form>
        </div>
    </div>
<meta http-equiv="refresh" content="1800; URL=managelogout-output2 .php"><?php 
else:
    ;?><meta http-equiv="refresh" content="0; URL=index.php">
<?php endif
;?>
<?php require 'footer.php'; ?>

</body>