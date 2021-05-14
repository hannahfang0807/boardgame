<?php
  require_once('../db.inc.php');

//get the price
$priceEstimated =  (int)$_POST['duration'] * (int)$_POST['numberOfPeople'] * 100;

$arr = [
    // $_POST['reservationId'],
    $_POST['memberId'],
    $_POST['date'],
    $_POST['startTime'],
    $_POST['duration'],
    $_POST['storeId'],
    $_POST['numberOfPeople'],
    $priceEstimated,
];

//check if customer leaves a note or not, and append it/NULL to the arr array
if (isset($_POST['notes'])) {
    $arr[].= $_POST['notes'];
    // print_r($arr);
} else {
    echo '$_POST[notes] is null';
    $arr[].= NULL;
    // print_r($arr);
}

$sql = "INSERT INTO `reservations` (`reservationId`, `memberId`, `date`, `startTime`, `duration`, `storeId`, `numberOfPeople`, `priceEstimated`, 
`notes`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";


$pdo_stmt = $pdo->prepare($sql);

$pdo_stmt->execute($arr);

if($pdo_stmt->rowCount() > 0) {
    header("Refresh: 3; url=./reservations.php");
    echo "新增成功";
} else {
    header("Refresh: 3; url=./reservations.php");
    echo "新增失敗";
}
