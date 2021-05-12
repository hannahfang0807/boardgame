<?php
require_once '../db.inc.php';

// 回傳狀態
$objResponse = [];
$objResponse['success'] = false;
$objResponse['info'] = '刪除失敗';

// 將所有 id 用 ',' 結合在一起 --> [1, 2, 3]
$strId = join(',',$_POST['chk']);
// 紀錄刪除數
$count = 0;

// 先處理圖片，找出所有 id 的照片名稱
// FIND_IN_SET 查詢多個資料
$sqlGetImg = 'SELECT `storePhoto` FROM `store` WHERE FIND_IN_SET(`storeId`, ?)';
$stmtGetImg = $pdo->prepare($sqlGetImg);
$stmtGetImg->execute([$strId]);
if ( $stmtGetImg->rowCount() > 0 ) {
    // 取得所有照片檔案名稱
    $arrImg = $stmtGetImg->fetchAll();
    // 刪除各檔案
    for ($i = 0; $i < count($arrImg); $i++) {
        // 若 storePhoto 裡面不為空值，代表曾經上傳過照片
        if ($arrImg[$i]['storePhoto'] !== NULL) {
            // 刪黨
            @unlink('../storeImages/' . $arrImg[$i]['storePhoto']);
        }

    }
    // 刪除資料表紀錄
    $sqlDelete = 'DELETE FROM `store` WHERE FIND_IN_SET(`storeId`, ?)';
    $stmtDelete = $pdo->prepare($sqlDelete);
    $stmtDelete->execute([$strId]);
    $count = $stmtDelete->rowCount();
}
header('Refresh: 1; url = ./admin.php');
