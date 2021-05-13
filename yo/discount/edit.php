<?php
require_once("./db.inc.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯頁</title>
</head>

<body>
    <?php require_once("./title.php") ?>
    <form method="POST" action="./updateEdit.php" enctype="multipart/form-data">
        <table>
            <tbody>
                <?php
                $sql = "SELECT `discount`.`memberId`,`members`.`memberName`,`discount`.`voucherId`,`discount`.`discountUse` 
                        FROM `discount`
                        JOIN `members`
                        ON `discount`.`memberId`=`members`.`memberId`
                        WHERE `discountId`= ? ";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_GET['discountId']]);
                if ($stmt->rowCount() > 0) {
                    $arr = $stmt->fetchAll()[0];
                ?>
                    <tr>
                        <td>會員編號</td>
                        <td><?php echo $arr['memberId'] ?></td>
                    </tr>
                    <tr>
                        <td>會員名稱</td>
                        <td><?php echo $arr['memberName'] ?></td>
                    </tr>
                    <tr>
                        <td>折價券編號</td>
                        <td>
                            <select name="voucherId">
                                <?php
                                $vouchersql = "SELECT `voucherId`,`voucherName` FROM `voucher`";
                                $voucherarr = $pdo->query($vouchersql)->fetchAll();
                                for ($i = 0; $i < count($voucherarr); $i++) { ?>
                                    <option value="<?php echo $voucherarr[$i]['voucherId'] ?>">
                                        <?php echo $voucherarr[$i]['voucherId'] . ':' . $voucherarr[$i]['voucherName'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>使用狀況</td>
                        <td>
                            <input type="radio" name="discountUse" value=0>已使用
                            <input type="radio" name="discountUse" value=1>未使用
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <input type="submit" name="smb" value="修改">
                        <input type="hidden" name="discountId" value="<?php echo $_GET['discountId'] ?>">
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</body>

</html>