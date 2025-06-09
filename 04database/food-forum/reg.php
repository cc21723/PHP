<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員註冊</title>
    <link rel="stylesheet" href="style.css">

    <style>
        h1 {
            text-align: center;
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
        <h1>會員註冊</h1>
        <form action="./api/add_member.php" method="post">
            <div>
                <label for="name">使用者名稱：</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div>
                <label for="birthday">生日：</label>
                <input type="date" id="birthday" name="birthday" required>
            </div>

            <div>
                <label for="email">電子郵件：</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div>
                <label for="acc">帳號：</label>
                <input type="text" id="acc" name="acc" required>
            </div>

            <div>
                <label for="pw">密碼：</label>
                <input type="password" id="pw" name="pw" required>
            </div>

            <div class="button-group">
                <button type="submit">註冊</button>
                <button type="reset">重置</button>
            </div>
        </form>


    </main>
    <?php include 'footer.php'; ?>
</body>

</html>