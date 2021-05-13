<?php
  require_once('../db.inc.php');
  // echo  $_POST['date'],
// $_POST['startTime'],
// $_POST['duration'],
// $_POST['storeId'],
// $_POST['numberOfPeople'],
// $_POST['notes'],
// $_POST['reservationId'];

$sql = "UPDATE `reservations` 
        SET 
        `date` = ?,
        `startTime` = ?, 
        `duration` = ?, 
        `storeId` = ?, 
        `numberOfPeople` = ?, 
        `notes` = ?,
        `priceEstimated` = ?
        WHERE `reservations`.`reservationId` = ?";

$arrParams = [
    $_POST['date'],
    $_POST['startTime'],
    $_POST['duration'],
    $_POST['storeId'],
    $_POST['numberOfPeople'],
    $_POST['notes'],
    (int)$_POST['duration'] * (int)$_POST['numberOfPeople'] * 100,
    (int)$_POST['reservationId']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParams);

if( $stmt->rowCount() > 0 ){
    header("Refresh: 3; url=./reservations.php");
    echo "更新成功";
} else {
    header("Refresh: 3; url=./reservations.php");
    echo "沒有任何更新";
}
