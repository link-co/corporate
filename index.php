<?php
require_once('data.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/websaite#">
    <meta property="og:type" content="website" />
    
<?php
error_reporting(E_ALL & ~E_NOTICE);

require 'head.php';
?>

<body>

<?php require 'header.php'; ?>

<!--
------------------------------
    プロダクト
------------------------------
-->
<div id="product" class="container --first">
    <section class="section">
        <h2 class="section__head">プロダクト</h2>
        <div class="product">
            <div class="product__thumb"><a href="https://www.li-nk.link"><img src="./images/eyecatch7.png" alt="アイキャッチ画像"></a></div>
            <div class="product__main">
                <h3 class="product__head">
Enrich the World<br>
〜人々の生活を少しずつ豊かに〜</h3>
                <p class="product__body">
                インターネットは黎明期より人々の生活を豊かにするために活用されてきました。そのなかで、便利さとは裏腹な問題も生じてきたこともまた事実です。<br>
<br>
われわれLinkはインターネットは便利なものであり、人々の生活を少しずつ豊かにするものであると考えています。この考えを実現すべく、『Enrich the World』をビジョンに掲げ事業に取り組みます。</p>
                    <div id="webdiv"><a href="https://li-nk.link" id="toweb"><c>Web版はこちら</c></a></div>
                
                <!--
                <a href="#" class="button --left">App Store</a>
                <a href="#" class="button">Google Play</a>
                -->
            </div>
        </div>
    </section>
</div>

<!--
------------------------------
    企業情報
------------------------------
-->
<div id="corp" class="container --yellow">
    <section class="section">
        <h2 class="section__head">企業情報</h2>
        <table class="corpTable">
            <tr class="corpTable__row">
                <th class="corpTable__head">会社名</th>
                <td class="corpTable__body">株式会社Link（英：Link Co. Ltd.）</td>
            </tr>
            <tr class="corpTable__row">
                <th class="corpTable__head">住所</th>
                <td class="corpTable__body">東京都世田谷区</td>
            </tr>
            <tr class="corpTable__row">
                <th class="corpTable__head">事業内容</th>
                <td class="corpTable__body">ウェブサービス・アプリ開発および提供</td>
            </tr>
            <tr class="corpTable__row">
                <th class="corpTable__head">設立</th>
                <td class="corpTable__body">2019年02月</td>
            </tr>
            <tr class="corpTable__row">
                <th class="corpTable__head">メールアドレス</th>
                <td class="corpTable__body">info@co-ltd.link</td>
            </tr>
        </table>
    </section>
</div>

<!--
------------------------------
    プレスルーム
------------------------------
-->
<div id="press" class="container">
    <section class="section">
        <h2 class="section__head">プレスルーム</h2>
        <ul class="listParent --info">
            <?php
            
            foreach ($resentpress as $row) :
                if($row['draft']!='yes'):
                ;?>
                <li class="infoList">
                    <span class="infoList__note"><?php echo $row['upload_at'];?></span>
                    <span class="infoList__note"><?php echo $row['tag'];?></span>
                    <h3 class="infoList__title"><a href="./news.php?id=<?php echo $row['id'];?>"><?php echo $row['title1'];?></a></h3>
                </li>
                <?php 
            endif;
            endforeach;
            ?> 
        </ul>
    </section>
</div>


<!--
------------------------------
    メンバー
------------------------------
-->
<div id="members" class="container --yellow">
    <!--<div class="circle"></div>-->
    <section class="section">
        <h2 class="section__head">メンバー</h2>
        <ul class="listParent --member">
            <li class="memberCard">
                <img src="./images/ayumu-kobayashi.jpg" alt="小林" class="memberCard__thumb">
                <h4 class="">
                    <span class="memberCard__text --name">小林歩</span>
                    <span class="memberCard__text">Ayumu KOBAYASHI</span>
                </h4>
                <span class="memberCard__text">CEO/UI・UXデザイナー</span>
                <span class="memberCard__text">慶應義塾大学SFC在学中</span>
            </li>
            <li class="memberCard">
                <img src="./images/hiroki-tomita.jpg" alt="冨田" class="memberCard__thumb">
                <h4 class="">
                    <span class="memberCard__text --name">冨田大貴</span>
                    <span class="memberCard__text">Hiroki TOMITA</span>
                </h4>
                <span class="memberCard__text">COO</span>
                <span class="memberCard__text">慶應義塾大学SFC在学中</span>
            </li>
        </ul>
    </section>
</div>

<!--
------------------------------
    採用情報
------------------------------
-->
<div id="recruit" class="container">
    <section class="section">
        <h2 class="section__head">採用情報</h2>
        <div class="textBox">
            <iframe src= "https://docs.google.com/forms/d/e/1FAIpQLScJM55KqM4Rh6R0jTeW74uyIlUUXn1LB_jiC2uHNFCHJiCGaQ/viewform?embedded=true" width="640" height="912" frameborder="0" marginheight="0" marginwidth="0"></iframe>
        </div>
    </section>
</div>

<?php require 'footer.php'; ?>

<script src="./js/main.js"></script>
</body>
    </html>