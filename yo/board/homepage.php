<?php
require_once('./db.inc.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>揪團留言版</title>
    <style>
        .mainBoard {
            background: bisque;
        }

        .replyBoard {
            background: lavender;
        }
    </style>
</head>

<body>
    <h2>留言版</h2>
    <form method="POST" action="./newMessage.php">
        <input type="text" name="newMessage" placeholder="我想揪桌遊">
        <select name="storeId">
            <?php
            $storeSql = "SELECT `storeName`,`storeId` FROM `store`";
            $storeArr = $pdo->query($storeSql)->fetchAll();
            for ($k = 0; $k < count($storeArr); $k++) { ?>
                <option value="<?php echo $storeArr[$k]['storeId'] ?>">
                    <?php echo $storeArr[$k]['storeName'] ?>
                </option>
            <?php
            }
            ?>
        </select>
        <input type="submit" name="smb" value="揪起來">
    </form>
    <hr>
    <?php
    $countData = "SELECT count(`messageId`) AS `count` FROM `message`";
    $totalData = $pdo->query($countData)->fetchAll()[0]['count'];
    if ($totalData > 0) {
        $mesSql = "SELECT `message`.`messageId`,`members`.`memberNickname`,`store`.`storeName`,`members`.`memberImg`,`message`.`content`,`message`.`updated_at`
        FROM `message`
        JOIN `members` ON `message`.`memberId` = `members`.`memberId`
        JOIN `store` ON `message`.`storeId`= `store`.`storeId`
        ORDER BY `message`.`updated_at` DESC";
        $arrMes = $pdo->query($mesSql)->fetchAll();
        for ($i = 0; $i < count($arrMes); $i++) { ?>
            <div>
                <div class="mainBoard">
                    <!-- 項目內容因應會員新增的欄位變動 如暱稱、大頭貼等 -->
                    <span>樓主:<?php echo $arrMes[$i]['memberNickname'] ?></span>
                    <span>分店名稱:<?php echo $arrMes[$i]['storeName'] ?></span>
                    <span>留言時間:<?php echo $arrMes[$i]['updated_at'] ?></span>
                    <a href=""><img src="./pencil.svg" alt=""></a>
                    <a href=""><img src="./cross.svg" alt=""></a>
                    <div><img width="120px" src="../images/<?php echo $arrMes[$i]['memberImg'] ?>" alt="會員大頭貼"></div>
                    <p><?php echo $arrMes[$i]['content'] ?></p>
                </div>

                <?php
                // 回文呈現區塊
                $repSql = "SELECT `reply`.`replyId`,`members`.`memberName`,`members`.`memberImg`,`reply`.`content`,`reply`.`updated_at`
                        FROM `reply`
                        JOIN `members` ON `reply`.`memberId` = `members`.`memberId`
                        WHERE `messageId`= ? ";
                $stmt = $pdo->prepare($repSql);
                $stmt->execute([$arrMes[$i]['messageId']]);
                if ($stmt->rowCount() > 0) {
                    $arrRep = $stmt->fetchAll();
                    for ($j = 0; $j < count($arrRep); $j++) { ?>
                        <div class="replyBoard">
                            <span>會員:<?php echo $arrRep[$j]['memberName'] ?></span>
                            <span>留言時間:<?php echo $arrRep[$j]['updated_at'] ?></span>
                            <div><img width="120px" src="../images/<?php echo $arrRep[$j]['memberImg'] ?>" alt="會員大頭貼"></div>
                            <p><?php echo $arrRep[$j]['content'] ?></p>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <form method="POST" action="./reply.php">
                <input type="text" name="replyMessage">
                <input type="hidden" name="mesNum" value="<?php echo $arrMes[$i]['messageId'] ?>">
                <input type="submit" value="回覆留言">
            </form>

        <?php
        }
        ?>
    <?php
    } else {
    ?>
        <div>目前暫時沒有留言</div>
    <?php
    }
    ?>
</body>

</html>