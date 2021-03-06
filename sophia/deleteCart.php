<?php
session_start();
require_once('./db.inc.php');
require_once('./html-header.php'); 
require_once('./nav.php'); 

$objResponse['success'] = false;
$objResponse['info'] = "查無購物車編號";

header("Refresh: 1; url=./myCart.php");

if( !isset($_GET["idx"]) ){
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}

//刪除指定的索引位置
unset($_SESSION['cart'][$_GET["idx"]]);

//重建索引
$_SESSION['cart'] = array_values($_SESSION['cart']);

$objResponse['success'] = true;
$objResponse['info'] = "已刪除特定購物車商品項目";
echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
exit();

require_once('./html-footer.php');