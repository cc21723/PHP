<?php
session_start();

if ($_POST['acc'] == 'admin' && $_POST['pw'] == '1234') {
    echo "登入成功";
    $_SESSION['login'] = 1;
    // setcookie("login",1,time()+180);

    // header("location:login.php");
} else {
    echo "登入失敗";
    header("location:login.php");
}

?>
<a href="../index.php" 
    style="text-decoration: none;
    color: #a55a78;
    display: block;
    margin-top: 20px;">
    ⬅ 返回首頁</a>
