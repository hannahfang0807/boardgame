<?php
require_once '../../db.inc.php';

// 回傳狀態
$objResponse = [];
$objResponse['success'] = false;
$objResponse['info'] = '沒有任何更新';

$arrParam = [];

$sql = 'UPDATE `store` SET ';
// 資料繫結
$sql .= '`storeName` = ? ,
        `cityTalk` = ?,
        `phoneNum` = ?, 
        `socialMedia` = ?, 
        `address` = ? ';
$arrParam[] = $_POST['storeName'];
$arrParam[] = $_POST['cityTalk'];
$arrParam[] = $_POST['phoneNum'];
$arrParam[] = $_POST['socialMedia'];
$arrParam[] = $_POST['address'];       
if ($_FILES['storePhoto']['error'] === 0) {
    // 以日期重新命名
    $imgDateTime = 'store_' . date('YmdHis');
    // 找副檔名
    $extension = pathinfo($_FILES['storePhoto']['name'], PATHINFO_EXTENSION);
    // 建立完整名稱
    $imgName = $imgDateTime . '.' . $extension;
    // 暫存資料夾 >> 實際存放資料夾
    $isSuccess = move_uploaded_file($_FILES['storePhoto']['tmp_name'], "../storeImages/{$imgName}");

    if ($isSuccess) {
        // 先查出特定 id 的照片檔案名稱
        $sqlGetImg = 'SELECT `storePhoto` FROM `store` WHERE `storeId` = ?';
        $stmtGetImg = $pdo->prepare($sqlGetImg);

        // 加入繫結陣列
        $arrGetImgParam = [
            (int)$_POST['storeId'],
        ];

        // 執行
        $stmtGetImg->execute($arrGetImgParam);

        // 如果有找到照片檔案
        if ($stmtGetImg->rowCount() > 0) {
            // 取得指定 id 資料 (1筆)
            $arrImg = $stmtGetImg->fetchAll()[0];
            // 若 storePhoto 裡面不為空值，代表曾經上傳過照片
            if ($arrImg['storePhoto'] !== NULL) {
                // 刪除舊的檔案
                @unlink('../storeImages/' . $arrImg);
            }
        // 接上面的 sql 語句字串
        $sql .= ', `storePhoto` = ?';
        // 只對 imgName 資料繫結
        $arrParam[] = $imgName;
        }
    }
}

// sql 語句其他資料繫結
$sql .= 'WHERE `storeId` = ?';
$arrParam[] = (int)$_POST['storeId'];
$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

header("Refresh: 1; url = ./edit.php?storeId={$_POST['storeId']}");
if ($stmt->rowCount() > 0) {
    $objResponse['success'] = true;
    $objResponse['info'] = '更新成功';

    header('Refresh: 1; url = ./admin.php');
}

echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
