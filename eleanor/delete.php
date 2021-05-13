<?php
  require_once('../db.inc.php');

//deleted data count
$count = 0;
if (isset($_POST['chk'])){
    for($i = 0; $i < count($_POST['chk']); $i++){
    //加入繫結陣列
    $arrParam = [
        (int)$_POST['chk'][$i]
    ];
    $sql = "DELETE FROM `reservations` WHERE `reservations`.`reservationId` = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrParam);
    $count += $stmt->rowCount();

}
}else {
    header("Refresh: 3; url=./reservations.php");
    echo "沒有勾選項目";
    echo "<br>";

}


if($count > 0) {
    header("Refresh: 3; url=./reservations.php");
    echo "刪除成功";
} else {
    header("Refresh: 3; url=./reservations.php");
    echo "刪除失敗";
}


?>
