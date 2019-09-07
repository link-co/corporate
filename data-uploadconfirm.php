<?php
date_default_timezone_set('Asia/Tokyo');
        $timestamp = date("Y.m.d");
        $sql=$pdo->prepare("insert into news values(null,?,?,?,?,?,?,?)");
        
$upload=$sql->execute([
			$_REQUEST['title1'],$_REQUEST['title2'],$_REQUEST['text'], $_REQUEST['tag'],$_REQUEST['image'],$_REQUEST['draft'],$timestamp])
        ?>