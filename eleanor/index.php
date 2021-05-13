<?php



// if( !isset($_SESSION['username']) ) {
//     session_destroy();
    
//     //3 秒後跳頁
//     echo "請確實登入後才能預約";
//     echo "
    
//     ";
//   } else {
//     echo "歡迎使用預約系統";
//   }

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
    
</body>
</html>

<div class='flex justify-flex-start my-10 max-w-7xl mx-auto px-2 sm:px-6 lg:px-8'>
    <form name='myForm' method='POST' action='./login.php'>
    
      <label for='username'>帳號</label>
      <input type='text' name='username' id='username' class='mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm rounded-md' />
    
      <label for='pwd'>密碼:</label>
      <input type='password' name='pwd' id='pwd' class='mt-1 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:text-sm rounded-md' />
    
      <button type='submit' class=' inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500'>
                  會員登入
      </button>
    </form>
  </div>



