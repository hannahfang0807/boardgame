<div class="album py-5 bg-light flex-shrink-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 d-flex justify-content-center">
                <h1>分店一覽</h1>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <?php
            //SQL 敘述
            $sql = 'SELECT `storeId`, `storeName`, `cityTalk`, `phoneNum`, `address`, `storePhoto`, `created_at`, `updated_at`
                    FROM `store`
                    ORDER BY `storeId` ASC';

            //查詢分頁後的商品資料
            $stmt = $pdo->prepare($sql);
            $stmt->execute(); //$arrParam

            //若數量大於 0，則列出商品
            if ($stmt->rowCount() > 0) {
                $arr = $stmt->fetchAll();
                for ($i = 0; $i < count($arr); $i++) {
            ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="card mb-3 shadow-sm">
                            <a style="text-decoration: none" href="./storeDetail.php?storeId=<?php echo $arr[$i]['storeId']; ?>">
                                <!-- <img class="list-item" src="./storeImages/<?php echo $arr[$i]['storePhoto']; ?>"> -->
                                <div class="card-body">
                                    <p class="card-title text-dark "><?php echo $arr[$i]['storeName']; ?></p>
                                    <p class="card-text text-info"><?php echo $arr[$i]['cityTalk'] ?></p>
                                    <p class="card-text text-info"><?php echo $arr[$i]['phoneNum'] ?></p>
                                    <div class="d-flex justify-content-between align-items-center">

                            </a>
                            <small class="text-muted">更新日期：<?php echo $arr[$i]['created_at']; ?></small>
                        </div>
                    </div>
        </div>
    </div>
<?php
                }
            }
?>
</div>
</div>
</div>