<?php
session_start();
require_once('./db.inc.php');

// 測試用 正式上線需要在登入頁把 memberId 寫進 Session 中
$_SESSION['memberId'] = 1;

$sql = "UPDATE `message` SET `content`= ? WHERE `messageId`= ? ";
$arrParam = [
    $_POST['messageContent'],
    $_POST['editId']
];
$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if ($stmt->rowCount() > 0) {
    header("Refresh: 2; url=./homepage.php");
    echo "編輯成功";
} else {
    header("Refresh: 2; url=./homepage.php");
    echo "資料無改變";
}
