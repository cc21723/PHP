<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>計算BMI結果</title>

    <!-- 引入手寫字體 -->
    <link href="https://fonts.googleapis.com/css2?family=Cute+Font&family=Noto+Sans+TC&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Noto Sans TC', 'Cute Font', sans-serif;
            background-color: #fff7fa;
            /* 柔粉嫩背景 */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 60px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(248, 165, 194, 0.2);
            text-align: center;
            border: 3px dashed #f8a5c2;
        }

        h1 {
            font-family: 'Cute Font', cursive;
            font-size: 40px;
            color: #f78fb3;
            /* 溫柔粉紅 */
            margin-bottom: 20px;
        }

        p {
            font-size: 20px;
            color: #a55a78;
            /* 柔和字色 */
            margin: 12px 0;
        }

        .result {
            font-size: 28px;
            font-weight: bold;
            color: #d672a3;
            /* 明亮莓果色 */
            margin: 24px 0;
        }

        a {
            display: inline-block;
            padding: 12px 28px;
            background-color: #f8a5c2;
            /* 主色 */
            color: white;
            border-radius: 12px;
            text-decoration: none;
            font-size: 18px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        a:hover {
            background-color: #f78fb3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>🌸 BMI 計算結果 🌸</h1>

        <?php
        if (isset($_POST['height']) && isset($_POST['weight'])) {
            $height = $_POST['height'];
            $weight = $_POST['weight'];
            echo "<p>身高為：{$height} 公尺</p>";
            echo "<p>體重為：{$weight} 公斤</p>";

            if ($height > 0) {
                $bmi = round($weight / ($height * $height), 2);
                echo "<div class='result'>你的 BMI 是：{$bmi}</div>";

                // 額外說明
                if ($bmi < 18.5) {
                    echo "<p>😯 體重過輕，要多吃一點喔！</p>";
                } elseif ($bmi < 24) {
                    echo "<p>😊 正常範圍，保持健康！</p>";
                } elseif ($bmi < 27) {
                    echo "<p>😐 有點過重，注意飲食就好～</p>";
                } else {
                    echo "<p>😵‍💫 有點肥胖了，要加油運動！</p>";
                }
            } else {
                echo "<p>❌ 身高不可為 0！</p>";
            }
        } else {
            echo "<p>請輸入身高與體重來計算 BMI！</p>";
        }
        ?>
        <a href="bmi-input.php">⬅ 返回上一頁</a>
        <a href="../index.php">⬅ 返回首頁</a>
    </div>
</body>

</html>