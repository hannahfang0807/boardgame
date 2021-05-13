<?php
session_start();
require_once('../db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./nav.php');
require_once("./tpl/func-buildTree.php");
require_once("./tpl/func-getRecursiveCategoryIds.php");
?>

<div class="container mt-5">
    <div class="row">
        <!-- 樹狀商品種類連結 -->
        <div class="col-md-3"><?php buildTree($pdo, 0); ?></div>

        <!-- 商品項目清單 -->
        <div class="col-md-9">
            <?php
            if (isset($_GET['itemId'])) {
                //SQL 敘述
                $sql = "SELECT `items`.`itemId`, `items`.`itemName`, `items`.`itemImg`, `items`.`itemPrice`, 
                        `items`.`itemQty`, `items`.`itemCategoryId`, `items`.`created_at`, `items`.`updated_at`,
                        `categories`.`categoryId`, `categories`.`categoryName`,`items`.`itemDescription`
                    FROM `items` INNER JOIN `categories`
                    ON `items`.`itemCategoryId` = `categories`.`categoryId`
                    WHERE `itemId` = ? ";

                $arrParam = [
                    (int)$_GET['itemId']
                ];

                //查詢
                $stmt = $pdo->prepare($sql);
                $stmt->execute($arrParam);

                //若商品項目個數大於 0，則列出商品
                if ($stmt->rowCount() > 0) {
                    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row mb-3 d-flex justify-content-center">
                                    <img class="item-view border" src="./images/items/<?php echo $arr[0]["itemImg"]; ?>">
                                </div>
                                <div class="row">
                                    <img class="item-preview img-thumbnail border" src="./images/items/<?php echo $arr[0]["itemImg"]; ?>" alt="...">
                                    <?php
                                    //找出預覽圖片
                                    $sqlMultipleImages = "SELECT `multipleImageId`, `multipleImageImg`
                                            FROM `multiple_images` 
                                            WHERE `itemId` = ?";
                                    $stmtMultipleImages = $pdo->prepare($sqlMultipleImages);
                                    $stmtMultipleImages->execute($arrParam);
                                    if ($stmtMultipleImages->rowCount() > 0) {
                                        $arrMultipleImages = $stmtMultipleImages->fetchAll(PDO::FETCH_ASSOC);
                                        for ($i = 0; $i < count($arrMultipleImages); $i++) {
                                    ?>
                                            <img class="item-preview img-thumbnail border" src="./images/multiple_images/<?php echo $arrMultipleImages[$i]['multipleImageImg']; ?>" alt="...">
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <p>商品名稱: <?php echo $arr[0]["itemName"]; ?></p>
                                <p>商品價格: <?php echo $arr[0]["itemPrice"]; ?></p>
                                <p>商品數量: <?php echo $arr[0]["itemQty"]; ?></p>
                                <form name="cartForm" id="cartForm" method="POST" action="../sophia/addCart.php">
                                    <label>數量: </label>
                                      <!-- 加的 -->
                                    <input type="number" name="cartQty" value="1" maxlength="5" min="1" max="<?php echo $arrItem["itemQty"] ?>">
                                    <!-- <input type="text" name="cartQty" id="cartQty" value="1" maxlength="5" style="width:50px"> -->
                                    <br>
                                    <div class="my-2">
                                        <!-- <button type="button" class="btn btn-primary btn-lg" id="btn_addCart" data-item-id="<?php echo $_GET['itemId'] ?>">加入購物車</button> -->
                                        <input type="submit" class="btn btn-primary btn-lg" name="smb" value="加入購物車">
                                        <button type="button" class="btn btn-info btn-lg" id="btn_addItemTracking" data-item-id="<?php echo $_GET['itemId'] ?>">追蹤此商品</button>
                                        <input type="hidden" name="itemId" id="itemId" value="<?php echo $_GET['itemId'] ?>">
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="row my-4">
                            <strong>商品描述</strong>
                        </div>
                        <div class="row col-md-12 jumbotron bg-light">
                            <p><?php echo $arr[0]["itemDescription"]; ?></p>
                        </div>
                        <!-- <div class="row"><?php require_once("./tpl/tpl-comments-list.php"); ?></div>
                        <div class="row"><?php require_once("./tpl/tpl-comments.php"); ?></div> -->
                        <br>
                    </div>

            <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<?php
require_once('./tpl/footer.php');
require_once('./tpl/tpl-html-foot.php');
?>