<?php
//必ずsession_startは最初に記述
session_start();

//SESSIONを初期化（配列を空にする）
// メモリに残っているIDセッションのIDを削除
$_SESSION = array();

//Cookieに保存してあるsessionIDの保存期間を過去にして破棄
// クッキーの記憶も削除

if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}

//サーバ側での、セッションIDの破棄
session_destroy();


// ここまでで、全てのIDを削除している
//処理後，ログイン画面へリダイレクト
header("Location: login.php");
exit();
