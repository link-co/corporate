<?php
$sql1=$pdo->prepare('select * from news where id=?');
$sql1->bindValue(1, $_REQUEST['id'], PDO::PARAM_INT);
$sql1->execute();
$pressbody=$sql1->fetchAll();


$resentpress3=$pdo->query('select * from news order by upload_at DESC LIMIT 3');
?>