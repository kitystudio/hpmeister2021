<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>hpmeister.com</title>
  <link rel="stylesheet" href="/_assets/css/main.css">
</head>

<body>
  <div class="thecontent">
    <header>
      <div class="logo"><a href="https://2021.hpmeister.com/"><img src="/_assets/logo.svg" alt="hpmeister logo" width="160"></a></div>
      <nav>
        <img src="/_assets/menu.svg" alt="" width="30" class="menutoggle">
        <div class="menu">
          <ul>
            <li><a href="#news">page top</a></li>
            <li><a href="#service">service</a></li>
            <li><a href="#prof">profile</a></li>
            <li><a href="#contact">contact</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <section id="news">
      <div class="wrapper">
        <h2 class="sectiontitle">information</h2>
        <ul>
<?php // Blogger
  $info = simplexml_load_file("http://info.hpmeister.com/feeds/posts/default");
  //var_dump($info);
  foreach ($info->entry as $content) {
?>
          <li><?=nl2br($content->content)?></li>
<?php
  }
?>
        </ul>
      </div>
    </section>
    <section id="blog">
      <div class="wrapper">
        <h2 class="sectiontitle">blog</h2>
        <!--        <p>覚え書きとしてブログを使用しています。</p>-->
        <ul>
<?php // ライブドアブログ
  $blog = simplexml_load_file("http://lifelog.hpmeister.com/index.rdf");
  //var_dump($blog);
  foreach ($blog->item as $content) {
?>
          <li><a href="<?=$content->link?>" target="_blank"><?=$content->title?></a></li>
<?php
    $i++;
    if ($i > 9) { break; }
  }
?>
        </ul>
      </div>
    </section>
    <section id="service">
      <div class="wrapper">
        <h2 class="sectiontitle">services</h2>
        <p>hpmeisterが提供しているサービスをご紹介します。</p>
      </div>
      <div class="serviceswrapper">
<?php // GoogleSpreadsheet
  $result = file('https://docs.google.com/spreadsheets/d/e/2PACX-1vQT1GF1SLIz-_IB4-LV2LWCvNrgj6W7vCVwnzJGVSPxygdMlPALrSmqhF6TxKo0C5CItx8MKB3YdYWl/pub?output=csv');
  for ( $i = 1; $i < sizeof( $result ); $i++ ) {
    list($id, $service, $description, $more, $disp) = explode( ",", $result[ $i ] );
    if ($disp == 1) {
?>
        <div class="servicemember">
          <h3 class="title"><?=$service?></h3>
          <p class="description"><?=$description?></p>
          <button class="servicedetail_button">read more</button>
<?php
      include_once '_assets/'.$more;
?>
        </div>
<?php
    }
  
  }
?>
      </div>
    </section>
    <section id="prof">
      <div class="wrapper">
        <h2 class="sectiontitle">profile</h2>
        <p>hpmeisterの経歴とプロフィールです。</p>
      </div>
      <div class="profwrapper">
<?php // GoogleSpreadsheet
  $result = file('https://docs.google.com/spreadsheets/d/e/2PACX-1vTnVB73Kdp6FWAfcBn5aP7NSZ3G4pXlNhgPV22pkHaPPOQTV727vTgTeFGu9emndeLHPp-pAHCFkWg3/pub?output=csv');
//  for ( $i = 1; $i < sizeof( $result ); $i++ ) {
  for ( $i = sizeof( $result ) - 1; $i > 0; $i-- ) {
    list($year, $hpm, $world) = explode( ",", $result[ $i ] );
?>

        <ul class="year">
          <li class="title"><?=$year?></li>
          <li class="personal"><?=$hpm?></li>
          <li class="static">世の中の出来事</li>
          <li class="world"><?=$world?></li>
        </ul>
<?php
  }
?>
      </div>
    </section>
    <footer class="title">
      <div class="wrapper">
        <h2>お問い合わせ</h2>
      </div>
    </footer>
    <footer class="content" id="contact">
      <div class="wrapper">
        <ul class="socmed">
          <li><a href="mailto:infodesk@hpmeister.com?body=ここを消したのち、お問い合わせの内容をお書きください" target="_blank"><img src="/_assets/mail.svg" alt="email">email</a></li>
          <li><a href="https://twitter.com/hpmeister" target="_blank"><img src="/_assets/twitter.svg" alt="Twitter">Twitter</a></li>
          <li><a href="https://www.instagram.com/hpmeister/" target="_blank"><img src="/_assets/instagram.svg" alt="Instagram">Instagram</a></li>
          <li><a href="https://github.com/kitystudio" target="_blank"><img src="/_assets/github.svg" alt="GiyHub">GitHub</a></li>
        </ul>
        <div class="footerbottom">
          <small>Copyright &copy; hpmeister.com All Rights Reserved.</small>
        </div>
      </div>
    </footer>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="/_assets/main.js"></script>
</body>

</html>
