<?php
//引入登入判斷
require_once('./checkAdmin.php');

//關閉 session
session_destroy();

//3 秒後跳頁
header("Refresh: 3; url=../index.php");
echo "管理員登出成功！";