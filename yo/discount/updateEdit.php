<?php
require_once("./db.inc.php");

$sql = "UPDATE `discount` 
SET 
`voucherId`= ?,
`discountUse`= ?";

$arrParam = [
    $_POST['voucherId'],
    $_POST['discountUse']
];

$sql .= " WHERE `discountId` = ? ";
$arrParam[] = $_POST['discountId'];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if ($stmt->rowCount() > 0) {
    header("Refresh: 3; url=./homepage.php");
    echo "編輯成功";
} else {
    header("Refresh: 3; url=./homepage.php");
    echo "資料無改變";
}
