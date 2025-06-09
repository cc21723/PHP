<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Patrick Hand', cursive;
            background-color: #fff0f5;
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

        a{
            text-decoration: none;
            color: #a55a78;
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        a:hover{
            color: #f78fb3;
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
            margin: 0 auto;
            padding-left: 1px;
            padding-top: 1px;
        }

        /* 星期標題 */
        .th-box {
            width: 70px;
            height: 30px;
            background-color: #f8bbd0;
            color: #fff;
            font-weight: bold;
            text-align: center;
            line-height: 30px;
            display: inline-block;
            border: 1px solid #f48fb1;
            margin-left: -1px;
            margin-top: -1px;
        }

        /* 日期格子樣式 */
        .box {
            width: 70px;
            height: 70px;
            background-color: #ffe4ec;
            display: inline-block;
            border: 1px solid #f2cbd0;
            margin-left: -1px;
            margin-top: -1px;
            vertical-align: top;
            transition: transform 0.2s, background-color 0.3s;
            position: relative;
        }

        .box:hover {
            background-color: #fcebf1;
            transform: scale(1.05);
            cursor: pointer;
        }

        /* 日期與週次資訊 */
        .day-info {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
            padding: 6px;
            font-size: 12px;
        }

        .day-num {
            font-size: 16px;
            color: #d81b60;
            font-weight: bold;
        }

        .day-week {
            font-size: 10px;
            color: #999;
            text-align: right;
        }

        .holiday-info {
            font-size: 10px;
            color: #fff;
            background-color: #ba2d65;
            text-align: center;
            margin-top: 4px;
            border-radius: 15px;
        }

        /* 上下月份切換按鈕 */
        .month-nav {
            display: flex;
            width: 60%;
            margin: 20px auto;
            justify-content: space-between;
        }

        .month-nav a {
            background-color: #ff80ab;
            color: white;
            padding: 8px 16px;
            border-radius: 12px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .month-nav a:hover {
            background-color: #ec407a;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>萬年曆製作</h2>

        <?php
        //取得月份
        if (isset($_GET['month'])) {
            $month = $_GET['month'];
        } else {
            $month = date("m");
        }

        if (isset($_GET['year'])) {
            $year = $_GET['year'];
        } else {
            $year = date("Y");
        }


        // 調整月份與年份的合法範圍
        $prevMonth = $month - 1;
        $nextMonth = $month + 1;
        $prevYear = $year;
        $nextYear = $year;

        //上一個月
        if ($prevMonth < 1) {
            $prevMonth = 12;
            $prevYear = $year - 1;
        }

        //下一個月
        if ($nextMonth > 12) {
            $nextMonth = 1;
            $nextYear = $year + 1;
        }

        //取得今天日期
        $today = date("$year-$month-d");

        //取得當月第一天
        $firstDay = date("$year-$month-01");

        //取得第一天是星期幾 （0=日, 1=一,...,6=六）
        $firstDayWeek = date("w", strtotime($firstDay));

        //取得該月總共有幾天
        $theDaysOfMonth = date("t", strtotime($firstDay));

        // 特殊日（假日或紀念日）設定：格式為 'Y-m-d' => '說明'
        $specialDays = [
            "$year-01-01" => "元旦",
            "$year-01-28" => "除夕",
            "$year-01-29" => "春節初一",
            "$year-01-30" => "春節初二",
            "$year-01-31" => "春節初三",
            "$year-02-01" => "春節初四",
            "$year-02-02" => "春節初五",
            "$year-02-28" => "和平紀念日",
            "$year-04-04" => "兒童節",
            "$year-04-05" => "清明節",
            "$year-05-01" => "勞動節放假",
            "$year-05-11" => "母親節", // 第二個星期日
            "$year-05-31" => "端午節",
            "$year-06-06" => "生日", // 自訂
            "$year-08-08" => "父親節",
            "$year-09-28" => "教師節",
            "$year-10-06" => "中秋節", // 2025年中秋節
            "$year-10-10" => "國慶日",
            "$year-10-25" => "台灣光復節",
            "$year-12-25" => "行憲紀念日"
        ];

        $todoList = ['2025-05-06' => '開會'];

        // 建立一個陣列來儲存整個月的日曆格子
        $monthDays = [];
        ?>

        <h2><?= date(" $year 年 $month 月") ?></h2>

        <?php
        //根據該月第一天是星期幾，先補上對應數量的空白格子（用於讓1號對齊正確星期）
        for ($i = 0; $i < $firstDayWeek; $i++) {
            $monthDays[] = []; // 加入空白佔位
        }

        // 加入該月的每一天數字（從 01 到該月最後一天）
        for ($i = 0; $i < $theDaysOfMonth; $i++) {
            // 利用 strtotime 加上天數偏移，取得每一天的時間戳
            $timestamp = strtotime(" $i days", strtotime($firstDay));
            // 將時間戳格式化成 "日"（兩位數）
            $date = date("d", $timestamp);
            $holiday = [];// ← 每一天都要重新設定
            foreach ($specialDays as $d => $value) {
                if ($d == date("Y-m-d", $timestamp)) {
                    $holiday[] = $value;
                }
            }

            //todoList
            $todo = '';
            foreach ($todoList as $d => $value) {
                if ($d == date("Y-m-d", $timestamp)) {
                    $todo = $value;
                }
            }

            // 加入陣列
            $monthDays[] = [
                "day" => date("d", $timestamp),
                "fullDate" => date("Y-m-d", $timestamp),
                "weekOfYear" => date("W", $timestamp),
                "week" => date("w", $timestamp),
                "daysOfYear" => date("z", $timestamp),
                "workday" => date("N", $timestamp) < 6 ? true : false,
                "holiday" => $holiday,
                "todo" => $todo
            ];
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
            echo "<div class='day-info'>";

            echo "<div class='day-num'>";
            if (isset(($day['day']))) {
                echo $day['day'];
            } else {
                echo "&nbsp;";
            }
            echo "</div>";

            echo "<div class='day-week'>";
            if (isset($day['weekOfYear'])) {
                echo $day['weekOfYear'];
            } else {
                echo "&nbsp;";
            }
            echo "</div>";

            echo "<div class='holiday-info'>";
            if (isset($day) && isset($day['holiday'])) {
                foreach ($day['holiday'] as $value) {
                    echo $value . "<br>";
                }
            }

            echo "</div>";

            echo "<div class='todo-info'>";
            if (isset($day['todo']) && !empty($day['todo'])) {

                echo "<div class='todo'>";
                echo $day['todo'];
                echo "</div>";
            }

            echo "</div>";// end of todo-info
            echo "</div>"; // end of day-info
            echo "</div>"; // end of box
        }

        ?>

        <!-- 製作按鈕 上一個月下一個月 -->
        <div class="month-nav">
            <!-- href = "?" 在當前頁 -->
            <!-- month= $prev; 網址的值 -->
            <a href="?year=<?= $prevYear; ?>&month=<?= $prevMonth; ?>">⬅ 上一個月</a>
            <a href="?year=<?= $nextYear; ?>&month=<?= $nextMonth; ?>">下一個月 ➡</a>
        </div>

        <a href="../index.php">⬅ 返回首頁</a>
    </div>
</body>

</html>