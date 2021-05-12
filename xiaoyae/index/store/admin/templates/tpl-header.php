<?php
// session_start();
// session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>頁頭</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>
    <nav class="d-flex align-items-center p-3 px-md-4 mb-3 bg-dark border-bottom shadow-sm">
        <div>
            <h5 class="my-0 mr-md-auto font-weight-normal">
                <a class="text-white" style="text-decoration: none;" href="../../php_project/index/index.php">桌遊店名稱</a>
            </h5>
        </div>
        <div>
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="#">商品一覽</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">預約</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">分店一覽</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">留言板</a>
                </li>
            </ul>
            <!-- <a class="p-2 text-white" style="text-decoration: none;" href="#">商品一覽</a>
            <a class="p-2 text-white" style="text-decoration: none;" href="#">預約</a>
            <a class="p-2 text-white" style="text-decoration: none;" href="#">分店一覽</a>
            <a class="p-2 text-white" style="text-decoration: none;" href="#">留言板</a> -->
        </div>

        <div style="justify-self: end;">
            <?php if (isset($_SESSION['username'])) { ?>
                <a class="p-2 text-white" href="./myCart.php">
                    <span>我的購物車</span>
                    (<span id="cartItemNum">
                        <?php
                        if (isset($_SESSION["cart"])) {
                            echo count($_SESSION["cart"]);
                        } else {
                            echo 0;
                        }
                        ?>
                    </span>)
                    <a class="p-2 text-white" style="text-decoration: none;" href="#">賣家後台</a>
                <?php } ?>



                <?php if (!isset($_SESSION['username'])) { ?>
                    <a class="btn btn-outline-light" href="#">註冊</a>
                <?php } else { ?>
                    <span class="text-white"><?php echo $_SESSION['name'] ?> 您好</span>
                <?php } ?>

                <span class="ml-3 mr-3 text-white"> | </span>
                <?php if (!isset($_SESSION['username'])) { ?>
                    <a class="btn btn-outline-light" href="./login.php">登入</a>
                <?php } else { ?>
                    <a class="btn btn-outline-light" href="./logout.php">登出</a>
                <?php } ?>
        </div>
    </nav>
</body>

</html>