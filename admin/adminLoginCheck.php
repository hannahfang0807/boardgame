<?php
require_once('../db.inc.php');

$objResponse['success'] = false;
$objResponse['info'] = "登入失敗";

if( isset($_POST['adminAccount']) && isset($_POST['adminPwd'])  ){
    $sql = "SELECT `adminAccount`, `adminPwd`
            FROM `admin`
            WHERE `adminAccount` = ?
            AND `adminPwd` = ? ";

    $arrParam = [
        $_POST['adminAccount'],
        sha1($_POST['adminPwd'])
    ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrParam);

    if ( $stmt->rowCount() > 0 ){
        session_start();
        $_SESSION['adminAccount'] = $_POST['adminAccount'];

        header("Refresh: 3; url=./admin.php");
        echo "管理員登入成功！3秒後自動進入跳轉頁面";
    } else {
        header("Refresh: 3; url=./adminLogin.php");
        echo "管理員登入失敗...3秒後自動回登入頁";
    }
} else {
    header("Refresh: 3; url=./admin.php");
        echo "請確實登入...3秒後自動回首頁";
}

?>