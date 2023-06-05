<?php
//0. SESSION開始！！
session_start();

//１．関数群の読み込み
include("funcs.php");

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();


//２．データ登録SQL作成
$pdo = db_conn();
$sql = "SELECT * FROM gs_an_kadai02_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>メディアアート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      <a class="navbar-brand" href="logout.php">ログアウト</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<div>
    <div>　<?=$_SESSION["name"]?>さん、こんにちは！</div>
    <div class="container jumbotron">
    <link rel="stylesheet" href="css/style.css">

    <table>
    
        <tr>
            <th>作家名</th>
            <th>国　</th>
            <th>キーワード　　　　　　　　　</th>
            <th>作品名</th>
            <th>発表年</th>
            <th>解説　　　　　　　　　　　　　　　　</th>
            <th>参照url</th>
        </tr>

    <?php foreach($values as $v){ ?> <!--これはよく使う -->
            <tr> 
            <td><?=$v["name"]?></td>
            <td><?=$v["nationality"]?></td>
            <td><?=$v["keyword"]?></td> 
            <td><?=$v["title"]?></td>
            <td><?=$v["year"]?></td> 
            <td><?=$v["commentary"]?></td>
            <td><a href="<?=$v["url"]?>"><?=$v["url"]?></a></td>
            <?php if($_SESSION["kanri_flg"]==1){?>
            <td><a href="detail.php?id=<?=$v["id"]?>">編集</a></td>
            <td><a href="delete.php?id=<?=$v["id"]?>">削除</a></td>
            <?php }?>
            </tr>
    <?php } ?>
    </table>

  </div>
</div>
<!-- Main[End] -->


<script>
//JSON受け取り
  const a = '<?php echo $json; ?>';
  console.log(JSON.parse(a));
</script>
</body>
</html>
