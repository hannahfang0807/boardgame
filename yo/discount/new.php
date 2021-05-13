<?php
require_once('./title.php');
require_once('./db.inc.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增折價券</title>
</head>

<body>
    <form action="./insert.php" method="POST">
        <table>
            <thead>
                <tr>
                    <th>會員名稱</th>
                    <th>折價券編號</th>
                    <th>使用狀況</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <!-- <input type="text" name="memberId"> -->
                        <select name="memberId">
                            <?php
                            $nameSql = "SELECT `memberId`,`memberName` FROM `members`";
                            $nameArr = $pdo->query($nameSql)->fetchAll();
                            for ($i = 0; $i < count($nameArr); $i++) { ?>
                                <option value="<?php echo $nameArr[$i]['memberId'] ?>">
                                    <?php echo $nameArr[$i]['memberName'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select name="voucherId">
                            <?php
                            $sql = "SELECT `voucherId`,`voucherName` FROM `voucher`";
                            $arr = $pdo->query($sql)->fetchAll();
                            for ($i = 0; $i < count($arr); $i++) { ?>
                                <option value="<?php echo $arr[$i]['voucherId'] ?>">
                                    <?php echo $arr[$i]['voucherId'] . ':' . $arr[$i]['voucherName'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="radio" name="discountUse" value=1 checked>未使用
                        <input type="radio" name="discountUse" value=0>已使用
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4"><input type="submit" value="新增"></td>
                </tr>
            </tfoot>
        </table>
    </form>
</body>

</html>