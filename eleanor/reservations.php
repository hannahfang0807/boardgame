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
        <link rel="stylesheet" href="tailwind.css">
</head>
<body>


<?php
  require_once('./db.connect.php');
  $sql = "SELECT `memberName`, `memberId`, `memberImg`  FROM `members` WHERE `memberAccount` = ?";  //memberAccount must be unique
  $arrParam = array($_SESSION['username']);

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

<nav class="bg-gray-800 mb-10">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-16">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>

          <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>

          <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>


        </button>
      </div>
      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex-shrink-0 flex items-center">
          <img class="block lg:hidden h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
          <img class="hidden lg:block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow">
        </div>
        <div class="hidden sm:block sm:ml-6">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">新增預約</a>

            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">商品一覽</a>

            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">關於我們</a>

            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">分店資訊</a>
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <button class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
          <span class="sr-only">View notifications</span>
          <!-- Heroicon name: outline/bell -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
        </button>

        <!-- Profile dropdown -->
        <div class="ml-3 relative">
          <div>
            <button type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="sr-only">Open user menu</span>
              <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </button>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="px-2 pt-2 pb-3 space-y-1">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">新增預約</a>

      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">商品一覽</a>

      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">關於我們</a>

      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">分店資訊</a>
    </div>
  </div>
</nav>


<div class="max-w-md mx-auto mb-10 bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
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
