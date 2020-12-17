<!DOCTYPE html>
<html lang="en">
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
      <nav></nav>
    </header>
    <section id="news">
<?php
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
      <h1>blog</h1>
      <p>覚え書きとしてブログを使用しています。</p>
<?php // ライブドアブログ
  $blog = simplexml_load_file("http://lifelog.hpmeister.com/index.rdf");
  //var_dump($blog);
  foreach ($blog->item as $content) {
    echo '      <dl>'.PHP_EOL;
    echo '        <dt><a href="'.$content->link.'" target="_blank">'.$content->title.'</a></dt>'.PHP_EOL;
    echo '        <dd class="">'.nl2br($content->description).'</dd>'.PHP_EOL;
    echo '      </dl>'.PHP_EOL;
    $i++;
    if ($i > 5) { break; }
  }
?>
    </section>
    <section id="service">
      <h1>services</h1>
      <p>われわれが提供しているサービスをご紹介します。</p>
<?php
  $result = file('https://docs.google.com/spreadsheets/d/e/2PACX-1vQT1GF1SLIz-_IB4-LV2LWCvNrgj6W7vCVwnzJGVSPxygdMlPALrSmqhF6TxKo0C5CItx8MKB3YdYWl/pub?output=csv');
  for ( $i = 1; $i < sizeof( $result ); $i++ ) {
    list($id, $service, $description, $more, $disp) = explode( ",", $result[ $i ] );
    if ($disp == 1) {
      echo '      <div class="servicemember">'.PHP_EOL;
      echo '        <h2 class="">'.$service.'</h2>'.PHP_EOL;
      echo '        <p class="">'.$description.'</p>'.PHP_EOL;
      echo '        <button onclick="location.href=\'/_assets/'.$more.'\'">read more</button>'.PHP_EOL;
      echo '      </div>'.PHP_EOL;
    }
  
  }
?>
    </section>
    <section id="prof">
      <h1>profile</h1>
      <p>hpmeisterのプロフィールです。</p>
    </section>
    <footer></footer>
  </div>
</body>
</html>
