<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require_once('data.php');

if (isset($_SESSION['manage'])) :
    //データベースサーバーと接続
if (isset($_REQUEST['command'])) :
    $sql=$pdo->prepare('delete from news where id=?');
    $sql->execute([$_REQUEST['id']]);
endif;
require 'head.php';
?>

<?php
?>
<body>

<?php require 'header-manage.php'; ?>


<!--
------------------------------
    投稿一覧
------------------------------
-->
<div class="container">
    <div class="section">
        <h3 class="section__head">プレス投稿一覧</h3>
        <table class="postsTable">
            <tr class="postsTable__row">
                <th class="postsTable__head postsTable__item postsTable__item--middle">タイトル</th>
                <th class="postsTable__head postsTable__item postsTable__item--middle">サブタイトル</th>
                <th class="postsTable__head postsTable__item postsTable__item--long">ニュース本文</th>
                <th class="postsTable__head postsTable__item postsTable__item--middle">タグ</th>
                <th class="postsTable__head postsTable__item postsTable__item--middle">下書き？</th>
                <th class="postsTable__head postsTable__item postsTable__item--middle">画像パス</th>
                <th class="postsTable__head postsTable__item postsTable__item--short">更新日時</th>
                <th class="postsTable__head postsTable__item postsTable__item--short">削除</th>
                <th class="postsTable__head postsTable__item postsTable__item--short">編集</th>
            
            </tr>
            <?php
            foreach ($resentpress as $row) :
                ;?>
                <tr class="postsTable__row">
                    <form onSubmit="return delete1()" action="posts.php" method="gets">
                        <input type="hidden" name="command">
                        <td class="postsTable__head postsTable__item postsTable__item--middle"><?php echo $row['title1'];?></td>
                        <td class="postsTable__head postsTable__item postsTable__item--middle"><?php echo $row['title2'];?></td>
                        <td class="postsTable__head postsTable__item postsTable__item--long"><?php echo $row['text'];?></td>
                        <td class="postsTable__head postsTable__item postsTable__item--shor"><?php echo $row['tag'];?></td>
                        <td class="postsTable__head postsTable__item postsTable__item--shor"><?php echo $row['draft'];?></td>
                        <td class="postsTable__head postsTable__item postsTable__item--short"><?php echo $row['image'];?></td>
                        <td class="postsTable__head postsTable__item postsTable__item--short"><?php echo $row['upload_at'];?></td>
                        <td class="postsTable__head postsTable__item postsTable__item--short">
                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                            <input type="submit" value="削除">
                        </td>
                    </form>
                    <form action="update-correction.php" method="post">
                        <td class="postsTable__head postsTable__item postsTable__item--short">
                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                            <input type="hidden" name="title1" value="<?php echo $row['title1'];?>">
                            <input type="hidden" name="title2" value="<?php echo $row['title2'];?>">
                            <input type="hidden" name="tag" value="<?php echo $row['tag'];?>">
                            <input type="hidden" name="image" value="<?php echo $row['image'];?>">
                            <input type="hidden" name="draft" value="<?php echo $row['draft'];?>">
                            <input type="hidden" name="text" value='<?php echo $row['text'];?>'>
                            <input type="submit" value="編集">
                        </td>
                    </form>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
<meta http-equiv="refresh" content="1800; URL=managelogout-output2.php"><?php
 else :;?>
    <meta http-equiv="refresh" content="0; URL=index.php"><?php
endif;?>

<?php require 'footer.php'; ?>

<script language="JavaScript" type="text/javascript">
    function delete1() {
        var ok=prompt('削除していいですか？(yes/no)');
        if(ok=="yes") {
            return true;
        } else {
            return false;
        }
    };
</script>

<script src="./js/main.js"></script>

</body>