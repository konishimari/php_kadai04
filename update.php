<?php
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更
//1. POSTデータ取得
var_dump($_POST);
$name   = $_POST["name"];
$nationality  = $_POST["nationality"];
$keyword = $_POST["keyword"];
$title    = $_POST["title"]; 
$year    = $_POST["year"]; 
$commentary  = $_POST["commentary"]; 
$url  = $_POST["url"]; 
$id     = $_POST["id"];

//2. DB接続します
include("funcs.php");

//３．データ登録SQL作成
$pdo = db_conn();
$sql = "UPDATE gs_an_kadai02_table SET name=:name,nationality=:nationality,keyword=:keyword,title=:title,year=:year,commentary=:commentary,url=:url WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':nationality',  $nationality,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':keyword',    $keyword,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':year',     $year,     PDO::PARAM_INT);
$stmt->bindValue(':commentary',     $commentary,     PDO::PARAM_STR);
$stmt->bindValue(':url',     $url,     PDO::PARAM_STR);
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);

$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){   
    sql_error($stmt);//関数sql＿errorを実行
}else{
    redirect("select.php");   
}



?>
