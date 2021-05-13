<?php
// require_once './checkSession.php';
require_once '../../db.inc.php';

$total = $pdo->query('SELECT count(1) AS `count` FROM `store`')->fetchAll()[0]['count'];
$numPerPages = 5;
$totalPages = ceil($total / $numPerPages);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = $page < 1 ? 1 : $page;




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>分店後台頁面</title>
</head>
<style>
    .border {
        border: 1px solid;
    }
    .page {
        border: 1px solid;
        text-align: center;
    }
</style>

<body>
    <?php require_once './title.php' ?>
    <hr>
    <h3>分店列表</h3>
    <?php
    // 若有資料，則顯示資料
    if ($total > 0) {
    ?>
        <form action="./delete.php" name="myForm" method="POST" enctype="multipart/form-data">
            <table class="border">
                <thead>
                    <tr>
                        <th class="border">勾選</th>
                        <th class="border">分店名稱</th>
                        <th class="border">分店市話</th>
                        <th class="border">分店電話</th>
                        <th class="border">社交軟體</th>
                        <th class="border">分店地址</th>
                        <th class="border">分店照片名稱</th>
                        <th class="border">更新時間</th>
                        <th class="border">新增時間</th>
                        <th class="border">功能</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = 'SELECT `storeId`, `storeName`, `phoneNum`, `cityTalk`, `socialMedia`, `address`, `storePhoto`, `created_at`, `updated_at`
                        FROM `store`
                        ORDER BY `storeId` ASC
                        LIMIT ?, ?';
                    // 1 >> 1 - 5 ; 2 >> 6 - 10 ; 3 >> 11 - 15 ...
                    $arrParam = [($page - 1) * $numPerPages, $numPerPages];
                    // 查詢分頁資料
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute($arrParam);
                    if ($stmt->rowCount() > 0) {
                        //PDO::FETCH_ASSOC ---> 同時取得陣列key的編號與SQL欄位名稱
                        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        for ($i = 0; $i < count($arr); $i++) {
                    ?>
                            <tr>
                                <td class="border">
                                    <!-- chk[] >> 讓選項直接變成陣列 [1, 2, 3, ...] -->
                                    <input type="checkbox" name="chk[]" value="<?php echo $arr[$i]['storeId'] ?>">
                                </td>
                                <td class="border"><?php echo $arr[$i]['storeName'] ?></td>
                                <td class="border"><?php echo $arr[$i]['cityTalk'] ?></td>
                                <td class="border"><?php echo $arr[$i]['phoneNum'] ?></td>
                                <td style="border: 1px solid" ; width="150px"><?php echo $arr[$i]['socialMedia'] ?></td>
                                <td class="border"><?php echo $arr[$i]['address'] ?></td>
                                <td class="border"><img width="150px" src="./storeImages/<?php echo $arr[$i]['storePhoto'] ?>"></td>
                                <td class="border"><?php echo $arr[$i]['created_at'] ?></td>
                                <td class="border"><?php echo $arr[$i]['updated_at'] ?></td>
                                <td class="border"><a href="./edit.php?storeId=<?php echo $arr[$i]['storeId'] ?>">編輯</a></td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td class="border" colspan="9">目前沒有資料</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <!-- 頁碼 -->
                        <td class="page" colspan="10">
                            <?php
                            for ($i = 1; $i <= $totalPages; $i++) { ?>
                                <a href="?page=<?php echo $i ?>"><?php echo $i ?></a>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="border" colspan="10"><input type="submit" name="sub" value="刪除"></td>
                    </tr>
                </tfoot>
            </table>
        </form>
    <?php
    }
    ?>


</body>

</html>