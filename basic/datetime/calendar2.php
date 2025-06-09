<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>月曆製作</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Patrick Hand', cursive;
            background-color: #fff0f5;
            /* 淺粉背景 */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 960px;
            background-color: #fff;
            border-radius: 16px;
            padding: 40px 30px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            border: 4px dashed #E16B8C;
            text-align: left;
        }

        /* 標題區 */
        h1 {
            color: #E16B8C;
            font-size: 2.5em;
            margin-bottom: 30px;
            text-align: center;
        }

        h2 {
            color: #8a3e5c;
            font-size: 1.8em;
            margin: 30px 0 15px;
            border-left: 6px solid #E16B8C;
            padding-left: 12px;
        }

        /* 分隔線 */
        hr {
            border: none;
            border-top: 2px dashed #E16B8C;
            margin: 40px 0;
        }

        /* 月曆容器 */
        .box-container {
            width: 500px;
            /* 7格 * 70px 含邊框 */
            margin: 0 auto;
            /* margin: 0 auto 30px; */
            /* background-color: #fdf6f0;
            border: 2px solid #f4a7b9; */
            /* border-radius: 12px; */
            /* padding: 5px; */
            /* box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.05); */
        }

        /* 日期格子樣式 */
        .box {
            /*確保 .box 和 .week-header 的寬度一致，才會對齊。*/
            width: 70px;
            height: 70px;
            background-color: #fff;
            display: inline-block;
            border: 1px solid #f2cbd0;
            text-align: center;
            line-height: 70px;
            /*讓文字垂直置中 */
            font-family: 'Patrick Hand', cursive;
            color: #444;
            margin-left: -1px;
            margin-top: -1px;
            transition: background-color 0.3s, transform 0.2s;
            border-radius: 6px;
        }

        .box:hover {
            background-color: #fcebf1;
            transform: scale(1.05);
            cursor: pointer;
        }

        /* 月曆標題列 */
        .th-box {
            width: 70px;
            height: 40px;
            background-color: #f4a7b9;
            color: white;
            font-weight: bold;
            line-height: 30px;
            font-size: 18px;
            display: inline-block;
            text-align: center;
            border-radius: 6px 6px 0 0;
            border: 1px solid #f2cbd0;
            margin-left: -1px;
            margin-top: -1px;
            padding-top: 5px;
            border-radius: 6px;

        }
    </style>
</head>

<body>
    <div class="container">
        <h2>月曆製作</h2>

        <?php

        //設定月份
        $month = 6;

        //取得今天日期
        $today = date("Y-$month-d");

        //取得當月第一天
        $firstDay = date("Y-$month-01");

        //取得第一天是星期幾 （0=日, 1=一,...,6=六）
        $firstDayWeek = date("w", strtotime($firstDay));

        //取得該月總共有幾天
        $theDaysOfMonth = date("t", strtotime($firstDay));

        // 特殊日（假日或紀念日）設定：格式為 'Y-m-d' => '說明'
        $specialDays = [
            "2025-05-01" => "勞動節放假 🎉",
            "2025-05-11" => "母親節",
            "2025-05-30" => "端午節放假"
        ];
        // 建立一個陣列來儲存整個月的日曆格子
        $monthDays = [];

        //根據該月第一天是星期幾，先補上對應數量的空白格子（用於讓1號對齊正確星期）
        for ($i = 0; $i < $firstDayWeek; $i++) {
            $monthDays[] = "&nbsp;"; // 加入空白佔位
        }

        // 加入該月的每一天數字（從 01 到該月最後一天）
        for ($i = 0; $i < $theDaysOfMonth; $i++) {
            // 利用 strtotime 加上天數偏移，取得每一天的時間戳
            $timestamp = strtotime(" $i days", strtotime($firstDay));
            // 將時間戳格式化成 "日"（兩位數）
            $date = date("d", $timestamp);
            // 加入陣列
            $monthDays[] = $date;
        }

        //建立日曆外框及星期標題列
        echo "<div class='box-container'>";
        echo "<div class='th-box'>日</div>";
        echo "<div class='th-box'>一</div>";
        echo "<div class='th-box'>二</div>";
        echo "<div class='th-box'>三</div>";
        echo "<div class='th-box'>四</div>";
        echo "<div class='th-box'>五</div>";
        echo "<div class='th-box'>六</div>";


        //使用foreach迴圈印出日期
        foreach ($monthDays as $day) {
            echo "<div class='box'>";
            echo $day;
            echo "</div>";
        }
        echo "</div>";

        ?>
        <h2><?= date(" Y 年 $month 月") ?></h2>


        <hr>


    </div>
</body>

</html>