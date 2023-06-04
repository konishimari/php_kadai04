<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>アートデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">メディアアートデータ一覧へ</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>Media Art Index 入力ページ</legend>
     <label>作家名：   <input type="varChar 64" name="name"></label><br>
     <label>国：      <input type="varChar 64" name="nationality"></label><br>
     <label>キーワード：<input type="varChar 30" name="keyword"></label><br>
     <label>作品名：   <input type="varChar 64" name="title"></label><br>
     <label>発表年：   <input type="varChar 12" name="year"></label><br>
     <label>解説：     <textArea name="commentary" rows="10" cols="50"></textArea></label><br>
     <label>参照url：  <input type="text" name="url"></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>