<?php
session_start();         // 啟用 session（必要）
session_unset();         // 清除所有 session 變數
session_destroy();       // 銷毀 session 資料

// 導回 dashboard.php
header("Location: ../pages/login.php");
exit;
?>