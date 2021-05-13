<?php
session_start();
require_once('./db.inc.php');

// 測試用 正式上線需要在登入頁把 memberId 寫進 Session 中
$_SESSION['memberId'] = 1;

$sql = "INSERT INTO `reply` (`memberId`,`messageId`,`content`) VALUE ( ?,?,? ) ";
$arrParam = [
    $_SESSION['memberId'],
    $_POST['mesNum'],
    $_POST['replyMessage']
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
// 反正 Refresh: 0 的話 echo 也看不到根本沒差