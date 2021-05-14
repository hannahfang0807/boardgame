<?php
require_once('../checkSession.php');
require_once('./db.inc.php');
require_once('../nav.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>揪團留言版</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        h2 {
            text-align: center;
            text-shadow: 2px 2px 8px;
        }

        .mainBoard {
            background: bisque;
            width: 80%;
            border: 3px solid rgb(255, 190, 100);
            margin: 0 auto;
        }

        .replyBoard {
            background: lavender;
            width: 95%;
            border: 3px solid rgb(135, 195, 250);
            margin: 0 auto;
        }

        .logo a {
            padding-left: 10px;
        }
    </style>
</head>

<body>
    <h2 class="my-3">揪團留言板</h2>
    <form method="POST" action="./newMessage.php">
        <div class="my-1" style="text-align: center;">
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
            <br>
            <textarea class="mt-2" name="newMessage" cols="100" rows="3"></textarea>
            <br>
            <input class="mt-2 btn btn-warning" type="submit" name="smb" value="揪起來">
        </div>
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
            <div class="mainBoard p-3 mt-2">
                <div class="d-flex" style="justify-content: space-between; align-items: center">
                    <p class="pt-3">樓主:<?php echo $arrMes[$i]['memberNickname'] ?> | 分店名稱:<?php echo $arrMes[$i]['storeName'] ?> | 留言時間:<?php echo $arrMes[$i]['updated_at'] ?></p>
                    <div class="logo">
                        <a href="./editMes.php?editId=<?php echo $arrMes[$i]['messageId'] ?>"><img src="./pencil.svg" alt=""></a>
                        <a href="./deleteMes.php?deleteId=<?php echo $arrMes[$i]['messageId'] ?>"><img src="./cross.svg" alt=""></a>
                    </div>
                </div>
                <div class="d-flex" style="align-items: center;">
                    <div class="pr-3"><img width="120px" src="../../hannah/images/<?php echo $arrMes[$i]['memberImg'] ?>" alt="會員大頭貼"></div>
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
                        <div class="replyBoard my-2 p-3">
                            <div class="d-flex" style="justify-content: space-between; align-items: center">
                                <p class="pt-3">會員:<?php echo $arrRep[$j]['memberName'] ?> | 留言時間:<?php echo $arrRep[$j]['updated_at'] ?></p>
                                <div class="logo">
                                    <a href="./editRep.php?editId=<?php echo $arrRep[$j]['replyId'] ?>"><img src="./pencil.svg" alt=""></a>
                                    <a href="./deleteRep.php?deleteId=<?php echo $arrRep[$j]['replyId'] ?>"><img src="./cross.svg" alt=""></a>
                                </div>
                            </div>
                            <div class="d-flex" style="align-items: center;">
                                <div class="pr-3"><img width="120px" src="../../hannah/images/<?php echo $arrRep[$j]['memberImg'] ?>" alt="會員大頭貼"></div>
                                <p><?php echo $arrRep[$j]['content'] ?></p>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <form method="POST" action="./reply.php">
                    <div class="my-2" style="text-align: center;">
                        <textarea name="replyMessage" cols="100" rows="3"></textarea>
                        <input type="hidden" name="mesNum" value="<?php echo $arrMes[$i]['messageId'] ?>">
                        <br>
                        <input class="mt-2 btn btn-danger" type="submit" value="回覆留言">
                    </div>
                </form>
            </div>
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