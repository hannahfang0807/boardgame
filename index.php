<?php
session_start(); //session
require_once('./db.inc.php'); //連接資料庫
require_once('./templates/html-header.php'); //html-header模板(BS設定)
?>



    <?php
    require_once('./nav.php'); //引入導覽列
    require_once('./ma/tpl/tpl-carousel.php');
    require_once('./ma/tpl/main.php');
?>



<?php
require_once('./templates/html-footer.php');//html-footer模板(BS設定)
?>