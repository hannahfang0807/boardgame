<?php
require_once('./checkAdmin.php');
require_once('./db.inc.php');

$sql = "UPDATE `members` 
        SET 
        `memberAccount` = ?,
        `memberName` = ?,
        `memberNickname` = ?,
        `memberGender` = ?,
        `memberEmail` = ?,
        `memberPhone` = ?,
        `memberBirthday` = ?,
        `memberAddress` = ? ";

$arrParam = [
    $_POST['memberAccount'],
    $_POST['memberName'],
    $_POST['memberNickname'],
    $_POST['memberGender'],
    $_POST['memberEmail'],
    $_POST['memberPhone'],
    $_POST['memberBirthday'],
    $_POST['memberAddress']
];

if( $_FILES["memberImg"]["error"] === 0 ) {
    $strDatetime = date("YmdHis");
    $extension = pathinfo($_FILES["memberImg"]["name"], PATHINFO_EXTENSION);
    $memberImg = $strDatetime.".".$extension;
    if( move_uploaded_file($_FILES["memberImg"]["tmp_name"], "./images/".$memberImg) ) {

        $sqlGetImg = "SELECT `memberImg` FROM `members` WHERE `memberId` = ? ";
        $stmtGetImg = $pdo->prepare($sqlGetImg);

        $arrGetImgParam = [
            (int)$_POST['id']
        ];

        $stmtGetImg->execute($arrGetImgParam);

        if($stmtGetImg->rowCount() > 0) {
            $arrImg = $stmtGetImg->fetchAll()[0];
            if($arrImg['memberImg'] !== NULL){
                @unlink("./images/".$arrImg['memberImg']);
            } 
            
            $sql.= ",";
            $sql.= "`memberImg` = ? ";
            $arrParam[] = $memberImg;
            
        }
    }
}

$sql.= "WHERE `memberId` = ? ";
$arrParam[] = (int)$_POST['id'];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

header("Refresh: 3; url=./member.php");

if( $stmt->rowCount() > 0 ){
    echo "更新成功";
} else {
    echo "沒有任何更新";
}