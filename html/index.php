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
      <div class="logo"><a href=""><img src="/_assets/logo.svg" alt="hpmeister logo" width="160"></a></div>
      <nav><img src="/_assets/menu.svg" alt="" width="30"></nav>
    </header>
    <section id="news">
      <div class="wrapper">
        <h2>information</h2>
<?php // Blogger
  $info = simplexml_load_file("http://info.hpmeister.com/feeds/posts/default");
  //var_dump($info);
  echo '      <ul class="">'.PHP_EOL;
  foreach ($info->entry as $content) {
    echo '        <li>'.nl2br($content->content).'</li>'.PHP_EOL;
  }
  echo '      </ul>'.PHP_EOL;
?>
      </div>
    </section>
    <section id="blog">
      <div class="wrapper">
        <h2>blog</h2>
        <p>覚え書きとしてブログを使用しています。</p>
        <ul>
<?php // ライブドアブログ
  $blog = simplexml_load_file("http://lifelog.hpmeister.com/index.rdf");
  //var_dump($blog);
  foreach ($blog->item as $content) {
    echo '        <li><a href="'.$content->link.'" target="_blank">'.$content->title.'</a></li>'.PHP_EOL;
    $i++;
    if ($i > 9) { break; }
  }
?>
        </ul>
      </div>
    </section>
    <section id="service">
      <div class="wrapper">
        <h2>services</h2>
        <p>hpmeisterが提供しているサービスをご紹介します。</p>
<?php // GoogleSpreadsheet
  $result = file('https://docs.google.com/spreadsheets/d/e/2PACX-1vQT1GF1SLIz-_IB4-LV2LWCvNrgj6W7vCVwnzJGVSPxygdMlPALrSmqhF6TxKo0C5CItx8MKB3YdYWl/pub?output=csv');
  for ( $i = 1; $i < sizeof( $result ); $i++ ) {
    list($id, $service, $description, $more, $disp) = explode( ",", $result[ $i ] );
    if ($disp == 1) {
      echo '      <div class="servicemember">'.PHP_EOL;
      echo '        <h3 class="">'.$service.'</h3>'.PHP_EOL;
      echo '        <p class="">'.$description.'</p>'.PHP_EOL;
      echo '        <button class="servicedetail_button" onclick="">read more</button>'.PHP_EOL;
      include_once '_assets/'.$more;
      echo '      </div>'.PHP_EOL;
    }
  
  }
?>
      </div>
    </section>
    <section id="prof">
      <div class="wrapper">
        <h2>profile</h2>
        <p>hpmeisterのプロフィールです。</p>
        <div class="profwrapper">
<?php // GoogleSpreadsheet
  $result = file('https://docs.google.com/spreadsheets/d/e/2PACX-1vTnVB73Kdp6FWAfcBn5aP7NSZ3G4pXlNhgPV22pkHaPPOQTV727vTgTeFGu9emndeLHPp-pAHCFkWg3/pub?output=csv');
  for ( $i = 1; $i < sizeof( $result ); $i++ ) {
    list($year, $hpm, $world) = explode( ",", $result[ $i ] );
    echo '        <ul class="year">'.PHP_EOL;
    echo '          <li class="title">'.$year.'</h3>'.PHP_EOL;
    echo '          <li class="">'.$hpm.'</li>'.PHP_EOL;
    echo '          <li class="">世の中の出来事</li>'.PHP_EOL;
    echo '          <li class="">'.$world.'</li>'.PHP_EOL;
    echo '        </ul>'.PHP_EOL;

  }
?>
        </div>
      </div>
    </section>
    <footer class="title">
      <div class="wrapper">
        <h2>お問い合わせ</h2>
      </div>
    </footer>
    <footer class="content">
      <div class="wrapper">
        <ul class="socmed">
          <li><a href="mailto:infodesk@hpmeister.com?body=ここを消したのち、お問い合わせの内容をお書きください" target="_blank"><img src="/_assets/mail.svg" alt="">email</a></li>
          <li><a href="https://twitter.com/hpmeister" target="_blank"><img src="/_assets/twitter.svg" alt="">Twitter</a></li>
          <li><a href="https://www.instagram.com/hpmeister/" target="_blank"><img src="/_assets/instagram.svg" alt="">Instagram</a></li>
          <li><a href="https://github.com/kitystudio" target="_blank"><img src="/_assets/github.svg" alt="">GitHub</a></li>
        </ul>
        <div class="footerbottom">
          <small>Copyright &copy; hpmeister.com All Rights Reserved.</small>
        </div>
      </div>
    </footer>
  </div>
</body>
</html>
