<?php
session_start();

if (!isset($_SESSION['memberAccount'])) {
    session_destroy();

    header("Refresh: 3; url=../../index.php");
    echo "請確實登入…3秒後自動回登入頁";
    exit();
}
