<?php
require_once('./db.inc.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯回文</title>
</head>

<body>
    <form method="POST" action="./updateEditRep.php">
        <table>
            <tbody>
                <?php
                $sql = "SELECT `members`.`memberName`,`members`.`memberNickname`,`reply`.`content`
                FROM `reply`
                JOIN `members`
                ON `reply`.`memberId`=`members`.`memberId`
                WHERE `replyId` = ? ";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_GET['editId']]);
                if ($stmt->rowCount() > 0) {
                    $arr = $stmt->fetchAll()[0]; ?>
                    <tr>
                        <td>會員名稱</td>
                        <td><?php echo $arr['memberName'] ?></td>
                    </tr>
                    <tr>
                        <td>會員暱稱</td>
                        <td><?php echo $arr['memberNickname'] ?></td>
                    </tr>
                    <tr>
                        <td>留言內容</td>
                        <td><input type="text" name="messageContent"></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <input type="submit" name="smb" value="修改">
                        <input type="hidden" name="editId" value="<?php echo $_GET['editId'] ?>">
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</body>

</html>