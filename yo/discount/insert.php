<?php
require_once('./db.inc.php');

$sql = "INSERT INTO `discount` (`memberId`,`voucherId`,`discountUse`)
VALUES ( ? ,? ,? )";

$arrParam = [
    $_POST['memberId'],
    $_POST['voucherId'],
    $_POST['discountUse']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);
if ($stmt->rowCount() > 0) {
    header("Refresh: 3; url=./homepage.php");
    echo "新增成功";
} else {
    header("Refresh: 3; url=./homepage.php");
    echo "新增失敗";
}
