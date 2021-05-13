<?php

session_start();
require_once ('../db.inc.php');

$objResponse['success'] = false;
$objResponse['info'] = "註冊失敗，：輸入完整資料";

if ( $_POST['memberAccount'] == "" || $_POST['memberPwd'] == "" || $_POST['memberPwdCheck'] == ""){
    header("Refresh: 3; url=../index.php");
    $objResponse['info'] = "註冊失敗：請輸入完整資料";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}

if ( $_POST['memberPwd'] !== $_POST['memberPwdCheck']){
    header("Refresh: 3; url=../index.php");
    $objResponse['info'] = "註冊失敗：兩次輸入的密碼不相同";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
    exit();
}

$sql = "INSERT INTO `members` (`memberAccount`,`memberPwd`) 
        VALUES (?,?)";

$arrParam = [
    $_POST["memberAccount"],
    sha1($_POST["memberPwd"]),
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if($stmt->rowCount() > 0) {
    header("Refresh: 3; url=../index.php");

    //註冊 session
    $_SESSION["memberAccount"] = $_POST["memberAccount"];
    $_SESSION["memberPwd"] = $_POST["memberPwd"];

    $objResponse['success'] = true;
    $objResponse['info'] = "註冊成功";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
} else {
    header("Refresh: 3; url=../index.php");
    $objResponse['info'] = "註冊失敗";
    echo json_encode($objResponse, JSON_UNESCAPED_UNICODE);
}

?>