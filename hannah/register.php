<?php

session_start();
require_once ('../db.inc.php'); //連接資料庫
require_once ('../templates/html-header.php'); //html-header模板(BS設定)
require_once ('./nav.php'); //引入導覽列

?>
<head>
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
            <form class="mForm w-50 p-5 mt-3 bg-light shadow-sm" method="post" action="./RegisterCheck.php">
                <h3 class="font-weight-bold text-secondary text-center">註冊會員</h3>
                <div>
                    <p for="exampleFormControlInput1">帳號</p>
                    <input type="text" name="memberAccount" value="" class="form-control" id="exampleFormControlInput1" placeholder="請輸入至少8位數的英數混合帳號">
                    <p for="exampleFormControlInput1">密碼</p>
                    <input type="password" name="memberPwd" value="" class="form-control" id="exampleFormControlInput1" placeholder="**********">
                    <p for="exampleFormControlInput1">確認密碼</p>
                    <input type="password" name="memberPwdCheck" value="" class="form-control mb-5" id="exampleFormControlInput1" placeholder="**********">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary shadow-sm btn-block">註冊</button>
                    <a class="d-block mt-3 text-decoration-none" href="../login.php">已經有帳號？</a>
                </div>
            </form>
        </div>
    </div>
</body>

<?php
require_once('../templates/html-footer.php'); //html-header模板(BS設定)
?>