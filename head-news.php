<?php
 $pdo=new PDO('mysql:host=mysql727.db.sakura.ne.jp;dbname=li-nk_corporate;charset=utf8', 'li-nk', '2018kn-il');
$sql=$pdo->prepare('select * from news where id=?');
$sql->execute([$_REQUEST['id']]);
foreach ($sql->fetchAll() as $row) {
    if($row['draft']!='yes'){?>
    <title>Link | <?php echo $row['title2'];?></title>
    <meta property="og:title" content="Link | <?php echo $row['title2'];}}?>" />
    <meta property="og:description" content="URLしか投稿できないSNS「Link」のコーポレートサイト" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135294052-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-135294052-1');
</script>

</head>