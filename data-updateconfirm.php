<?php

date_default_timezone_set('Asia/Tokyo');
        $timestamp = date("Y.m.d");
        $sql=$pdo->prepare("update news set title1=?,title2=?,text=?,tag=?,image=?,draft=?,upload_at=? where id=?");
        $update=$sql->execute([$_REQUEST['title1'],$_REQUEST['title2'],$_REQUEST['text'],
            $_REQUEST['tag'],$_REQUEST['image'],$_REQUEST['draft'],$timestamp,$_REQUEST['id']]);
        ?>