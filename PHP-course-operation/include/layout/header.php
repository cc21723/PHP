<?php session_start(); ?>
<header>
    <h1>🌸 學生管理系統 🌿</h1>
</header>
<nav>
    <ul>
        <!-- <a href="index.php?page=home">：超連結，連到 index.php，並在網址後面加上 ?page=home -->
        <!-- page=home：這是一個 GET 參數，你可以在 PHP 裡用 $_GET['page'] 來接收它。 -->
        <li><a class="<?=($page=='main')?'active':'';?>" href="index.php?page=main">首頁</a></li>
        <li><a class="<?=($page=='student_list')?'active':'';?>" href="index.php?page=student_list">學生列表</a></li>
        <li><a class="<?=($page=='student_add')?'active':'';?>" href="index.php?page=student_add">新增學生</a></li>
        <li><a class="<?=($page=='student_query')?'active':'';?>" href="index.php?page=student_query">查詢學生</a></li>
        <li><a class="<?=($page=='about')?'active':'';?>" href="index.php?page=about">關於</a></li>
    </ul>
</nav>