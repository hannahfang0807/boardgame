<?php
session_start();
if (!issst($_SESSION['username'])) {
    header('Refresh: 3; url = ../index.php');
    echo '請確實登入';
}
?>