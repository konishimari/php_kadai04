<?php
//1. POSTデータ取得
$name  = $_POST["name"];
$nationality = $_POST["nationality"];
$keyword   = $_POST["keyword"];
$title   = $_POST["title"];
$year   = $_POST["year"];
$commentary = $_POST["commentary"];
$url   = $_POST["url"];

//2. DB接続します(db名を間違えない！テーブル名ではない)
// try {
//   //Password:MAMP='root',XAMPP=''
//   $pdo = new PDO('mysql:dbname=gs_db_kadai02;charset=utf8;host=localhost','root','');
// } catch (PDOException $e) {
//   exit('DBConectError:'.$e->getMessage());
// }
include("funcs.php");
$pdo=db_conn();

//３．データ登録SQL作成　ここはINSERT INTOテーブル名
$sql = "INSERT INTO gs_an_kadai02_table(id,name,nationality,keyword,title,year,commentary,url,indate)VALUES(Null,:name, :nationality, :keyword, :title, :year, :commentary, :url,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name',  $name,  PDO::PARAM_STR);  
$stmt->bindValue(':nationality', $nationality, PDO::PARAM_STR);  
$stmt->bindValue(':keyword',   $keyword,   PDO::PARAM_STR);  
$stmt->bindValue(':title',$title,PDO::PARAM_STR); 
$stmt->bindValue(':year',$year,PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':commentary',$commentary,PDO::PARAM_STR); 
$stmt->bindValue(':url',$url,PDO::PARAM_STR);  
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){   
  sql_error($stmt);//関数sql＿errorを実行
}else{
  redirect("select.php");   
}
?>
