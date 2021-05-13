<?php
require_once("./db.inc.php");

$sqltotal = "SELECT count(1) AS `count` FROM `discount`";
$stmtTotal = $pdo->query($sqltotal);
$arrtotal = $stmtTotal->fetchAll()[0];
$total = $arrtotal['count'];

$numPerPage = 10;
$totalPages = ceil($total / $numPerPage);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = $page < 1 ? 1 : $page;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>折價券管理頁</title>
</head>

<body>
    <?php require_once("./title.php") ?>
    <form method="POST" action="./deleteMore.php">
        <table>
            <thead>
                <tr>
                    <th>勾選</th>
                    <th>會員姓名</th>
                    <th>折價券名稱</th>
                    <th>折價券面額</th>
                    <th>使用狀況</th>
                    <th>功能</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT `discount`.`discountId`,`members`.`memberName`,`voucher`.`voucherName`,`voucher`.`voucherPrice`,`discount`.`discountUse`
                FROM `discount` 
                JOIN `voucher`
                ON `discount`.`voucherId` = `voucher`.`voucherId`
                JOIN `members`
                ON `discount`.`memberId`= `members`.`memberId`
                ORDER BY `discount`.`memberId` ASC
                LIMIT ?,?";
                $arrParam = [($page - 1) * $numPerPage, $numPerPage];
                $stmt = $pdo->prepare($sql);
                $stmt->execute($arrParam);
                if ($stmt->rowCount() > 0) {
                    $arr = $stmt->fetchAll();
                    for ($i = 0; $i < count($arr); $i++) {
                ?>
                        <tr>
                            <td class="borderB">
                                <input type="checkbox" name="chk[]" value="<?php echo $arr[$i]['discountId'] ?>">
                            </td>
                            <td><?php echo $arr[$i]['memberName'] ?></td>
                            <td><?php echo $arr[$i]['voucherName'] ?></td>
                            <td><?php echo $arr[$i]['voucherPrice'] ?></td>
                            <td><?php echo $arr[$i]['discountUse'] ?></td>
                            <td>
                                <a href="edit.php?discountId=<?php echo $arr[$i]['discountId'] ?>">編輯</a>
                                <a href="delete.php?discountId=<?php echo $arr[$i]['discountId'] ?>">刪除</a>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9" style="text-align: center;">
                        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                            <a href="?page=<?php echo $i ?>"><?php echo $i ?></a>
                            <!-- herf 什麼都沒寫表示當前的url -->
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="確定刪除"></td>
                </tr>
            </tfoot>
        </table>
    </form>
</body>

</html>