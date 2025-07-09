<?php
session_start();

if (!isset($_SESSION['admin'])) {
   
    header("Location: login.php");
    exit;
}

// 驗證是否為管理員登入
// if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
//     header("Location: login.php");
//     exit;
// }
?>
