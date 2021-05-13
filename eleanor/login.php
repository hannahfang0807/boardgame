<?php
//啟動 session
session_start();

header("Content-Type: text/html; chartset=utf-8");

//引用資料庫連線
require_once('./db.connect.php');

if( isset($_POST['username']) && isset($_POST['pwd']) ){
    //SQL 語法
    $sql = "SELECT `memberId`, `memberAccount`, `memberPwd`, `memberName`
            FROM `members` 
            WHERE `memberAccount` = ?
            AND `memberPwd` = ?";

    $arrParam = [
        $_POST['username'],
        sha1($_POST['pwd'])
    ];

    $pdo_stmt = $pdo->prepare($sql);
    $pdo_stmt->execute($arrParam);

    if( $pdo_stmt->rowCount() > 0 ){
        //將傳送過來的 post 變數資料，放到 session，
        $_SESSION['username'] = $_POST['username'];
        //3 秒後跳頁

        $res = $pdo_stmt->fetchAll()[0];
        echo "你好 ".$res['memberName'];
        // $_SESSION['memberId'] = $res['memberId'];

        echo"<br>";
        header("Refresh: 3; url=./reservations.php");
        echo "3秒後自動進入預約頁面";
    } else {
        header("Refresh: 3; url=./index.php");
        echo "登入失敗…3秒後自動回登入頁";
    }
} else {
    header("Refresh: 3; url=./index.php");
    echo "請確實登入…3秒後自動回登入頁";
}
