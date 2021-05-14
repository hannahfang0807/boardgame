<nav class="d-flex align-items-center p-3 px-4 navbar navbar-dark bg-dark border-bottom shadow-sm">
        <h1 class="navbar-brand font-weight-bold my-0">
            <a href="../index.php" class="text-warning">桌遊店-宇宙迷航</a>
        </h1>
        <div>
            <a class="p-2 text-light font-weight-bold" href="../ma/itemList.php">商品一覽</a>
            <a class="p-2 text-light font-weight-bold" href="../eleanor/reservations.php">預約</a>
            <a class="p-2 text-light font-weight-bold" href="../yo/board/homepage.php">揪團留言板</a>
            <a class="p-2 text-light font-weight-bold" href="../xiaoyae/index/index.php">分店資訊</a>
            
        </div>
        <div>
            <a class="p-2 text-light " href="./myCart.php">
                <span>我的購物車</span>
                (<span id="cartItemNum">
                <?php 
                if(isset($_SESSION["cart"])) {
                    echo count($_SESSION["cart"]);
                } else {
                    echo 0;
                }
                ?>
                </span>)
            </a>
            <a class="p-2 text-light font-weight-bold" href="./order.php">訂單資訊</a>
            <?php if(isset($_SESSION["memberAccount"])) { ?>
                <!-- <a class="p-2 text-light" href="./hannah/member.php">會員中心</a> -->
            <?php } ?>
            <?php if(!isset($_SESSION["memberAccount"])){ ?>
                <a class="btn btn-info my-0" href="../hannah/register.php">註冊</a>
                <a class="btn btn-warning my-0" href="../login.php">登入</a>
            <?php } else { ?>
                <span class="text-light"><?php echo $_SESSION["memberAccount"] ?> 您好</span>    
                <a class="btn btn-warning my-0 ml-2" href="../logout.php">登出</a>
                <?php } ?>
        </div>
    </nav>