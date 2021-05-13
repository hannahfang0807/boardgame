<?php
header("Content-Type: text/html; chartset=utf-8");
require_once('./checkSession.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>預約系統</title>

    <!-- <style>
        table, thead, tr, th, td, tbody {
            border: 1px solid black;
        }
    </style> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link rel="stylesheet" href="tailwind.css">
</head>
<body>


<?php
  require_once('./db.connect.php');
  $sql = "SELECT `memberName`, `memberId`, `memberImg`  FROM `members` WHERE `memberAccount` = ?";  //memberAccount must be unique
  $arrParam = array($_SESSION['memberAccount']);

  $stmt = $pdo->prepare($sql);
  $stmt->execute($arrParam);

  if($stmt->rowCount() > 0) {
    $memberinfo = $stmt->fetchAll()[0]; 
    $memberName = $memberinfo['memberName'];
    $memberId = (int)$memberinfo['memberId'];
    $memberImg = $memberinfo['memberImg'];

  }


  // echo $sql;
  // $res = $pdo->query($sql);
  // if($res->rowCount() > 0) {
  //   $memberinfo = $res->fetchAll()[0]; 
  //   $memberName = $memberinfo['memberName'];
    
  // }

?>

<?php //require_once('../templates/html-header.php') ?>

<nav class="d-flex align-items-center p-3 px-4 navbar navbar-dark bg-dark border-bottom shadow-sm">
        <h1 class="navbar-brand font-weight-bold my-0">
            <a href="../index.php" class="text-warning">桌遊店-宇宙迷航</a>
        </h1>
        <div>
            <a class="p-2 text-light font-weight-bold" href="../index.php">商品一覽</a>
            <a class="p-2 text-muted font-weight-bold" href="#">預約</a>
            <a class="p-2 text-light font-weight-bold" href="../yo/board/homepage.php">揪團留言板</a>
            <a class="p-2 text-light font-weight-bold" href="../xiaoyae/index/index.php">分店資訊</a>
        </div>
        <div>
            <a class="p-2 text-light " href="../sophia/myCart.php">
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
                <a class="btn btn-warning my-0 ml-2" href="../logout.php">登出</a>
                <?php } ?>
        </div>
    </nav>







<div class="mt-10 max-w-md mx-auto mb-10 bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
  <div class="md:flex">
    <div class="flex flex-col justify-center md:flex-shrink-0">
      <img class="h-48 w-full object-cover md:w-48" src="./img/Female-Avatar.png" >
    </div>
    <div class="p-8 flex flex-col">
      <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold"><h1>您好 <?php echo $memberName ?></h1></div>
      <a href="#" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">去商城查看最新商品</a>
      <p class="mt-2 text-gray-500">即日起實施入場消費實名制登記，請各位貴賓配合填寫。相關規範與注意事項，謹遵照衛服部疾管署之【COVID-19(武漢肺炎)防疫新生活運動：實聯制措施指引】辦理</p>

        <a href="./logout.php?logout=1"><button class="ml-auto w-20 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          登出
        </button></a>


    </div>
  </div>
