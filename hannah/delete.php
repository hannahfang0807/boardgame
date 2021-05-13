<?php
require_once('./checkAdmin.php'); 
require_once('./db.inc.php'); 

$sqlGetImg = "SELECT `memberImg` FROM `members` WHERE `memberId` = ? ";
$stmtGetImg = $pdo->prepare($sqlGetImg);

$arrGetImgParam = [
    (int)$_GET['id']
];

$stmtGetImg->execute($arrGetImgParam);

if($stmtGetImg->rowCount() > 0) {
    $arrImg = $stmtGetImg->fetchAll()[0];
    if($arrImg['memberImg'] !== NULL){
        @unlink("./images/".$arrImg['memberImg']);
    }     
}

$sql = "DELETE FROM `members` WHERE `memberId` = ? ";

$arrParam = [
    (int)$_GET['id']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

header("Refresh: 3; url=./member.php");

if($stmt->rowCount() > 0) {
    echo "刪除成功";
} else {
    echo "刪除失敗";
}