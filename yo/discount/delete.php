<?php
require_once('./db.inc.php');

$sql = "DELETE FROM `discount` WHERE `discountId`= ? ";

$stmt = $pdo->prepare($sql);
$stmt->execute([$_GET['discountId']]);

if ($stmt->rowCount() > 0) {
    header("Refresh: 3; url=./homepage.php");
    echo "刪除成功";
} else {
    header("Refresh: 3; url=./homepage.php");
    echo "刪除失敗";
}
