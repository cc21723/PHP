<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <title>萬年曆</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Patrick Hand', cursive;
            /* background: url('https://i.pinimg.com/736x/8b/5b/7b/8b5b7b5c564d5f933ffa4e19bdb49230.jpg') no-repeat center center fixed; */
            background: url('https://picsum.photos/1024/768') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            text-align: center;
        }

        .a-style{
            text-decoration: none;
            color: #a55a78;
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        .a-style:hover{
            color: #f78fb3;
        }

        .overlay {
            background-color: rgba(255, 255, 255, 0.6);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .calendar-header {
            font-size: 64px;
            font-weight: bold;
            color: #ba2d65;
        }

        .calendar-sub {
            font-size: 24px;
            margin-top: -10px;
            color: #880e4f;
        }

        .calendar-clock {
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }

        .month-nav {
            margin: 20px 0;
        }

        .month-nav a {
            background: #ba2d65;
            padding: 10px 16px;
            color: white;
            text-decoration: none;
            border-radius: 20px;
            margin: 0 10px;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 4px;
            max-width: 700px;
            background:rgba(255, 255, 255, 0.75);
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
        }

        .day-header,
        .day-box {
            padding: 10px;
            border-radius: 10px;
        }

        .day-header {
            background-color: #f8bbd0;
            color: white;
            font-weight: bold;
        }

        .day-box {
            background-color: #ffe4ec;
            min-height: 80px;
            color: #880e4f;
            font-size: 16px;
            position: relative;
        }

        .today {
            border: 2px solid #ba2d65;
        }

        .holiday {
            background-color: #f06292;
            color: white;
            border-radius: 8px;
            font-size: 12px;
            padding: 2px 6px;
            margin-top: 4px;
            display: inline-block;
        }

        .todo {
            font-size: 12px;
            color: #6a1b4d;
            margin-top: 4px;
        }
    </style>
</head>

<body>
    <div class="overlay">
        <?php
        date_default_timezone_set("Asia/Taipei");

        // 取得年與月
        $year = $_GET['year'] ?? date("Y");
        $month = $_GET['month'] ?? date("m");

        $todayDate = date("Y-m-d");
        // $todayText = date("jS");
        $dayNum = date("j");
        $daySuffix = date("S");
        $nowTime = date("H:i");

        $firstDay = date("$year-$month-01");
        $firstWeekDay = date("w", strtotime($firstDay));
        $daysInMonth = date("t", strtotime($firstDay));

        $prevMonth = $month - 1;
        $nextMonth = $month + 1;
        $prevYear = $year;
        $nextYear = $year;

        if ($prevMonth < 1) {
            $prevMonth = 12;
            $prevYear--;
        }

        if ($nextMonth > 12) {
            $nextMonth = 1;
            $nextYear++;
        }

        // 假日設定
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

        // 代辦事項
        $todoList = [
            "$year-03-28" => "報告截止"
        ];
        ?>

        <div class="calendar-header"><?= $dayNum ?><sup><?= $daySuffix ?></sup></div>
        <div class="calendar-clock"><?= $nowTime ?></div>
        <div class="calendar-sub"><?= date("F Y", strtotime("$year-$month-01")) ?></div>

        <div class="month-nav">
            <a href="?year=<?= $prevYear ?>&month=<?= $prevMonth ?>">⬅ 上個月</a>
            <a href="?year=<?= $nextYear ?>&month=<?= $nextMonth ?>">下個月 ➡</a>
        </div>

        <div class="calendar-grid">
            <?php
            $weekDays = ['日', '一', '二', '三', '四', '五', '六'];
            foreach ($weekDays as $day) {
                echo "<div class='day-header'>$day</div>";
            }

            // 空格填補
            for ($i = 0; $i < $firstWeekDay; $i++) {
                echo "<div class='day-box'></div>";
            }

            for ($day = 1; $day <= $daysInMonth; $day++) {
                $fullDate = date("Y-m-d", strtotime("$year-$month-$day"));
                $isToday = $fullDate == $todayDate ? "today" : "";
                $holidayText = $specialDays[$fullDate] ?? "";
                $todoText = $todoList[$fullDate] ?? "";

                echo "<div class='day-box $isToday'>";
                echo "<div>$day</div>";
                if ($holidayText) {
                    echo "<div class='holiday'>$holidayText</div>";
                }
                if ($todoText) {
                    echo "<div class='todo'>$todoText</div>";
                }
                echo "</div>";
            }
            ?>
        </div>

        <a class="a-style" href="../../index.html">⬅ 返回首頁</a>
    </div>
</body>

</html>