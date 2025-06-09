<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
    <link rel="stylesheet" href="style.css">
    <style>
        h1 {
            text-align: center;
            font-family: '標楷體', sans-serif;
        }

        /* 表單整體容器 */
        form {
            max-width: 400px;
            margin: 2rem auto;
            background-color: #fdfbff;
            padding: 2rem;
            border-radius: 1.5rem;
            box-shadow: 0 4px 10px rgba(190, 170, 210, 0.2);
            font-family: 'Noto Sans TC', sans-serif;
        }

        .error {
            color: #e74c3c;
            /* 紅色 */
            font-weight: bold;
            background-color: #ffe6e6;
            padding: 10px;
            border: 1px solid #f5c2c2;
            border-radius: 8px;
            text-align: center;
            margin: 1em auto;
            width: fit-content;
        }

        /* 單一欄位區塊 */
        form div {
            margin-bottom: 1.2rem;
        }

        /* 標籤 */
        form label {
            display: block;
            margin-bottom: 0.4rem;
            color: #875f9a;
            font-weight: bold;
        }

        /* 輸入框 */
        form input {
            width: 100%;
            padding: 0.6rem;
            border: 1px solid #d5c1e3;
            border-radius: 0.8rem;
            background-color: #fffafa;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        form input:focus {
            border-color: #b39cd0;
            outline: none;
            box-shadow: 0 0 5px rgba(180, 150, 200, 0.3);
        }

        /* 按鈕群組 */
        .button-group {
            display: flex;
            justify-content: space-around;
        }

        /* 註冊／重置按鈕 */
        form button {
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: 999px;
            font-size: 1rem;
            cursor: pointer;
            background-color: #d9c2e9;
            color: #5a4268;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(160, 130, 190, 0.2);
        }

        form button:hover {
            background-color: #bca2d6;
            color: #fff;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <h1>會員登入</h1>
        <?php if (isset($_GET['err'])) {
            echo '<p class="error">帳號或密碼錯誤，請重新輸入。</p>';
        } ?>
        <form action="./api/login_process.php" method="post">
            <div>
                <label for="acc">帳號：</label>
                <input type="text" id="acc" name="acc" required autocomplete="username">
            </div>

            <div>
                <label for="pw">密碼：</label>
                <input type="password" id="pw" name="pw" required autocomplete="current-password">
            </div>

            <div class="button-group">
                <button type="submit">登入</button>
                <button type="reset">清除</button>
            </div>
    </main>
    <?php include 'footer.php' ?>
</body>

</html>