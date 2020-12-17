<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>hpmeister.com</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/spcss@0.5.0">
</head>
<body>
  <div class="thecontent">
    <header>
      <div class="logo"><a href=""><img src="/_assets/logo.svg" alt="hpmeister logo" width="160"></a></div>
      <nav><img src="/_assets/menu.svg" alt=""></nav>
    </header>
    <section id="news">
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
    </section>
    <section id="blog">
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
    </section>
    <section id="service">
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
      echo '        <button onclick="">read more</button>'.PHP_EOL;
      include_once '_assets/'.$more;
      echo '      </div>'.PHP_EOL;
    }
  
  }
?>
    </section>
    <section id="prof">
      <h2>profile</h2>
      <p>hpmeisterのプロフィールです。</p>
<?php // GoogleSpreadsheet
  $result = file('https://docs.google.com/spreadsheets/d/e/2PACX-1vTnVB73Kdp6FWAfcBn5aP7NSZ3G4pXlNhgPV22pkHaPPOQTV727vTgTeFGu9emndeLHPp-pAHCFkWg3/pub?output=csv');
  for ( $i = 1; $i < sizeof( $result ); $i++ ) {
    list($year, $hpm, $world) = explode( ",", $result[ $i ] );
    echo '      <div class="year">'.PHP_EOL;
    echo '        <h3 class="">'.$year.'</h3>'.PHP_EOL;
    echo '        <p class="">'.$hpm.'</p>'.PHP_EOL;
    echo '        <p class="">そのころ世間では</p>'.PHP_EOL;
    echo '        <p class="">'.$world.'</p>'.PHP_EOL;
    echo '      </div>'.PHP_EOL;
  
  }
?>

    </section>
    <footer>
      <h2>お問い合わせ</h2>
      <ul>
        <li><a href=""><img src="/_assets/mail.svg" alt=""></a></li>
        <li><a href=""><img src="/_assets/twitter.svg" alt=""></a></li>
        <li><a href=""><img src="/_assets/instagram.svg" alt=""></a></li>
        <li><a href=""><img src="/_assets/github.svg" alt=""></a></li>
      </ul>
      <div class="footerbottom">
        <small>Copyright &copy; hpmeister.com All Rights Reserved.</small>
      </div>
    </footer>
  </div>
</body>
</html>
