<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>線上月曆製作</title>
    <style>
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
            /* max-width: 960px; */
            background-color: #fff;
            border-radius: 16px;
            padding: 40px 30px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border: 4px dashed #E16B8C;
            text-align: left;
        }

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

        ul,
        ol {
            padding-left: 20px;
            margin: 15px 0 25px;
        }

        ul li,
        ol li {
            background-color: #ffe0eb;
            padding: 10px 15px;
            margin-bottom: 10px;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }

        ul li:hover,
        ol li:hover {
            background-color: #fcd1e2;
        }

        hr {
            border: none;
            border-top: 2px dashed #E16B8C;
            margin: 40px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            background-color: #fff;
            border: 2px solid #E16B8C;
            border-radius: 8px;
            overflow: hidden;
        }

        th {
            background-color: #FADADD;
            /* 淡粉紅 */
            color: #E16B8C;
            padding: 10px;
            font-size: 24px;
            text-align: center;
        }

        td {
            border: 1px solid #f2cbd0;
            text-align: center;
            /* font-size: 20px; */
            height: 80px;
            width: 14.2%;
            padding: 0 10px;
            transition: background-color 0.3s ease;
        }

        .today {
            background-color: #a4d4ff;
            font-weight: bold;
            color: #004080;
            border: 2px solid #004080;
        }

        .holiday {
            background-color: #ffe1e1;
            color: #d00;
            font-weight: bold;
        }

        .other-month {
            background-color: #f0f0f0;
            color: #bbb;
        }

        td:hover {
            background-color: lightblue;
            /* 滑鼠指標變手 */
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;

        }

        .pass-date {
            color: #bbb;
        }
        .date-num{
            font-size: 14px;
            text-align: left;
        }
        .data-event{
            height: 40px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>線上月曆製作</h2>
        <ul>
            <li>以表格方式呈現整個月份的日期</li>
            <li>可以在特殊日期中顯示資訊(假日或紀念日)</li>
            <li>嘗試以block box或flex box的方式製作月曆</li>
        </ul>
        <?php
        //1.要先知道當月第一天是星期幾 $w = date("w",strtotime($date));
        //2.要知道當月有幾天 $days = date("t",strtotime($date));
        //3.要知道當月有幾週
        
        $today = date("Y-m-d");
        //取得當月第一天
        $firstDay = date("Y-m-01");

        //取得第一天是星期幾 （0=日, 1=一,...,6=六）
        $firstDayWeek = date("w", strtotime($firstDay));

        //取得本月天數
        $theDaysOfMonth = date("t", strtotime($firstDay));

        // 特殊日（假日或紀念日）設定：格式為 'Y-m-d' => '說明'
        // $specialDays = [
        //     "$year-$month-01" => "勞動節放假 🎉",
        //     "$year-$month-12" => "紀念日",
        //     "$year-$month-30" => "端午節放假"
        // ];
        $specialDays = [
            "2025-05-01" => "勞動節放假 🎉",
            "2025-05-11" => "母親節",
            "2025-05-30" => "端午節放假"
        ];

        ?>
        <!-- 4.畫月曆 -->
        <h2><?= date(" Y 年 m 月") ?></h2>
        <table class="calendar">
            <tr>
                <th>日</th>
                <th>一</th>
                <th>二</th>
                <th>三</th>
                <th>四</th>
                <th>五</th>
                <th>六</th>
            </tr>
            <?php
            //畫週數 如果i< $theDaysOfMonth(總天數)/7 就跳出來
            //只有日期
            /*for ($i = 0; $i < $theDaysOfMonth/7; $i++) {
                echo "<tr>";
            
                for ($j = 0; $j < 7; $j++) {
                    //只有當月日期
                    $day = $j + 1 + ($i * 7) - $firstDayWeek;                    
                    echo "<td>";
            
                    if ($day > 0 && $day <= $theDaysOfMonth){
                        echo $day;                             
                    }
                    echo "</td>";
                }
                echo "</tr>";
            }*/

            //整個6週 (前後月份日期)
            /*for ($i = 0; $i < 6; $i++) {
            //     echo "<tr>";
            //     for ($j = 0; $j < 7; $j++) {
            //         $day = $j  + ($i * 7) - $firstDayWeek;
            //         $date = date("Y-m-d",strtotime("$day days",strtotime($firstDay)));
            //         echo "<td>";
            //         echo $date;
            //         echo "</td>";
            //     }
            //     echo "</tr>";
            // }*/


            // //顯示今天
            for ($i = 0; $i < $theDaysOfMonth / 7; $i++) {
                echo "<tr>";
                //用 $j 控制每一週的七天（0=日～6=六）
                for ($j = 0; $j < 7; $j++) {
                    //只有當月日期
                    //計算當前格子代表的是幾號
                    $day = $j + ($i * 7) - $firstDayWeek; //減掉 $firstDayWeek 是為了讓 1 號從正確的星期幾開始
                    // 以 $firstDay 為基準，加上 $day 天，取得對應的時間戳記
                    $timestamp = strtotime(" $day days", strtotime($firstDay));
                    // 把時間戳記轉為日期字串（例如 2025-05-03）
                    $date = date("Y-m-d", $timestamp);
                    $class = "";
                    //假日是紅色
                    // date("N")：取得星期幾（1=一, ..., 7=日），>5 表示週六日
                    // 加上 holiday 樣式類別
                    if (date("N", $timestamp) > 5) {
                        $class = $class . " holiday ";
                    }
                    //今天以前是灰色
                    if ($timestamp < strtotime($today)) {
                        $class = $class . "pass-date";
                    }
                    //今天是藍色
                    if ($today == $date) {
                        $class = $class . " today";
                        // echo "<td class='today'>";

                        //其他月份
                    } else if (date("m", $timestamp) != date("m", strtotime($firstDay))) {
                        // echo "<td class='other-month'>";
                        $class = $class . " other-month";
                    }
                    /*echo "<td class='$class'>";
                    echo date("d", $timestamp);
                    echo "</td>";*/

                    echo "<td class='$class' data-date='$date'>";
                    echo "<div class='date-num'>";
                    echo date("d", $timestamp);
                    echo "</div>";
                    echo "<div class='data-event'>";
                    // if(array_key_exists($date, $specialDays)){
                    //     $title = array_key_exists($date, $specialDays) ? "title='{$specialDays[$date]}'" : "";
                        
                    //     echo "<div class='$class  holiday ' $title>$specialDays[$date]</div>";
                        
                    // }

                    //isset變數檢查函式
                    //檢查陣列 $specialDays 中是否有 key 為 $date 的元素（也就是這一天是不是有特別事件）
                    if(isset($specialDays[$date])){
                        // echo $specialDays[$date];
                        $title = 'title="' . $specialDays[$date] . '"';
                        echo "<div class='$class  holiday ' $title>$specialDays[$date]</div>";
                    }
                    echo "</div>";
                    echo "</td>";

                }
                echo "</tr>";
            }
             ?>
        </table>
        <?php


        //月曆最多6週最少4週
        

        // 設定要顯示的月份
        // $year = date("Y");
        // $month = date("m");
        // $date = "$year-$month-01"; // 設定當月的第一天
        
        // // 計算當月的天數
        // $days = date("t", strtotime($date));
        
        // // 計算當月的第一天是星期幾(0=日, 6=六)
        // $firstDayOfWeek = date("w", strtotime($date));
        
        // // 特殊日（假日或紀念日）設定：格式為 'Y-m-d' => '說明'
        // $specialDays = [
        //     "$year-$month-01" => "勞動節放假 🎉",
        //     "$year-$month-12" => "紀念日",
        //     "$year-$month-30" => "端午節放假"
        // ];
        
        // $weeks = ceil(($days + $firstDayOfWeek) / 7); // 計算當月的週數
        
        // // 今日日期
        // $today = date("Y-m-d");
        
        // echo "<h2>月份：$year 年 $month 月</h2>";
        // echo "<div class='calendar'>";
        
        // // 星期標題列
        
        // $weekdays = ['日', '一', '二', '三', '四', '五', '六'];
        // foreach ($weekdays as $day) {
        //     echo "<div class='day header'>$day</div>";
        // }
        
        // // 前面空格
        // for ($i = 0; $i < $firstDayOfWeek; $i++) {
        //     echo "<div class='empty'></div>";
        // }
        
        // // 日期格子
        // for ($d = 1; $d <= $days; $d++) {
        //     $currentDate = sprintf("%s-%02d", "$year-$month", $d);
        //     $class = 'day';
        
        //     if (array_key_exists($currentDate, $specialDays)) {
        //         $class .= ' holiday';
        //     } elseif ($currentDate == $today) {
        //         $class .= ' today';
        //     }
        
        //     // 加上 tooltip 顯示說明
        //     $title = array_key_exists($currentDate, $specialDays) ? "title='{$specialDays[$currentDate]}'" : "";
        
        //     echo "<div class='$class' $title>$d</div>";
        // }
        
        // echo "</div>";
        




        ?>
        <hr>


    </div>
</body>

</html>