<?php
require_once '../../db.inc.php';

$totalStores = $pdo->query('SELECT count(1) AS `count` FROM `store`')->fetchAll()[0]['count'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增頁面</title>
    <style>
        .border {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <?php require_once './title.php' ?>
    <hr>
    <h3>新增分店</h3>
    <form name="myForm" action="add.php" enctype="multipart/form-data" method="POST">
        <table class="border">
            <thead>
                <tr>
                    <th class="border">分店名稱</th>
                    <th class="border">分店電話</th>
                    <th class="border">社交軟體</th>
                    <th class="border">分店地址</th>
                    <th class="border">分店照片名稱</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border">
                        <input type="text" name="storeName" value="" maxlength="20">
                    </td>
                    <td class="border">
                        <label>市話：</label><input type="text" name="cityTalk" value="" maxlength="12"><br>
                        <label>手機：</label><input type="text" name="phoneNum" value="" maxlength="10">
                    </td>
                    <td class="border">
                        <input type="text" name="socialMedia" value="" maxlength="50">
                    </td>
                    <td class="border">
                        <input type="text" name="address" value="" maxlength="50">
                    </td>
                    <td class="border">
                        <input type="file" name="storePhoto" value="">
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <input style="margin: 5px;" type="submit" name="sub" value="新增">
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>


</body>

</html>