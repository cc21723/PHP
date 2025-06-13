<?php
/**
 * 1.建立表單
 * 2.建立處理檔案程式
 * 3.搬移檔案
 * 4.顯示檔案列表
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案上傳</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <h1 class="header">檔案上傳練習</h1>
 <!----建立你的表單及設定編碼----->
    <form action="uploaded_files.php" method="post" enctype="multipart/form-data">
        <label for="file">選擇檔案上傳：</label>
        <input type="file" name="myfile" id="file" require>
        <button type="submit">上傳檔案</button>
    </form>




<!----建立一個連結來查看上傳後的圖檔---->  

    <a class="a-style" href="../../index.html">⬅ 返回首頁</a>
</body>
</html>