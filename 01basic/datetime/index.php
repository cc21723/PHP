<!DOCTYPE html>
<?php
// 每 1 秒重新整理頁面
// header("Refresh:1");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>時間及日期處理</title>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">

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
            max-width: 960px;
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


      
    </style>
</head>

<body>
    <!-- 
        date(“Y-m-d”,$time)
        strtotime(“+1 days”,$date_string)
        日期函式參數表
        基本單位是秒
        date_default_timezone_set() - 設置程式執行期間的時區 
    -->
    <div class="container">
        <h1>日期/時間</h1>
        <h2>基本函式使用</h2>
        <?php
        date_default_timezone_set('Asia/Taipei'); //設定時區 亞洲台北
        echo date_default_timezone_get() . "&nbsp";
        echo "台北:" . date("Y-m-d H:i:s"); //取得當前的日期和時間
        echo "<br>";
        date_default_timezone_set('Asia/Tokyo'); //設定時區 亞洲日本
        echo date_default_timezone_get() . "&nbsp&nbsp";
        echo "日本:" . date("Y-m-d H:i:s");
        echo "<br>";
        date_default_timezone_set('Asia/Bangkok'); //設定時區 亞洲曼谷
        echo date_default_timezone_get() . "&nbsp";
        echo "曼谷:" . date("Y-m-d H:i:s");
        echo "<br>";
        date_default_timezone_set('America/New_York'); //設定時區 美國紐約
        echo date_default_timezone_get() . "&nbsp";
        echo "美國:" . date("Y-m-d H:i:s");
        ?>
        <hr>
        <h2>時間戳記</h2>
        <?php
        // 取得目前時間的 timestamp
        $timestamp = time();
        echo "當前的時間戳記：$timestamp<br>";

        // 將 timestamp 轉成日期字串（模擬從資料庫或輸入取得的時間戳記）
        $dataString = date("Y-m-d H:i:s", $timestamp);
        ;
        // 將日期字串再轉回 timestamp
        $timestampFromString = strtotime($dataString);
        echo "字串轉換成為時間戳記：$timestampFromString<br>";

        // 將時間戳記轉換為格式化的日期字串
        $dateFormTimestamp = date("Y-m-d H:i:s", $timestamp);
        echo "時間戳記轉換為日期字串：$dateFormTimestamp<br>";


        ?>
        <hr>
        <h1>日期函式應用練習</h1>
        <h2>給定兩個日期，計算中間間隔天數</h2>
        <?php
        $date1 = "2025-05-01";
        $date2 = "2025-05-21";
        echo "日期1：$date1<br>";
        echo "日期2：$date2<br>";

        // 1. 將日期字串轉換為 Unix 時間戳
        $data1_timestamp = strtotime($date1); //將日期字串轉成秒
        $date2_timestamp = strtotime($date2);

        // 2. 計算兩個時間戳之間的差（秒）
        $diff = $date2_timestamp - $data1_timestamp; //計算兩天差
        
        // 3. 換算成天數（1 天 = 86400 秒）
        $days = $diff / (60 * 60 * 24); //將差值轉為天數
        echo "兩個日期相差 $days 天<br>";

        ?>
        <hr>
        <h2>strtotime的用法</h2>
        <?php
        echo "strtotime() 函式可以將日期字串轉換為時間戳記<br>";
        $dateString1 = "2023-10-01 12:00:00"; // 設定日期字串
        $timestamp1 = strtotime($dateString1); // 將字串轉換為時間戳記
        echo "日期字串：$dateString1<br>";
        echo "時間戳記：$timestamp1<br>";

        //strtotime()函式也可以處理相對時間
        $relativeTimes = [
            "now",
            "+1 day",
            "-1 day",
            "+1 week",
            "-1 week",
            "+1 month",
            "-1 month",
            "+1 year",
            "-1 year"
        ];

        foreach ($relativeTimes as $relativeTime) {
            //strototime("+1 days",$timestamp); //將相對時間字串轉換成日期
            $timestamp = strtotime($relativeTime); //將相對時間字串轉換成時間戳記
            echo "相對時間字串：$relativeTime<br>";
            echo "相對時間戳記：$timestamp<br>";
            echo "相對時間的日期：" . date('Y-m-d H:i:s', strtotime($relativeTime)) . "<br>";
        }
        $relativeDateString = "+2 days"; // 設定相對時間字串
        $timestamp2 = strtotime($relativeDateString); // 將相對時間字串轉換為時間戳記
        echo "相對時間字串：$relativeDateString<br>";
        echo "相對時間的時間戳記：$timestamp2<br>";

        $date = "2025-5-01"; // 設定日期字串
        $timestamp3 = strtotime("+15 day", strtotime($date)); // 將日期字串轉換為時間戳記$date); // 將日期字串轉換為時間戳記
        echo "日期字串：$date<br>";
        echo "15天後的日期：" . date("Y-m-d H:i:s", $timestamp3) . "<br><br>";

        ?>
        <hr>
        <h2>計算距離自己下一次生日還有幾天</h2>
        <?php
        // 設定自己的生日（固定的月日）
        $birthday = "11-23"; // MM-DD 格式
        
        // 取得今天的日期與年份
        $today = date("Y-m-d");
        $year = date("Y");

        // 組合今年的生日日期
        $nextBirthday = date("Y-m-d", strtotime("$year-$birthday"));

        // 如果今年生日已過，就改成明年
        if (strtotime($nextBirthday) < strtotime($today)) {
            $nextBirthday = date("Y-m-d", strtotime(($year + 1) . "-$birthday"));
        }

        // 計算剩餘天數
        $daysUntilBirthday = floor((strtotime($nextBirthday) - strtotime($today)) / (60 * 60 * 24));

        // 輸出
        echo "距離下一次生日還有 $daysUntilBirthday 天<br>";
        ?>
        <?php
        $birthday = "1993-11-23"; // 設定自己的生日（完整的日期）
        $birthday_array = explode("-", $birthday); // 將生日字串轉換為陣列
        $birthday_array[0] = date("Y"); // 將年份設為今年
        
        $nextBirthday = join("-", $birthday_array); // 將陣列轉換為字串
        

        $today = strtotime(date("Y-m-d")); // 取得今天的時間戳記
        $birthday_timestamp = strtotime($nextBirthday); // 將生日陣列轉換為時間戳記
        
        if ($today > $birthday_timestamp) {
            // $birthday_array[0] = date("Y") + 1; // 將年份設為明年
            // $nextBirthday = join("-", $birthday_array); // 將陣列轉換為字串
            $birthday_timestamp = strtotime("+1 year", $birthday_timestamp); // 如果今天已經過了生日，則將年份加1
        }

        $birthday_diff = $birthday_timestamp - $today; // 計算生日與今天的時間差
        $days = floor($birthday_diff / (60 * 60 * 24)); // 換算成天數
        echo "我的生日是 $birthday <br>";
        echo "距離下一次生日還有 $days 天<br>";

        ?>
        <hr>
        <h2>利用date()函式的格式化參數，完成以下的日期格式呈現</h2>
        <ul>
            <li>2021/10/05</li>
            <li>10月5日 Tuesday</li>
            <li>2021-10-5 12:9:5</li>
            <li>2021-10-5 12:09:05</li>
            <li>今天是西元2021年10月5日 上班日(或假日)</li>
        </ul>
        <?php
        // 1. 2021/10/05
        $date = "2021-10-05 12:9:5";
        $date1 = date("Y/m/d", strtotime($date));
        echo "日期格式1：$date1<br>";
        // 2. 10月5日 Tuesday
        $date2 = date("m月d日 l", strtotime($date));
        echo "日期格式2：$date2<br>";
        // 3. 2021-10-5 12:9:5
        $timestamp = strtotime($date);
        $year = date("Y", $timestamp);
        $month = date("n", $timestamp);  // 不補零月
        $day = date("j", $timestamp);    // 不補零日
        $hour = date("G", $timestamp);   // 不補零小時（24 小時制）
        $minute = ltrim(date("i", $timestamp), '0'); // 不補零分鐘
        $second = ltrim(date("s", $timestamp), '0'); // 不補零秒
        $date3 = "$year-$month-$day $hour:$minute:$second";
        echo "日期格式3：$date3<br>";
        // 4. 2021-10-5 12:09:05
        $date4 = date("Y-m-d H:i:s", strtotime($date));
        echo "日期格式4：$date4<br>";
        // 5. 今天是西元2021年10月5日 上班日(或假日)
        $date5 = date("今天是西元Y年m月d日", strtotime($date));
        $week = date("w", strtotime($date)); // 取得星期幾
        if ($week == 0 || $week == 6) {
            $date5 .= " 假日";
        } else {
            $date5 .= " 上班日";
        }
        echo "日期格式5：$date5<br>";

        ?>
        <hr>

        <h2>利用迴圈來計算連續五個周一的日期</h2>
        <ol>
            <li>2021-10-04 星期一</li>
            <li>2021-10-11 星期一</li>
            <li>2021-10-18 星期一</li>
            <li>2021-10-25 星期一</li>
            <li>2021-11-01 星期一</li>
        </ol>
        <?php
        // 設定起始的星期一
        $startDate = "2021-10-04";
        for ($i = 0; $i < 5; $i++) {
            // 加上 $i 週（每週 = 7 天）
            $monday = date("Y-m-d", strtotime("+$i week", strtotime($startDate)));
            $weekdayName = "星期" . ["日", "一", "二", "三", "四", "五", "六"][date("w", strtotime($monday))];

            echo "<li>$monday $weekdayName</li>";
        }

        ?>
        <hr>

    </div>

</body>

</html>