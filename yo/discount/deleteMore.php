<?php
require_once("./db.inc.php");

// print_r($_POST);

$strIds = join(",", $_POST['chk']);


$count = 0;

$sqlDelete = "DELETE FROM `discount` WHERE FIND_IN_SET(`discountId`, ?) ";
$stmtDelte = $pdo->prepare($sqlDelete);
$stmtDelte->execute([$strIds]);
$count = $stmtDelte->rowCount();

if ($count > 0) {
    echo "成功刪除" . $count . "筆資料";
} else {
    echo "刪除失敗";
}

header("refresh:3 ; url=./homepage.php");
