<?php
require_once('./db.inc.php');

$objResponse['success'] = false;
$objResponse['info'] = "登入失敗";

if( isset($_POST['memberAccount']) && isset($_POST['memberPwd'])  ){
    $sql = "SELECT `memberAccount`, `memberPwd` , `memberId`
            FROM `members`
            WHERE `memberAccount` = ?
            AND `memberPwd` = ? ";

    $arrParam = [
        $_POST['memberAccount'],
        sha1($_POST['memberPwd']),
    ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrParam);

    if ( $stmt->rowCount() > 0 ){
        session_start();
        $_SESSION['memberAccount'] = $_POST['memberAccount'];
        $_SESSION['memberId'] = $stmt->fetchAll()[0]['memberId'];

        header("Refresh: 3; url=./index.php");
        echo "登入成功!!! 3秒後自動進入跳轉頁面";
    } else {
        header("Refresh: 3; url=./index.php");
        echo "登入失敗...3秒後自動回登入頁";
    }
} else {
    header("Refresh: 3; url=./index.php");
        echo "請確實登入...3秒後自動回登入頁";
}

?>