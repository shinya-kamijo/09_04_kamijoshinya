<?php

// 入力チェック
if (
    !isset($_POST['name']) || $_POST['name']=='' ||
    !isset($_POST['lid']) || $_POST['lid']=='' ||
    !isset($_POST['lpw']) || $_POST['lpw']=='' ||
    !isset($_POST['kanri']) || $_POST['kanri']=='' ||
    !isset($_POST['life']) || $_POST['life']==''
) {
    exit('ParamError');
}

//POSTデータ取得
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$kanri = $_POST['kanri'];
$life = $_POST['life'];


// DB接続
$dbn = 'mysql:dbname=gsf_d03_db04;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    exit('dbError:'.$e->getMessage());
}
include("functions.php");
$pdo = db_conn();

//データ登録SQL作成
// user_tableのDBに接続
$sql ='INSERT INTO user_table(id, name, lid, lpw, kanri, life, indate)
VALUES(NULL, :a1, :a2, :a3, :a4, :a5, sysdate())';


// 設定の変更
$stmt = $pdo->prepare($sql); 
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $lid, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $kanri, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a5', $life, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();

//データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('sqlError:'.$error[2]);
} else {
    //index.phpへリダイレクト
    header('Location: index.php');
    exit;
}
?>