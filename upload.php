<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require 'head.php';
?>

<body>

<?php require 'header-manage.php'; ?>

<div class="container">
    <div class="section">
        <h3 class="section__head">プレス新規投稿</h3>

<?php
if (isset($_SESSION['manage'])):
    ;?>
        <form class="postForm" action="./upload-confirm.php" method="post" class="Form">
            <input type="text" name="title1" placeholder="タイトル" class="postForm__input" required>
            <input type="text" name="title2" placeholder="サブタイトル" class="postForm__input" required>
            <textarea name="text" placeholder="プレス本文（改行の際はbrタグ）" class="postForm__input --large" required></textarea>
            <input type="text" name="image" placeholder="画像パス" class="postForm__input" value="<?php echo $_REQUEST['image'];?>">
            <select class="postForm__input" name="tag" required>
                <option class="body-copy" value="">タグを選択してください</option>
                <option class="body-copy" value="サービスニュース">サービスニュース</option>
                <option class="body-copy" value="プレスリリース">プレスリリース</option>
                <option class="body-copy" value="お知らせ">お知らせ</option>
            </select>
            <select class="postForm__input" name="draft" required>
                <option class="body-copy" value="">下書きですか？</option>
                <option class="body-copy" value="yes">yes</option>
                <option class="body-copy" value="no">no</option>
            </select>
            <input type="submit" value="確認画面へ" class="postForm__foot button">
        </form>
    </div>
</div>
<meta http-equiv="refresh" content="1800; URL=managelogout-output2 .php"><?php 
else :
    ;?><meta http-equiv="refresh" content="0; URL=index.php">
<?php endif
;?>

<?php require 'footer.php'; ?>

</body>