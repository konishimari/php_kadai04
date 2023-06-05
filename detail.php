<?php
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
$id = $_GET["id"];
include("funcs.php");
sschk();
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_an_kadai02_table WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
// 
$v = $stmt->fetch();

?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
理由：入力項目は「登録/更新」はほぼ同じになるからです。
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" >
  <link rel="stylesheet" href="style.css" >


  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
   <legend>Media Art Index</legend>
   
     <label>作家名：   <input type="varChar 64" name="name" value="<?=$v["name"]?>"></label><br>
     <label>国：      <input type="varChar 64" name="nationality" value="<?=$v["nationality"]?>"></label><br>
     <label>キーワード：<input type="varChar 30" name="keyword" value="<?=$v["keyword"]?>"></label><br>
     <label>作品名：   <input type="varChar 64" name="title" value="<?=$v["title"]?>"></label><br>
     <label>発表年：   <input type="varChar 12" name="year" value="<?=$v["year"]?>"></label><br>
     <!-- textAreaの場合、valueにデータベースから取ってきた値をいれず、外に出しておく  -->
     <label>解説：     <textArea name="commentary" rows="10" cols="50" value="commentary"><?=$v["commentary"]?></textArea></label><br>
     <label>参照url：  <input type="text" name="url" value="<?=$v["url"]?>"></label><br>
     <input type="hidden" name="id" value="<?=$v["id"]?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>