</div>


    <div class="mt-10 sm:mt-0">
  <div class="md:grid md:grid-cols-2 md:gap-6">

    <div class=" mt-5 md:mt-0 md:col-span-2 ">
      <form action="./insert.php" method="POST" name = "myForm" method="POST">
        <div class="2xl:mx-96 xl:mx-60 md:mx-40 sm:mx-10 shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="date" class="block text-sm font-medium text-gray-700">預約日期</label>
                <input required type="date" name="date" id="date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="startTime" class="block text-sm font-medium text-gray-700">預約時間</label>
                <select id="startTime" name="startTime" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="time" class="block text-sm font-medium text-gray-700">選擇分店</label>
                <select id="storeId" name="storeId" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="1">台北店</option>
                    <option value="2">台中店</option>
                </select>
              </div>



              <div class="col-span-6 sm:col-span-3">
                <label for="duration" class="block text-sm font-medium text-gray-700">預約時數</label>
                <select id="duration" name="duration" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="numberOfPeople" class="block text-sm font-medium text-gray-700">人數</label>
                <select id="numberOfPeople" name="numberOfPeople" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="3">4</option>
                    <option value="4">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
              </div>

              <div class="col-span-6">
                <label for="notes" class="block text-sm font-medium text-gray-700">備註</label>
                <textarea id="notes" name="notes" placeholder="Leave a message to us" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
              </div>
              
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <input type="hidden" name="reservationId">
            <input type="hidden" name="memberId" value="<?php echo $memberId ?>">
            <button type="submit" class=" inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              確認預約
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



    <hr>

    <?php 
        require_once('./db.connect.php');
        $sql = "SELECT * FROM `reservations` WHERE `memberId` = ? ORDER BY date ASC";
        $arrParam = array($memberId); //[42]
        $res = $pdo->prepare($sql);
        $res->execute($arrParam);
        if ($res->rowCount() > 0){
        $arr = $res->fetchAll();

    ?>

    <h1>我的預約</h1>
    <h2>總計 <?php echo count($arr); ?> 筆預約</h2>



    
<div class="my-5 2xl:mx-50 xl:mx-50 md:mx-20 sm:mx-10 shadow overflow-hidden sm:rounded-md">
    <form class="" action="./delete.php" method="POST">
        <table class="table auto">
            <div class="bg-gray-200 ">
            
                <div class="grid grid-cols-12 gap-3">
                <div class="px-3 py-3 col-span-2" >預約日期</div>
                <div class="px-3 py-3 ">預約編號</div>
                <!-- <div class="px-3 py-3 ">會員大名</div> -->
                <div class="px-3 py-3 ">預約時間</div>
                <div class="px-3 py-3 ">持續時間</div>
                <div class="px-3 py-3 ">預約地點</div>
                <div class="px-3 py-3 ">預約人數</div>
                <div class="px-3 py-3 ">金額運算</div>
                <div class="px-3 py-3 col-span-2">客人備註</div>
                <div class="px-3 py-3 col-span-2 ">編輯/選取</div>
                <!-- <div class="px-3 py-3 ">選取</div> -->
                </div>
            </div>
      <tbody>
    
    <?php
    
    // require_once('./db.connect.php');
    // $sql = "SELECT * FROM `reservations` ORDER BY date ASC";
    // $res = $pdo->query($sql);
    
    // if ($res->rowCount() > 0){
    //     $arr = $res->fetchAll();
        for ($i = 0; $i < count($arr); $i ++) {
    
    ?>
        <div class="grid grid-cols-12 gap-3">
          <div class="px-3 py-5 col-span-2"><?php echo $arr[$i]['date']  ?></div>
          <div class="px-3 py-5 "><?php echo $arr[$i]['reservationId']  ?></div>
          <!-- <div class="px-3 py-5 "><?php //echo $memberName  ?></div> -->
          <div class="px-3 py-5 "><?php echo $arr[$i]['startTime']  ?> :00</div>
          <div class="px-3 py-5 "><?php echo $arr[$i]['duration']  ?></div>
          <div class="px-3 py-5 "><?php $store = (int)$arr[$i]['storeId'] === 1? "台北店" : "台中店"; echo $store; ?></div>
          <div class="px-3 py-5 "><?php echo $arr[$i]['numberOfPeople']  ?></div>
          <div class="px-3 py-5 "><?php echo $arr[$i]['priceEstimated']  ?></div>
          <div class="px-3 py-5 col-span-2">
              <?php
              if(isset($arr[$i]['notes'])) {
              echo $arr[$i]['notes']; } else {
                  echo "";
              }
              ?>
    
          </div>
          <div class="grid col-span-2 grid-flow-col	my-auto">
            <a class="h-8 mt-2 inline-flex justify-center px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 leading-7" href="./edit.php?reservationId=<?php echo  $arr[$i]['reservationId']; ?>" > 編輯</a>
            <div class="flex justify-center my-auto">
              <input type="checkbox" name="chk[]" value="<?php echo $arr[$i]['reservationId']; ?>" />
            </div>
          </div>
        </div>        

        <?php }}else {echo "目前無訂單";}?>
    
      </tbody>

        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <!-- <input type="hidden" name="reservationId">

            <input type="hidden" name="memberId" value="<?php //echo $memberId?>"> -->
            <button type="submit" class=" inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
            刪除選取
            </button>
        </div>
    </table>
    

    </form>
</div>





</body>
</html>
