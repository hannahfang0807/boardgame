<?php
session_start();
require_once('../db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./nav.php');
// require_once('./tpl/header.php');
require_once("./tpl/func-buildTree.php");
require_once("./tpl/func-getRecursiveCategoryIds.php");
?>

<div class="container mt-5">
    <div class="row">
        <!-- 樹狀商品種類連結 -->
        <div class="col-md-2 col-sm-3"><?php buildTree($pdo, 0); ?></div>

        <!-- 商品項目清單 -->
        <div class="col-md-8 col-sm-6">
            <div class="row">
                <?php
                if (isset($_GET['categoryId'])) {
                    $strCategoryIds = "";;
                    $strCategoryIds .= $_GET['categoryId'];
                    getRecursiveCategoryIds($pdo, $_GET['categoryId']);
                }

                //SQL 敘述
                $sql = "SELECT `items`.`itemId`, `items`.`itemName`, `items`.`itemImg`, `items`.`itemPrice`, 
                            `items`.`itemQty`, `items`.`itemCategoryId`, `items`.`created_at`, `items`.`updated_at`,
                            `categories`.`categoryName`
                    FROM `items` INNER JOIN `categories`
                    ON `items`.`itemCategoryId` = `categories`.`categoryId`";

                //若網址有商品種類編號，則整合字串來操作 SQL 語法
                if (isset($_GET['categoryId'])) {
                    $sql .= "WHERE `items`.`itemCategoryId` in ({$strCategoryIds})";
                }

                $sql .= "ORDER BY `items`.`itemId` ASC ";

                //查詢分頁後的商品資料
                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                //若商品項目個數大於 0，則列出商品
                if ($stmt->rowCount() > 0) {
                    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    for ($i = 0; $i < count($arr); $i++) {
                ?>
                        <div class="col-md-4 col-sm-6 filter-items button" data-price="<?php echo $arr[$i]['itemPrice']; ?>">
                            <div class="card mt-3 shadow-sm">
                                <a href="./itemDetail.php?itemId=<?php echo $arr[$i]['itemId']; ?>">
                                    <img class="list-item" src="./images/items/<?php echo $arr[$i]['itemImg']; ?>">
                                </a>
                                <div class="card-body">
                                    <p class="card-text list-item-card"><?php echo $arr[$i]['itemName']; ?></p>
                                    <hr style="width: 100%; height: 1px; border: none; background-color: #282828">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">價格：<?php echo $arr[$i]['itemPrice']; ?></small>
                                        <small class="text-muted">上架日期：<?php echo $arr[$i]['created_at']; ?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="hover">
                                ----------點進去 看更多---------
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>

        <!-- 商品過濾 -->
        <div class="col-md-2 col-sm-3"></div>
    </div>
</div>

<?php require_once('./tpl/footer.php'); ?>
<?php require_once('./tpl/tpl-html-foot.php'); ?>