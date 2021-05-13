<?php
session_start();
require_once('./db.inc.php');
require_once('./html-header.php'); 
require_once('./nav.php'); 
?>

<form name="myForm" method="POST" action="./deleteOrder.php">

    <div class="container-fluid">
        <div class="row">


            <!-- 商品項目清單 -->
            <div class="col-md-10 col-sm-9">
                <div class="table-responsive">

                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="p-2 px-3 text-uppercase">訂單編號</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                   <div class="p-2 px-3 ">成立時間</div>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">付款方式</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">詳細資訊</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">總金額</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sqlOrder = "SELECT `orders`.`orderId`,`orders`.`created_at`,`orders`.`updated_at`, `payment_types`.`paymentTypeName`
                                FROM `orders` INNER JOIN `payment_types`
                                ON `orders`.`paymentTypeId` = `payment_types`.`paymentTypeId`
                               
                                WHERE `orders`.`memberAccount` = ? 
                                ORDER BY `orders`.`orderId` DESC";
                            $stmtOrder = $pdo->prepare($sqlOrder);
                            $arrParamOrder = [
                                $_SESSION["memberAccount"]
                            ];
                            $stmtOrder->execute($arrParamOrder);
                            if ($stmtOrder->rowCount() > 0) {
                                $arrOrders = $stmtOrder->fetchAll(PDO::FETCH_ASSOC);
                                for ($i = 0; $i < count($arrOrders); $i++) {
                            ?>
                                    <tr>
                                        <th scope="row" class="border align-middle "><?php echo $arrOrders[$i]["orderId"] ?></th>
                                        <td class="border align-middle"><?php echo $arrOrders[$i]["created_at"] ?></td>
                                        <td class="border align-middle"><?php echo $arrOrders[$i]["paymentTypeName"] ?></td>
                                        <td class="border align-middle">
                                            <?php
                                            $sqlItemList = "SELECT `item_lists`.`checkPrice`,`item_lists`.`checkQty`,`item_lists`.`checkSubtotal`,
                                                    `items`.`itemName`,`categories`.`categoryName`,`item_lists`.`orderId`
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
                                            if ($stmtItemList->rowCount() > 0) {
                                                $arrItemList = $stmtItemList->fetchAll(PDO::FETCH_ASSOC);
                                                $order = -1;
                                                for ($j = 0; $j < count($arrItemList); $j++) {
                                                    if ($arrItemList[$j]["orderId"] != $order) {
                                                        $total = 0;
                                                    }
                                                    $total += $arrItemList[$j]["checkSubtotal"];
                                                    $order = $arrItemList[$j]["orderId"];

                                            ?>
                                                    <div class="jumbotron">
                                                        <p>商品名稱: <?php echo $arrItemList[$j]["itemName"] ?></p>
                                                        <p>商品種類: <?php echo $arrItemList[$j]["categoryName"] ?></p>
                                                        <p>單價: <?php echo $arrItemList[$j]["checkPrice"] ?></p>
                                                        <p>數量: <?php echo $arrItemList[$j]["checkQty"] ?></p>
                                                        <p class="mb-5">小計: <?php echo $arrItemList[$j]["checkSubtotal"] ?></p>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td class="border align-middle"><?php echo $total ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</form>

<?php
require_once('./html-footer.php');
?>