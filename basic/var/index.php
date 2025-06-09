<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>變數練習</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap');
        body {
            font-family: 'Patrick Hand', monospace;
            background-color: #fff0f5;
            margin: 0 auto;
            padding: 30px 20px;
            max-width: 800px;
            border: 4px dashed #E16B8C;
            border-radius: 16px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            color: #333;
        }

        h1 {
            text-align: center;
            color: #E16B8C;
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        hr {
            border: none;
            border-top: 2px dashed #E16B8C;
            margin: 20px 0;
        }

        .output {
            background-color: #ffe4ec;
            padding: 15px 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            line-height: 1.6;
        }

        code {
            background: #f3f3f3;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: monospace;
        }
    </style>
</head>

<body>
    <h1>🎀 PHP 變數與條件練習</h1>
    <div class="output">
        <?php
        define("PI", 3.14159); // 宣告常數 PI

        $age = 3;
        $name = "秘密";
        $ename = "Snow";
        echo "我今年 $age 歲";
        echo "<br>";

        echo "圓周率 PI 的值是： " . PI;
        echo "<hr>";

        $name = "小明";
        $age = 20;
        echo "姓名是 " . $name . "，年齡是 " . $age . " 歲";
        echo "<hr>";

        echo "Hello, world!";
        echo "<br>";
        print "Hello again!";
        echo "<br>";

        if ($age >= 18) {
            echo "✅ 已成年";
        } else {
            echo "❗ 未成年";
        }

        echo "<hr>";

        // 變數交換
        $a = 10;
        $b = 50;
        [$a, $b] = [$b, $a]; // 使用解構語法交換變數值

        echo "交換後：a = $a, b = $b";
        ?>
    </div>
</body>

</html>
