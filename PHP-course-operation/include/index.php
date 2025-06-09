<?php
$page = $_GET['page'] ?? 'main';
?>
<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學生管理系統
        <?php
        switch ($page) {
            case 'student_list':
                echo " - 學生列表";
                break;
            case 'student_add':
                echo " - 新增學生";
                break;
            case 'student_query':
                echo " - 學生查詢";
                break;
            case 'about':
                echo " - 關於";
                break;
            default:
                echo " - 首頁";
        }
        ?>
    </title>

    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>

    </style>
</head>

<body>
    <!-- header -->
    <?php
    include_once "layout/header.php"; //include_once只要載入一次

    // require找不到檔案就不會執行下方程式
    // require "nav111.php";
    
    // include 找不到檔案也會繼續執行
    // include "layout/header111.php";
    ?>


    <!-- main start -->
    <?php
    // include "main.php";
    
    // 方法1
    // 取得網址上的參數值（GET 參數），如果沒有就給預設值main
    // $page=isset($_GET['page']) ? $_GET['page'] : 'main'; //同等於 $_GET['page'] ?? 'main';
    
    // ?? 是「Null 合併運算子」 
    // 只能用在isset的情況 要true的值 = isset($_GET['page']) 裡面的$_GET['page']才能使用
    // $page = $_GET['page'] ?? 'main'; //移至最上方
    
    // switch($page){
    //     case 'student_list':
    //         include "main/student_list.php";
    //         break;
    //     case 'student_add':
    //         include "main/student_add.php";
    //         break;
    //     case 'student_query':
    //         include "main/student_query.php";
    //         break;
    //     case 'about':
    //         include "main/about.php";
    //         break;
    //     default:
    //         include "main/main.php";
    // }
    
    $file = "main/" . $page . ".php";
    if (file_exists($file)) {
        include $file;
    } else {
        include "main/main.php";
    }

    // // 方法2
    // //取得網址上的參數值（GET 參數），如果沒有就給預設值main
    // $page = $_GET['page'] ?? 'main';
    
    // // 防止惡意輸入，限制只允許特定檔名
    // $allowed_pages = ['main', 'student_add', 'student_list', 'student_query', 'about'];
    
    // // in_array($page, $allowed_pages)
    // // 意思是：「檢查 $page 的值是不是有包含在 $allowed_pages 這個陣列裡」
    // if (in_array($page, $allowed_pages)) {
    //     include "main/{$page}.php";
    // } else {
    //     echo "<p>找不到頁面</p>";
    // }
    
    ?>





    <?php
    include "layout/footer.php";
    ?>
</body>

</html>