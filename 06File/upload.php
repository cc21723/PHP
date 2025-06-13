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
    <style>
        /* style.css */

        body {
            font-family: "Segoe UI", sans-serif;
            background: linear-gradient(to bottom right, #fef6fa, #e3f2fd);
            color: #4a4a4a;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem;
            margin: 0;
        }

        .header {
            font-size: 2rem;
            color: #6a4e77;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 3px rgba(150, 120, 170, 0.1);
        }

        form {
            background-color: #ffffffcc;
            padding: 2rem 2.5rem;
            border-radius: 18px;
            box-shadow: 0 5px 15px rgba(140, 100, 160, 0.15);
            width: 100%;
            max-width: 500px;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        label {
            font-weight: bold;
            color: #5a4a6a;
        }

        input[type="file"] {
            padding: 0.6rem;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f8f8f8;
        }

        button {
            background-color: #ba8eb2;
            color: white;
            border: none;
            padding: 0.8rem 1.4rem;
            font-size: 1rem;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #9f6fa0;
        }

        .a-style {
            display: inline-block;
            margin-top: 2rem;
            padding: 0.6rem 1.2rem;
            background-color: #e1bee7;
            color: #4a3d4f;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .a-style:hover {
            background-color: #d1a5dd;
        }
    </style>
</head>

<body>
    <h1 class="header">檔案上傳練習</h1>
    <!----建立你的表單及設定編碼----->
    <form action="uploaded_files.php" method="post" enctype="multipart/form-data">
        <label for="file">選擇檔案上傳：</label>
        <input type="file" name="myfile" id="file" required>
        <button type="submit">上傳檔案</button>
    </form>




    <!----建立一個連結來查看上傳後的圖檔---->

    <a class="a-style" href="../../index.html">⬅ 返回首頁</a>
</body>

</html>