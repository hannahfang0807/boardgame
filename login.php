<?php
session_start();
require_once ('./db.inc.php'); //連接資料庫
require_once ('./templates/html-header.php'); //html-header模板(BS設定)
require_once ('./nav.php'); //引入導覽列

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
            border-radius:20px;
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
        <form class="mForm w-30 w-md-30 p-5 mt-3 bg-light shadow-sm" method="post" action="./loginCheck.php">
            <h3 class="font-weight-bold text-secondary text-center">會員登入</h3>
            <div>
                <p for="exampleFormControlInput1">帳號</p>
                <input type="text" name="memberAccount" value="" class="form-control" id="exampleFormControlInput1">
                <p for="exampleFormControlInput1">密碼</p>
                <input type="password" name="memberPwd" value="" class="form-control mb-5" id="exampleFormControlInput1" placeholder="**********">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary shadow-sm btn-block">登入</button>
                
                <a class="d-block mt-3 text-decoration-none" href="./hannah/register.php">註冊</a>
                <a class="d-block mt-3 text-decoration-none" href="./admin/adminLogin.php">管理員登入</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>



<?php
require_once('./templates/html-footer.php'); //html-header模板(BS設定)
?>
