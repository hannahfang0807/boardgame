<?php
session_start();
require_once('./db.inc.php');

// 測試用 正式上線需要在登入頁把 memberId 寫進 Session 中
$_SESSION['memberId'] = 1;

$sql = "DELETE FROM `message` WHERE `messageId`= ? ";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_GET['deleteId']]);

if ($stmt->rowCount() > 0) {
    header("Refresh: 2; url=./homepage.php");
    echo "刪除成功";
} else {
    header("Refresh: 2; url=./homepage.php");
    echo "刪除失敗";
}
