<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI計算機</title>
    <!-- Fonts: 手寫風 -->
    <link href="https://fonts.googleapis.com/css2?family=Cute+Font&family=Noto+Sans+TC&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Noto Sans TC', 'Cute Font', sans-serif;
            background-color: #fff7fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(248, 165, 194, 0.3);
            border: 4px dashed #f8a5c2;
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

        h1,
        h2 {
            text-align: center;
            color: #f78fb3;
            margin-bottom: 10px;
        }

        p {
            text-align: center;
            color: #a55a78;
            margin: 5px 0 15px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            color: #a55a78;
        }

        input[type="number"] {
            padding: 10px;
            border: 1px solid #f8c5d9;
            border-radius: 10px;
            width: 100%;
            box-sizing: border-box;
            background-color: #fff0f5;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 12px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            background-color: #f8a5c2;
            color: white;
            font-weight: bold;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #f78fb3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>網頁傳值練習</h1>
        <h2>BMI 計算</h2>
        <p>輸入身高和體重，計算你的 BMI</p>

        <form action="bmi-ans.php" method="post">
            <div>
                <label for="height">身高（公尺）:</label>
                <input type="number" name="height" step="0.01" min="0" required>
            </div>
            <div>
                <label for="weight">體重（公斤）:</label>
                <input type="number" name="weight" min="0" required>
            </div>
            <input type="submit" value="計算BMI">
            <input type="reset" value="清空內容">
        </form>
        <a href="../../index.html">⬅ 返回首頁</a>
    </div>
</body>

</html>
