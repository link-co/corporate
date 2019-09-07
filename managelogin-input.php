<?php
error_reporting(E_ALL & ~E_NOTICE);
require 'head.php';
?>

<body>

<?php require 'header-manage.php'; ?>

<div class="container">
    <div class="section">
        <h3 class="section__head">管理者ログイン</h3>
        <form class="postForm" action="./managelogin-output.php" method="post" class="Form">
            <input type="text" name="login" placeholder="ユーザーID" class="postForm__input">
            <input type="password" name="password" placeholder="パスワード" class="postForm__input">
            <input type="submit" value="ログイン" class="postForm__foot button">
        </form>
    </div>
</div>

<?php require 'footer.php'; ?>

</body>