<?php
require_once('data.php');
require_once('data2.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/websaite#">
    <meta charset="UTF-8">
       <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta property="og:image" content="https://co-ltd.link/images/eyecatch5.png" />
    <meta property="og:site_name" content="株式会社Link" />
    <meta property="og:type" content="article" />
    <script>
    window.onload = function () {
      var content = location.href;
      var target = document.getElementById("link-sns-share");
      target.href = "http://link-staging.herokuapp.com/posts/share/?url=" + content;
    }
  </script>
   
    <?php
error_reporting(E_ALL & ~E_NOTICE);
require 'head-news.php';
?>

<body>

<?php
foreach ($pressbody as $row) {
    if($row['draft']!='yes'){
    ?>
    <article class="article">
        <span class="article__date"><?php echo $row['upload_at'];?></span>
        <h3 class="article__title"><?php echo $row['title2'];?></h3>
        
        <div class="article__body"><img src="<?php echo $row['image'];?>" width="370px"><p><?php echo $row['text'];?></p></div>
    </article>
    <?php 
    }
}
?>

<!--
------------------------------
    最近のプレス
------------------------------
-->
<div class="container --grey">
    <section class="section">
        <h2 class="section__head">最近のプレス</h2>
        <ul class="cardList">
            <?php
            foreach ($resentpress as $row) :
                if($row['draft']!='yes'):
                ;?>
                <li class="infoList">
                    <span class="infoList__note"><?php echo $row['upload_at'];?></span>
                    <span class="infoList__note"><?php echo $row['tag'];?></span>
                    <a href="./news.php?id=<?php echo $row['id'];?>">
                    <h3 class="infoList__title"><?php echo $row['title1'];?></h3></a>
                    
                </li>
        <?php 
            endif;
            endforeach;
            ?>
        </ul>
    </section>
</div>

<?php require 'footer.php'; ?>

<script src="./js/main.js"></script>
</body>
    </html>