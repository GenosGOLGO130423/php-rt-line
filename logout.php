<?php
  session_start();

  $_SESSION = array();
// セッションを切断するにはセッションクッキーも削除する。
// Note: セッション情報だけでなくセッションを破壊する。
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
  }
    // 最終的に、セッションを破壊する
    session_destroy();

    //Cookie情報も削除する
    setcookie('email', '', time() - 3600);
    setcookie('password', '', time() - 3600);

header('Loaction:login.php');
exit();
?>
