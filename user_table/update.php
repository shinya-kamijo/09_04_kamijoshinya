<?php
// 関数ファイル読み込み
include("functions.php");

//入力チェック(受信確認処理追加)
if (
    !isset($_POST['lid']) || $_POST['lid']=='' ||
    !isset($_POST['lpw']) || $_POST['lpw']==''
    !isset($_POST['kanri']) || $_POST['kanri']=='' ||
    !isset($_POST['life']) || $_POST['life']==''
) {
    exit('ParamError');
}

//POSTデータ取得
$id =$_POST["id"];
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$kanri = $_POST['kanri'];
$life = $_POST['life'];


//DB接続します(エラー処理追加)
$pdo =db_conn();

//データ登録SQL作成
$sql = "UPDATE php02_table SET name=:a1, lid=:a2, lpw=:a3, kanri=:a4, life=:a5 WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $lid, PDO::PARAM_STR);
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':a4', $kanri, PDO::PARAM_STR);
$stmt->bindValue(':a5', $life, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    header("Location: select.php");
    exit;
}
