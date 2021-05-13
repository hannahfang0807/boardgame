<?php
session_start();
require_once('./db.inc.php');

// 測試用 正式上線需要在登入頁把 memberId 寫進 Session 中
$_SESSION['memberId'] = 1;

$sql = "INSERT INTO `message` (`memberId`,`storeId`,`content`) VALUE ( ?,?,? ) ";
$arrParam = [
    $_SESSION['memberId'],
    $_POST['storeId'],
    $_POST['newMessage']
];
$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);
if ($stmt->rowCount() > 0) {
    header("Refresh: 0; url=./homepage.php");
    echo "留言成功";
} else {
    header("Refresh: 0; url=./homepage.php");
    echo "留言失敗";
}
