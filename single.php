<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
require 'head.php';
?>

<body>

<?php
require 'spHeader.php';
require 'nav.php';
?>

<div class="container --flex">

<div class="column sidebar">
    <div class="column__inner">
        <h1 class="column__title">大会情報－詳細</h1>
        <p class="column__body">
            要項・ドロー・結果別の大会情報
        </p>
        <form class="ib" action="./search.php" method="post" class="Form">
        <input class="searchBox" type="text" placeholder="大会を検索" name="search">
        </form>
    </div>
</div>

<div class="column infoBlock">
    <div class="infoBlock__head">
        <h3 class="infoBlock__title">平成30年度東京都テニス大会</h3>
    </div>
    <div class="infoBlock__body">
        <span class="infoBlock__subtitle">カテゴリー名</span>
        <a class="button --black" href="#">リンクボタン1</a>
        <a class="button --black" href="#">リンクボタン2</a>
        <a class="button --black" href="#">リンクボタン3</a>
    </div>
</div>

<div class="container --flex --small --grey">
        
        <div class="cardsContainer u-sp-bgLG">
            <div class="cardsContainer__head">
                <h2 class="cardsContainer__title">締切一覧</h2>
            </div>
            <ul class="cardsContainer__body previewCards__body">
                 <?php 
            $deadlines=array(0);
            $i=0;
             $sql=$pdo->prepare('select * from info where type="outline" and deadline >= ? order by deadline ASC, upload_at DESC');
             date_default_timezone_set('Asia/Tokyo');
           $timestamp = date("Y-m-d");
            $sql->execute([$timestamp]);
           foreach($sql->fetchAll() as $row){
                array_push($deadlines,$row['deadline']);
                if($deadlines[$i]!=$deadlines[$i+1] && $i==0){
                     if($row['tag1']!="" && $row['tag2']!=""){
           echo ' <li class="deadlineCards">
                <span class="deadlineCards__title">',$row['deadline'],'</span>
                 <ul class="previewCards__body">
                   <li class="entryCard columnEntryCard --outline">
                        <a href="info.php?id=',$row['id'],'"><span class="entryCard__date">更新日：',$row['upload_at'],'</span>
                            <h3 class="entryCard__title --row">',$row['name'],'</h3>
                            <span class="entryCard__note">',$row['tag1'],'</span><span class="entryCard__note">',$row['tag2'],'</span>
                        </a>
                    </li>';
                     }
                else if($row['tag1']!="" && $row['tag2']==""){           
                        echo ' <li class="deadlineCards">
                <span class="deadlineCards__title">',$row['deadline'],'</span>
                 <ul class="previewCards__body">
                   <li class="entryCard columnEntryCard --outline">
                        <a href="info.php?id=',$row['id'],'"><span class="entryCard__date">更新日：',$row['upload_at'],'</span>
                            <h3 class="entryCard__title --row">',$row['name'],'</h3>
                            <span class="entryCard__note">',$row['tag1'],'</span>
                        </a>
                    </li>';
                     }   
                   else if
            ($row['tag1']=="" && $row['tag2']!=""){   
                         echo ' <li class="deadlineCards">
                <span class="deadlineCards__title">',$row['deadline'],'</span>
                 <ul class="previewCards__body">
                   <li class="entryCard columnEntryCard --outline">
                        <a href="info.php?id=',$row['id'],'"><span class="entryCard__date">更新日：',$row['upload_at'],'</span>
                            <h3 class="entryCard__title --row">',$row['name'],'</h3>
                            <span class="entryCard__note">',$row['tag2'],'</span>
                        </a>
                    </li>';
                     }   
                  else{
                      echo ' <li class="deadlineCards">
                <span class="deadlineCards__title">',$row['deadline'],'</span>
                <ul class="previewCards__body">
                   <li class="entryCard columnEntryCard --outline">
                        <a href="info.php?id=',$row['id'],'"><span class="entryCard__date">更新日：',$row['upload_at'],'</span>
                            <h3 class="entryCard__title --row">',$row['name'],'</h3>
                            
                        </a>
                    </li>';
                  }     
                }

                else if($deadlines[$i]!=$deadlines[$i+1] && $i!=0){
                    if($row['tag1']!="" && $row['tag2']!=""){
                    echo '
                    </ul>
            </li><li class="deadlineCards">
                <span class="deadlineCards__title">',$row['deadline'],'</span>
               <ul class="previewCards__body">
                  <li class="entryCard columnEntryCard --outline">
                        <a href="info.php?id=',$row['id'],'"><span class="entryCard__date">更新日：',$row['upload_at'],'</span>
                            <h3 class="entryCard__title --row">',$row['name'],'</h3>
                            <span class="entryCard__note">',$row['tag1'],'</span><span class="entryCard__note">',$row['tag2'],'</span>
                        </a>
                    </li>';
                }
                  else if($row['tag1']!="" && $row['tag2']==""){   
                      echo '
                    </ul>
            </li><li class="deadlineCards">
                <span class="deadlineCards__title">',$row['deadline'],'</span>
                <ul class="previewCards__body">
                  <li class="entryCard columnEntryCard --outline">
                        <a href="info.php?id=',$row['id'],'"><span class="entryCard__date">更新日：',$row['upload_at'],'</span>
                            <h3 class="entryCard__title --row">',$row['name'],'</h3>
                            <span class="entryCard__note">',$row['tag1'],'</span>
                        </a>
                    </li>';
                }
                   else if
            ($row['tag1']=="" && $row['tag2']!=""){   
                          echo '
                    </ul>
            </li><li class="deadlineCards">
                <span class="deadlineCards__title">',$row['deadline'],'</span>
                <ul class="previewCards__body">
                  <li class="entryCard columnEntryCard --outline">
                        <a href="info.php?id=',$row['id'],'"><span class="entryCard__date">更新日：',$row['upload_at'],'</span>
                            <h3 class="entryCard__title --row">',$row['name'],'</h3>
                            <span class="entryCard__note">',$row['tag2'],'</span>
                        </a>
                    </li>';
                }
                    else{
                            echo '
                    </ul>
            </li><li class="deadlineCards">
                <span class="deadlineCards__title">',$row['deadline'],'</span>
                <ul class="previewCards__body">
                  <li class="entryCard columnEntryCard --outline">
                        <a href="info.php?id=',$row['id'],'"><span class="entryCard__date">更新日：',$row['upload_at'],'</span>
                            <h3 class="entryCard__title --row">',$row['name'],'</h3>
                        </a>
                    </li>';
                    }
                }  
                else{
                    if($row['tag1']!="" && $row['tag2']!=""){
                    echo '<li class="entryCard columnEntryCard --outline">
                <a href="./info.php?id=',$row['id'],'">
                 <span class="entryCard__date">更新日：',$row['upload_at'],'</span>
                    <h3 class="entryCard__title">',$row['name'],'</h3>
                    <span class="entryCard__note">',$row['tag1'],'</span><span class="entryCard__note">',$row['tag2'],'</span>
                </a>
            </li>';
                    }
                    else if($row['tag1']!="" && $row['tag2']==""){
                      echo '<li class="entryCard columnEntryCard --outline">
                <a href="./info.php?id=',$row['id'],'">
                 <span class="entryCard__date">更新日：',$row['upload_at'],'</span>
                    <h3 class="entryCard__title">',$row['name'],'</h3>
                    <span class="entryCard__note">',$row['tag1'],'</span>
                </a>
            </li>';
                    }
                 else if
            ($row['tag1']=="" && $row['tag2']!=""){   
                     echo '<li class="entryCard columnEntryCard --outline">
                <a href="./info.php?id=',$row['id'],'">
                 <span class="entryCard__date">更新日：',$row['upload_at'],'</span>
                    <h3 class="entryCard__title">',$row['name'],'</h3>
                    <span class="entryCard__note">',$row['tag2'],'</span>
                </a>
            </li>';
                    }
                    else{
                       echo '<li class="entryCard columnEntryCard --outline">
                <a href="./info.php?id=',$row['id'],'">
                 <span class="entryCard__date">更新日：',$row['upload_at'],'</span>
                    <h3 class="entryCard__title">',$row['name'],'</h3>
                </a>
            </li>'; 
                    }
                    
                }
               $i+=1;
               }
            ?><!--
                <li class="deadlineCards">
                    <span class="deadlineCards__title">12月12日</span>
                    <ul class="previewCards__body">
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="deadlineCards">
                    <span class="deadlineCards__title">12月12日</span>
                    <ul class="previewCards__body">
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="deadlineCards">
                    <span class="deadlineCards__title">12月12日</span>
                    <ul class="previewCards__body">
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="deadlineCards">
                    <span class="deadlineCards__title">12月12日</span>
                    <ul class="previewCards__body">
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>
                        <li class="entryCard columnEntryCard">
                            <a href="#">
                                <h3 class="entryCard__title --row">平成30年度東京都テニス大会</h3>
                                <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                            </a>
                        </li>-->
                    </ul>
                </li>
            </ul>
        </div>
        
           
        <div class="cardsContainer recommendCards">
            <div class="cardsContainer__head">
                <h2 class="cardsContainer__title">関連大会</h2>
            </div>
            <ul class="cardsContainer__body previewCards__body">
                <li class="entryCard columnEntryCard">
                    <a href="#">
                        <h3 class="entryCard__title">平成30年度東京都テニス大会</h3>
                        <span class="entryCard__note">東京</span><span class="entryCard__note">関東公認</span>
                    </a>
                </li>  
            </ul>
        </div>
    
        
</div>

</div>

<?php require 'footer.php'; ?>

<?php require 'spNav.php'; ?>

</body>