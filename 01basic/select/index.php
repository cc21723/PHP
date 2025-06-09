<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>選擇結構</title>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 3% auto;
            padding: 30px 20px;
            font-family: 'Patrick Hand', cursive;
            background-color: #fff0f5;
            width: 90%;
            max-width: 1024px;
            border-radius: 16px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border: 4px dashed #E16B8C;
            color: #333;
        }

        h1, h2, h3 {
            color: #E16B8C;
        }

        h1::before {
            content: "📘 ";
        }

        h2::before {
            content: "📋 ";
        }

        h3::before {
            content: "✏️ ";
        }

        ul {
            background-color: #fff;
            padding: 15px 25px;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            border-left: 4px solid #E16B8C;
        }

        span.ok {
            color: green;
            font-weight: bold;
        }

        span.error {
            color: red;
            font-weight: bold;
        }

        hr {
            border: 0;
            border-top: 2px dashed #E16B8C;
            margin: 30px 0;
        }

        @media (max-width: 600px) {
            body {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <h1>流程結構練習</h1>

    <h2>判斷成績及格學生</h2>
    <h3>給定一個成績數字，判斷是否及格(60分)</h3>
    <?php
    $score = "99";

    if (!is_numeric($score) || $score > 100 || $score < 0) {
        echo "<span class='error'>錯誤：請輸入合法的成績數字</span><br>";
    } else {
        echo "你的成績是 {$score} 分<br>";
        echo "判定結果：";

        if ($score >= 60 && $score <= 100) {
            echo "<span class='ok'>及格</span>";
        } else {
            echo "<span class='error'>不及格</span>";
        }
    }

    echo "<br><hr><br>";

    $level = ($score >= 60) ? '判定結果：及格' : '判定結果：不及格';
    echo $level;
    ?>

    <hr>

    <h2>分配成績等級</h2>
    <h3>給定一個成績數字，根據成績所在的區間，給定等級</h3>
    <ul>
        <li>0 ~ 59 => E</li>
        <li>60 ~ 69 => D</li>
        <li>70 ~ 79 => C</li>
        <li>80 ~ 89 => B</li>
        <li>90 ~ 100 => A</li>
    </ul>

    <?php
    $level = '';
    if (!is_numeric($score) || $score > 100 || $score < 0) {
        echo "<span class='error'>錯誤：請輸入合法的成績數字</span><br>";
    } else {
        echo "成績為 {$score} 分<br>";

        if ($score >= 90) {
            $level = 'A';
        } else if ($score >= 80) {
            $level = 'B';
        } else if ($score >= 70) {
            $level = 'C';
        } else if ($score >= 60) {
            $level = 'D';
        } else {
            $level = 'E';
        }

        echo "等級為：<strong>{$level}</strong>";
    }
    ?>

    <hr>

    <h2>依據學生成績等級給予評價</h2>
    <h3>根據學生不同的成績等級在網頁上印出不同的文字評價</h3>
    <br>
    <?php
    switch ($level) {
        case "A":
            echo "🌟 表現優良，請繼續保持！";
            break;
        case "B":
            echo "👍 值得肯定，還有進步空間～";
            break;
        case "C":
            echo "💡 需要更多的練習～加油！";
            break;
        case "D":
            echo "📚 需要加強基本功喔～";
            break;
        case "E":
            echo "😢 是否無心學業？要努力囉！";
            break;
        default:
            echo "<span class='error'>格式錯誤</span>";
    }
    ?>

    <br>
    <hr>

    <h2>閏年判斷</h2>
    <h3>給定一個西元年份，判斷是否為閏年</h3>
    <ul>
        <li>地球對太陽的公轉一年約為365天5小時48分46秒，每隔四年設置一個閏年以補足多出來的時間。</li>
        <li>年份除以4不可整除為平年</li>
        <li>除以4可整除但除以100不可整除為閏年</li>
        <li>除以100可整除但除以400不可整除為平年</li>
    </ul>

    <?php
    $year = 2204;

    if ($year <= 0) {
        echo "<span class='error'>格式錯誤</span>";
    } else {
        $result = ($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0)) ? "🌸 閏年" : "☀️ 平年";
        echo "{$year} 年是 {$result}";
    }
    ?>
</body>

</html>
