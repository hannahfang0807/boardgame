<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .button:hover .hover {
            display: block;
        }

        .hover {
            display: none;
            background-color: #ffb2b2;
        }

        /* body {
            background-image: url("../img/");
            background-repeat: no-repeat;
            background-color: white;
        } */
    </style>
</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-smd">
        <h5 class="my-0 mr-md-auto font-weight-normal">
            <a href=".">約嗎？</a>
        </h5>

        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="./index.php">商品列表</a>
            <a class="p-2 text-dark" href="./.php">互動遊戲</a>
            <a class="p-2 text-dark" href="./.php">揪團留言版</a>
            <a class="p-2 text-dark" href="./.php">分店資訊</a>
            <a class="p-2 text-dark" href="./myCart.php">
                <span>購物車</span>
                (<span id="cartItemNum">
                    <?php
                    if (isset($_SESSION["cart"])) {
                        echo count($_SESSION["cart"]);
                    } else {
                        echo 0;
                    }
                    ?>
                </span>)
            </a>

            <?php if (isset($_SESSION["username"])) { ?>
                <a class="p-2 text-dark" href="./order.php">會員中心</a>
                <a class="p-2 text-dark" href="./order.php">我的訂單</a>
                <!-- <a class="p-2 text-dark" href="./itemTracking.php">我的追蹤</a> -->
            <?php } ?>

        </nav>

        <?php if (!isset($_SESSION["username"])) { ?>
            <a class="btn btn-outline-primary mr-3" href="./login.php">登入</a>
            <a class="btn btn-outline-primary" href="./register.php">註冊</a>
        <?php } else { ?>
            <span><?php echo $_SESSION["name"] ?> 您好</span>
            <a class="btn btn-outline-success my-0 ml-2" href="../logout.php">登出</a>
        <?php } ?>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>