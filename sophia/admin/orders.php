<?php
require_once('../checkAdmin.php'); //引入登入判斷
require_once('../db.inc.php'); //引用資料庫連線
?>
<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
    <style>
    .border {
        border: 1px solid;
    }
    img.payment_type_icon{
        width: 50px;
    }
    </style>
</head>
<body>
<?php require_once('./title.php'); ?>
<hr />
<h3>訂單一覽</h3>

<form name="myForm" method="POST" action="./deleteCheck.php">
    <table class="border">
        <thead>
            <tr>
                <th scope="col" class="border">
                    <div class="p-2 px-3 text-uppercase">訂單編號</div>
                </th>
                <th scope="col" class="border">
                    <div class="py-2 text-uppercase">買家</div>
                </th>
                <th scope="col" class="border">
                    <div class="py-2 text-uppercase">付款方式</div>
                </th>
                <th scope="col" class="border">
                    <div class="py-2 text-uppercase">詳細資訊</div>
                </th>
                <th scope="col" class="border">
                    <div class="py-2 text-uppercase">總金額</div>
                </th>
                <th scope="col" class="border">
                    <div class="py-2 text-uppercase">新增時間</div>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sqlOrder = "SELECT `orders`.`orderId`,`orders`.`created_at`,`orders`.`updated_at`, `payment_types`.`paymentTypeName`,`orders`.`memberAccount`
                    FROM `orders` INNER JOIN `payment_types`
                    ON `orders`.`paymentTypeId` = `payment_types`.`paymentTypeId`
                    ORDER BY `orders`.`orderId` DESC";
        $stmtOrder = $pdo->prepare($sqlOrder);
        $stmtOrder->execute();
        if($stmtOrder->rowCount() > 0){
            $arrOrders = $stmtOrder->fetchAll(PDO::FETCH_ASSOC);
            for($i = 0; $i < count($arrOrders); $i++) {
        ?>
            <tr>
                <th scope="row" class="border"><?php echo $arrOrders[$i]["orderId"] ?></th>
                <td class="border"><?php echo $arrOrders[$i]["memberAccount"] ?></td>
                <td class="border"><?php echo $arrOrders[$i]["paymentTypeName"] ?></td>
                <td class="border">
                <?php
                $sqlItemList = "SELECT `item_lists`.`checkPrice`,`item_lists`.`checkQty`,`item_lists`.`checkSubtotal`, `item_lists`.`orderId`,
                                        `items`.`itemName`,`categories`.`categoryName`
                                FROM `item_lists` 
                                INNER JOIN `items`
                                ON `item_lists`.`itemId` = `items`.`itemId`
                                INNER JOIN `categories` 
                                ON `items`.`itemCategoryId` = `categories`.`categoryId`
                                WHERE `item_lists`.`orderId` = ? 
                                ORDER BY `item_lists`.`itemListId` ASC";
                $stmtItemList = $pdo->prepare($sqlItemList);
                $arrParamItemList = [
                    $arrOrders[$i]["orderId"]
                ];
                $stmtItemList->execute($arrParamItemList);
                if($stmtItemList->rowCount() > 0) {
                    $arrItemList = $stmtItemList->fetchAll(PDO::FETCH_ASSOC);
                    $order = -1;
                    for($j = 0; $j < count($arrItemList); $j++) {
                        if ($arrItemList[$j]["orderId"] != $order) {
                            $total = 0;
                        }
                        $total += $arrItemList[$j]["checkSubtotal"];
                        $order = $arrItemList[$j]["orderId"];
                ?>
                    <p>商品名稱: <?php echo $arrItemList[$j]["itemName"] ?></p>
                    <p>商品種類: <?php echo $arrItemList[$j]["categoryName"] ?></p>
                    <p>單價: <?php echo $arrItemList[$j]["checkPrice"] ?></p>
                    <p>數量: <?php echo $arrItemList[$j]["checkQty"] ?></p>
                    <p>小計: <?php echo $arrItemList[$j]["checkSubtotal"] ?></p>
                    <br />
                <?php
                    }
                }
                ?>
                 <td class="border"><?php echo $total ?></td>
                </td>
                <td class="border"><?php echo $arrOrders[$i]["created_at"] ?></td>
               
            </tr>
        <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>

</form>

</body>
</html>