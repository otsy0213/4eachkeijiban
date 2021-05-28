<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>4eachblog 掲示板</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php 

mb_internal_encoding("utf8");
$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
$stmt = $pdo->query("select * from 4each_keijiban");

?>
<header>
      <div class="header-logo">
          <img src="4eachblog_logo.jpg" alt="4each">
      </div>
      <div class="header-menu">
          <ul class="header-list">
              <li>トップ</li>
              <li>プロフィール</li>
              <li>4eachについて</li>
              <li>登録フォーム</li>
              <li>問い合わせ</li>
              <li>その他</li>
          </ul>
      </div>
  </header>
  <!-- メイン -->
  <main>
      <section class="leftside">
      <h1>プログラミングに役立つ掲示板</h1>
    <form method="post" action="insert.php">
        <div>
            <label>ハンドルネーム</label>
            <br>
            <input type="text" class="text" size="35" name="handlename">
            <?php echo $_POST["name"];?>
        </div>

        <div>
            <label>タイトル</label>
            <br>
            <input type="text" class="text" size="35" name="title">
            <?php echo $_POST["title"];?>
        </div>

        <div>
            <label>コメント</label>
            <br>
            <textarea name="comments" id="" cols="35" rows="7"></textarea>
            <?php echo $_POST["comments"];?>
        </div>

        <div>
            <input type="submit" class="submit" value="送信する">
        </div>
    </form>
    <?php 
    
    while($row = $stmt->fetch()){
        echo "<div class='kiji'>";
        echo    "<h3>".$row['title']."<h3>";
        echo    "<div class='kiji-contents'>";
        echo        $row['comments'];
        echo        "<div class='handlename'>posted by".$row['handlename']."</div>";
        echo    "</div>";
        echo "</div>";
    }

    ?>
      </section>
      <section class="rightside">
          <h3>人気の記事</h3>
          <ul>
              <li>PHPおすすめ本</li>
              <li>PHP　MyAdminの使い方</li>
              <li>いま人気のエディタTop5</li>
              <li>HTMLの基礎</li>
          </ul>
          <h3>オススメリンク</h3>
          <ul>
              <li>インターノウス株式会社</li>
              <li>XAMPPのダウンロード</li>
              <li>Eclipseのダウンロード</li>
              <li>Bracketsのダウンロード</li>
          </ul>
          <h3>カテゴリ</h3>
          <ul>
              <li>HTML</li>
              <li>PHP</li>
              <li>MYSQL</li>
              <li>JavaScript</li>
          </ul>
      </section>
  </main>
  <!-- フッター -->
  <footer>
      copyright internous | 4each blog is the one whick A to Z about programming.
  </footer>
</body>
</html>