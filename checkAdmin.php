<?php
session_start();

if( !isset($_SESSION['adminAccount']) ) {
    session_destroy();
    
    header("Refresh: 3; url=./admin/adminLogin.php");
    echo "請確實登入…3秒後自動回登入頁";
    exit();
}