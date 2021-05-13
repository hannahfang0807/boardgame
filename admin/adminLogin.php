<?php
session_start();
require_once ('../db.inc.php'); //連接資料庫
require_once ('../html-header.php'); //html-header模板(BS設定)
require_once ('../nav.php'); //引入導覽列


//預設訊息 (錯誤先行)
$objResponse['success'] = false;
$objResponse['info'] = "登入失敗";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            outline: none;
        }

        .mForm {
            margin: 0 auto;
            /* background: #9EDCD8; */
            border-radius:20px;
        }
        h1 {
            /* color: lightseagreen; */
        }

        p {
            line-height: 50px;
            margin: 0;
        }

        
    </style>
</head>
<body>
<div class="conatiner mt-5">
    <div class="row align-items-center m-0 flex-column ">
        <form class="mForm w-30 w-md-30 p-5 mt-3 bg-dark shadow-sm" method="post" action="./adminLoginCheck.php">
            <h3 class="font-weight-bold text-light text-center">管理員登入</h3>
            <div>
                <p for="exampleFormControlInput1" class="text-light">帳號</p>
                <input type="text" name="adminAccount" value="" class="form-control" id="exampleFormControlInput1">
                <p for="exampleFormControlInput1" class="text-light">密碼</p>
                <input type="password" name="adminPwd" value="" class="form-control mb-5" id="exampleFormControlInput1" placeholder="**********">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-warning shadow-sm btn-block">登入</button>
                <a class="d-block mt-3 text-decoration-none" href="../login.php" class="text-light">會員登入</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>



<?php
require_once('../html-footer.php'); //html-header模板(BS設定)
?>
