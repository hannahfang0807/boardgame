<?php
require_once '../../db.inc.php';
require_once '../../../../admin/checkAdmin.php';
require_once './html-header.php';
require_once './html-footer.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯頁面</title>
    <style>
        .border {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <?php require_once './title.php' ?>
    <hr>
    <h3 class="text-center">修改分店</h3>
    <form action="./update.php" name="myForm" method="POST" enctype="multipart/form-data">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th class="border">分店名稱</th>
                    <th class="border">分店市話</th>
                    <th class="border">分店電話</th>
                    <th class="border">社交軟體</th>
                    <th class="border">分店地址</th>
                    <th class="border">分店照片</th>
                    <th class="border">更新時間</th>
                    <th class="border">新增時間</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = 'SELECT `storeName`, `cityTalk`, `phoneNum`, `socialMedia`, `address`, `storePhoto`, `created_at`, `updated_at`
                        FROM `store`
                        WHERE `storeId` = ?';
                $arrParam = [
                    (int)$_GET['storeId']
                ];
                $stmt = $pdo->prepare($sql);
                $stmt->execute($arrParam);
                if ($stmt->rowCount() > 0) {
                    $arr = $stmt->fetchAll()[0];
                ?>
                    <tr class="text-center">
                        <td class="border">
                            <input type="text" name="storeName" value="<?php echo $arr['storeName'] ?>" maxlength="20">
                        </td>
                        <td class="border">
                            <input type="text" name="cityTalk" value="<?php echo $arr['cityTalk'] ?>" maxlength="12">
                        </td>
                        <td class="border">
                            <input type="text" name="phoneNum" value="<?php echo $arr['phoneNum'] ?>" maxlength="10">
                        </td>
                        <td class="border">
                            <input type="text" name="socialMedia" value="<?php echo $arr['socialMedia'] ?>">
                        </td>
                        <td class="border">
                            <input type="text" name="address" value="<?php echo $arr['address'] ?>">
                        </td>
                        <td class="border">
                            <img width="150px" src="./storeImages/<?php echo $arr['storePhoto'] ?>">
                            <input type="file" name="storePhoto" value="">
                        </td>
                        <td class="border">
                            <?php echo $arr['created_at'] ?>
                        </td>
                        <td class="border">
                            <?php echo $arr['updated_at'] ?>
                        </td>
                    </tr>
                <?php
                } else {

                ?>
                    <tr>
                        <td colspan="10">沒有資料</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr class="text-center">
                    <td class="border" colspan="10"><input type="submit" name="sub" value="更新"></td>
                </tr>
            </tfoot>
        </table>
        <input type="hidden" name="storeId" value="<?php echo (int)$_GET['storeId'] ?>">
    </form>
</body>

</html>