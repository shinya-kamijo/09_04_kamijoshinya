<?php
// var_dump($_GET);
// exit();
// 関数ファイルの読み込み
include("functions.php");

// getで送信されたidを取得
$id = $_GET["id"];

//データベースでの接続します
$pdo = db_conn();


//データ登録SQL作成，指定したidのみ表示する
$sql = 'SELECT * FROM php02_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
if ($status==false) {
    // エラーのとき
    errorMsg($stmt);
} else {
    // エラーでないとき
    $rs = $stmt->fetch();
    // fetch()で1レコードを取得して$rsに入れる
    // $rsは配列で返ってくる．$rs["id"], $rs["task"]などで値をとれる
    // var_dump()で見てみよう

}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>更新ページ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div{
            padding: 10px;
            font-size:16px;
            }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">更新ページ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">入力フォーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="select.php">登録履歴一覧</a>
                    </li>
                      <li class="nav-item">
                        <a class="nav-link" href="../select.php">todo一覧に戻る</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <form method="post" action="update.php">
        <div class="form-group">
            <label for="name">名前</label>
            <!-- 受け取った値をvaluesに埋め込もう -->
            <input type="text" class="form-control" id="name" name="name" value="<?=$rs["name"]?>">
        </div>
        <div class="form-group">
            <label for="lid">ID</label>
            <!-- 受け取った値をvaluesに埋め込もう -->
            <input type="text" class="form-control" id="lid" name="lid" value="<?=$rs["lid"]?>">
        </div>
        <div class="form-group">
            <label for="lpw">パスワード</label>
            <!-- 受け取った値挿入しよう -->
            <input type="text" class="form-control" id="lpw" name="lpw"  value="<?=$rs["lpw"]?>">
        </div>

      <div class="form-group">
            <label for="kanri">一般人は0、有権者は1を記入</label><br>
          <input type="text"   size="2" id="kanri" name="kanri" value="<?=$rs["kanri"]?>">
           </div>

         <div class="form-group">
           <label for="life">アクティブは0、非アクティブは1を記入</label><br>
          <input type="text"    size="2" id="life" name="life" value="<?=$rs["life"]?>">
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- idは変えたくない = ユーザーから見えないようにする-->
        <input type="hidden" name="id" value="<?=$rs["id"]?>">
    </form>

</body>

</html>