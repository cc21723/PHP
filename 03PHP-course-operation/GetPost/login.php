<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cute+Font&family=Noto+Sans+TC&display=swap');

        body {
            font-family: 'Noto Sans TC', 'Cute Font', sans-serif;
            background-color: #fff7fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 480px;
            margin: 60px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 6px 16px rgba(248, 165, 194, 0.2);
            border: 3px dashed #f8a5c2;
            text-align: left;
        }
        a{
            text-decoration: none;
            color: #a55a78;
            display: block;
            margin-top: 20px;
        }
        a:hover{
            color: #f78fb3;
        }

        h1 {
            font-family: 'Cute Font', cursive;
            font-size: 36px;
            color: #f78fb3;
            margin-bottom: 10px;
            text-align: center;
        }

        h2 {
            font-size: 24px;
            color: #a55a78;
            margin-bottom: 20px;
        }

        p {
            color: #777;
            font-size: 16px;
            margin: 8px 0;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
            align-items: center;
        }

        label {
            font-weight: bold;
            color: #c26e94;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            width: 80%;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 10px 24px;
            background-color: #f8a5c2;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #f78fb3;
        }

        /* 按鈕 */
        .btn-container {
            width: 80%;
            display: flex;
            justify-content: space-between;
        }
    </style>

</head>

<body>
<?php
if(!isset($_GET[''])){
?>

    <div class="container">
        <h1>網頁傳值練習</h1>
        <h2>登入檢查</h2>
        <p>建立一個可以輸入帳號和密碼的表單畫面</p>
        <p>輸入帳號密碼，按下"登入"按鈕後，在另一個頁面顯示帳號密碼是否正確。</p>

        <form action="check.php" method="post">
            <div>
                <label for="acc">帳號:</label>
                <input type="text" name="acc" required>
            </div>
            <div>
                <label for="pw">密碼:</label>
                <input type="password" name="pw" required>
            </div>
            <div class="btn-container">
                <input type="submit" value="登入">
                <input type="reset" value="清空內容">
            </div>
        </form>
        <a href="../../index.html">⬅ 返回首頁</a>
    </div>

    <?php
}
?>

</body>

</html>