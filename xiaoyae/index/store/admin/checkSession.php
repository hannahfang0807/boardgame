<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Refresh: 3; url = ../index.php');
    echo '請確實登入';
}
?>