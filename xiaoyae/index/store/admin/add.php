<?php
require_once '../../db.inc.php';
require_once '../../../../admin/checkAdmin.php';

// 回傳狀態
$objResponse = [];
$objResponse['success'] = false;
$objResponse['info'] = '新增失敗';

// SQL
$sql1 = 'INSERT INTO `store` (`storeName`, `cityTalk`, `phoneNum`, `socialMedia`, `address`';
$sql2 = 'VALUES (?, ?, ?, ?, ?';
$arrParam = [
    $_POST['storeName'],
    $_POST['cityTalk'],
    $_POST['phoneNum'],
    $_POST['socialMedia'],
    $_POST['address']
];
// 上傳成功
if ($_FILES['storePhoto']['error'] === 0) {
    // 以日期重新命名
    $imgDateTime = 'store_' . date('YmdHis');
    // 找副檔名
    $extension = pathinfo($_FILES['storePhoto']['name'], PATHINFO_EXTENSION);
    // 建立完整名稱
    $imgName = $imgDateTime . '.' . $extension;
    // 暫存資料夾 >> 實際存放資料夾
    $isSuccess = move_uploaded_file($_FILES['storePhoto']['tmp_name'], '../storeImages/' . $imgName);
    // 圖片上傳失敗
    if (!$isSuccess) {
        header('Refresh: 3; url = ./admin.php');
        echo '圖片上傳失敗';
        exit();
    }

    $sql1 .= ', `storePhoto`';
    $sql2 .= ', ?';
    $arrParam[] = $imgName;
}

$sql1 .= ')';
$sql2 .= ')';
$sql = $sql1 . $sql2;

// 取得 PDO 物件
// 將 sql 語法丟進 prepare 進行處理，excute 執行後丟進 $arrParam 陣列裡
$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);
// 影響列數 > 0，代表上傳成功
if ($stmt->rowCount() > 0) {
    header('Refresh: 3; url = ./admin.php');
    $objResponse['success'] = true;
    $objResponse['info'] = '新增成功';
    // json_encode ---> 將陣列轉成 JSON 格式
    // JSON_UNESCAPED_UNICODE ---> 讓 JSON 不要編碼 Unicode，保持中文
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
} else {
    header('Refresh: 3; url = ./admin.php');
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
}
