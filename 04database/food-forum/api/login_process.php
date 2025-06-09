<?php
$dsn = 'mysql:host=localhost;dbname=foodie;charset=utf8';
$pdo = new PDO($dsn, 'root', '');

//DB查詢帳密
// $sql = "SELECT * FROM `members` WHERE `acc` ='{$_POST['acc']}' && `pw` = '".md5($_POST['pw'])."'";
// $mem = $pdo->query($sql)->fetch();

// if($mem['acc']==$_POST['acc'] && $mem['pw']==md5($_POST['pw'])){
//     session_start();
//     $_SESSION['mem']=$mem;
//     header("location: ../index.php");
// }else{
//     //登入失敗
//     header("location: ../login.php?err=1");
// }

$sql = "SELECT count(*) FROM `members` WHERE `acc` ='{$_POST['acc']}' && `pw` = '".md5($_POST['pw'])."'";
//mem 回傳一個值
$mem = $pdo->query($sql)->fetchColumn();


if($mem){
    session_start();
    $_SESSION['mem']=$_POST['acc'];
    header("location: ../index.php");
}else{
    //登入失敗
    header("location: ../login.php?err=1");
}


exit;
?>