<?php

if($_POST['acc'] == 'admin' && $_POST['pw'] == '1234'){
    echo "登入成功";
    header("location:login.php?login=1");
}else{
    echo "登入失敗";
    header("location:login.php?login=0");
}


?>
<a href="../index.php" style="text-decoration: none;
    color: #a55a78;
    display: block;
    margin-top: 20px;">⬅ 返回首頁</a>