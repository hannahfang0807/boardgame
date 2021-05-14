<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, thead, tr, th, td, tbody {
            border: 1px solid black;
        }
    </style>
</head>
<body> -->
    
<?php
  require_once('../db.inc.php');
  
  require_once('../html-header.php');
// print_r( $_POST['chk']);

$sql = "SELECT * FROM `reservations` 
WHERE reservationId = ? ";
$arrParam = (int)$_GET['reservationId'];
$stmt = $pdo->prepare($sql);
$stmt->execute([$arrParam]);

if($stmt->rowCount() > 0) {
    $result = $stmt->fetchAll()[0];
    ?>


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
            <a class="p-2 text-light " href="./sophia/myCart.php">
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
            <?php if(isset($_SESSION["memberAccount"])) { ?>
                <!-- <a class="p-2 text-light" href="./hannah/member.php">會員中心</a> -->
            <?php } ?>
            <?php if(!isset($_SESSION["memberAccount"])){ ?>
                <a class="btn btn-info my-0" href="./hannah/register.php">註冊</a>
                <a class="btn btn-warning my-0" href="./login.php">登入</a>
            <?php } else { ?>
                <span class="text-light"><?php echo $_SESSION["memberAccount"] ?> 您好</span>    
                <a class="btn btn-warning my-0 ml-2" href="./logout.php">登出</a>
                <?php } ?>
        </div>
    </nav>

<form action="./update.php" method="POST">

<table class="mt-5 table table-bordered">
<thead>
    <tr>
      <th>預約日期</th>
      <th>預約編號</th>
      <th>會員編號</th>
      <th>預約時間</th>
      <th>預約時數</th>
      <th>預約地點</th>
      <th>預約人數</th>
      <th>客人備註</th>

    </tr>
    <tr>
        <td><input type="date" name="date" value="<?php echo $result['date'];?>"> </td>
        <td><?php echo $result['reservationId'];?></td>
        <td><?php echo $result['memberId'];?></td>
        <td> 
            <select name="startTime">
                <option value="<?php echo $result['startTime'];?>"><?php echo $result['startTime'];?>: 00</option>
                <option value="13">13: 00</option>
                <option value="14">14: 00</option>
                <option value="15">15: 00</option>
                <option value="16">16: 00</option>
                <option value="17">17: 00</option>
                <option value="18">18: 00</option>
                <option value="19">19: 00</option>
                <option value="20">20: 00</option>
                <option value="21">21: 00</option>
                <option value="22">22: 00</option>
            </select>
        </td>
        <td>
            <select name="duration" id="hours">
                <option value="<?php echo $result['duration'];?>"><?php echo $result['duration'];?></option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
            
    
        </td>
        <td>
            <select name="storeId" id="branch">
            <?php 
                $sql = "SELECT `storeName`, `storeId` FROM `store`";
                $res = $pdo->query($sql);
                if ($res->rowCount() >0){
                    $stores = $res->fetchAll();
                    for ($i = 0; $i < count($stores); $i++){ ?>
                    <option value="<?php echo $result['storeId'];?>"> <?php  ?> </option>
                      <option value= <?php echo $stores[$i]['storeId'] ?>><?php echo $stores[$i]['storeName'] ?></option>

            <?php    }
                } 
            ?>

            </select>
    
        </td>
        <td>
            <select name="numberOfPeople" id="poeple">
                <option value="<?php echo $result['numberOfPeople'];?>"><?php echo $result['numberOfPeople'];?></option>
                <option value="3">4</option>
                <option value="4">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
        </td>
        <td>
            <textarea name="notes" cols="10" rows="1"><?php echo $result['notes'];?></textarea>
        </td>
    </tr>

    <?php }?>
  </thead>

</table>
<input type="hidden" name="reservationId" value="<?php echo (int)$_GET['reservationId'] ?>">
<div class="d-flex justify-center">
<button class="mx-auto btn btn-primary">確認修改</button>

</div>
</form>
<div class="d-flex justify-center">
<button class="mx-auto"><a href="./reservations.php">回上頁</a> </button> 

</div>


</body>
</html>
