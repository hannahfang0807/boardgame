<?php
session_start();
require_once './db.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>分店詳細頁</title>
</head>

<body>
    <?php require_once './store/admin/templates/tpl-header.php' ?>
    <div class="container-fluid">
        <div class="col-md-9 col-sm-8 m-auto">
            <?php
            if (isset($_GET['storeId'])) {
                $sql = 'SELECT `storeId`, `storeName`, `cityTalk`, `phoneNum`, `socialMedia`, `address`, `storePhoto`, `created_at`, `updated_at`
                            FROM `store`
                            WHERE `storeId` = ?';
                $arrParam = [
                    (int)$_GET['storeId']
                ];
                $stmt = $pdo->prepare($sql);
                $stmt->execute($arrParam);
                if ($stmt->rowCount() > 0) {
                    $arrStore = $stmt->fetchAll()[0];
            ?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="">
                                <!-- <div class="row mb-3 "> -->
                                <img width="500px" class="item-view border" src="./store/admin/storeImages/<?php echo $arrStore['storePhoto']; ?>">
                                <!-- </div> -->
                            </div>
                            <div class="ml-2">
                                <p>分店電話：<?php echo $arrStore['cityTalk'] ?> | <?php echo $arrStore['phoneNum'] ?></p>
                                <p>分店地址：<?php echo $arrStore['address'] ?></p>
                                <p>分店連結：<a class="text-info" href="<?php echo $arrStore['socialMedia'] ?>">FB</a></p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</body>

</html>