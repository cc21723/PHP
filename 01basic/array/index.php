<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array 陣列</title>
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
            text-align: left;
            color: #333;
        }

        h1,
        h2,
        h3,
        h4 {
            color: #E16B8C;
            margin-top: 1em;
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

        h4 {
            font-size: 30px;
        }

        table {
            border-collapse: collapse;
            margin: 20px auto;
            width: 90%;
            font-size: 18px;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #E16B8C;
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background-color: #ffe4ec;
            color: #E16B8C;
        }

        td {
            background-color: #fffafc;
        }

        @media (max-width: 600px) {
            body {
                font-size: 16px;
            }

            table {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <h1>陣列設計</h1>
    <?php
    $students = [
        "judy" => ["國文" => 95, "英文" => 64, "數學" => 70, "地理" => 90, "歷史" => 84],
        "amo" => ["國文" => 88, "英文" => 78, "數學" => 54, "地理" => 81, "歷史" => 71],
        "john" => ["國文" => 45, "英文" => 60, "數學" => 68, "地理" => 70, "歷史" => 62],
        "peter" => ["國文" => 59, "英文" => 32, "數學" => 77, "地理" => 54, "歷史" => 42],
        "hebe" => ["國文" => 71, "英文" => 62, "數學" => 80, "地理" => 62, "歷史" => 64],
    ];

    foreach ($students as $student => $score) {
        // print_r($student); //印陣列 echo只能印字串
        echo "" . $student . "：";
        echo "<ul style= 'list-style-type:circle'>";
        foreach ($score as $subject => $s) { //對 $score 陣列中的每一對資料，將 key值（科目名稱）存到 $subject，將 值（分數）存到 $s。
            echo "<li>";
            echo $subject . "：";
            echo $s . "";
            echo "</li>";
        }
        echo "</ul>";
    }

    ?>
    <hr>
    <h1>陣列操作練習</h1>
    <h2>建立一個學生成績陣列</h2>
    <h3>設計一個陣列(一維或多維)來存放學生的成績資料</h3>
    <?php
    $class = ["國文", "英文", "數學", "地理", "歷史"];
    $students = ["judy", "amo", "john", "peter", "hebe"];
    $score = [
        [95, 64, 70, 90, 84],
        [88, 78, 54, 81, 71],
        [45, 60, 68, 70, 62],
        [59, 32, 77, 54, 42],
        [71, 62, 80, 62, 64],
    ];

    echo "<table>";
    echo "<tr><th>學生</th>";
    foreach ($class as $subject) {
        echo "<th>{$subject}</th>";
    }
    echo "</tr>";

    foreach ($students as $index => $student) {
        echo "<tr><td>{$student}</td>";
        foreach ($score[$index] as $subjectScore) {
            echo "<td>{$subjectScore}</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>

    <h1>利用程式來產生陣列</h1>
    <ul>
        <li>以迴圈的方式產生一個九九乘法表</li>
        <li>將九九乘法表的每個項目以字串型式存入陣列中</li>
        <li>再以迴圈方式將陣列內容印出</li>
    </ul>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th colspan="9">九九乘法表</th>
        </tr>
        <?php
        $gugu = [];
        for ($i = 1; $i <= 9; $i++) {
            for ($j = 1; $j <= 9; $j++) {
                $gugu[$i][] = "$i × $j = " . ($i * $j); //每列一組 把東西放到陣列中
            }
        }

        // 用迴圈方式將陣列內容印出成表格
        foreach ($gugu as $row) {
            echo "<tr>";
            foreach ($row as $item) {
                echo "<td>$item</td>";
            }
            echo "</tr>";
        }

        //印出所有陣列內容
        // echo "<pre>";
        // print_r($array);
        // echo "</pre>";
        ?>
    </table>

    <?php
    // $array2 = [];
    
    // for ($i = 1; $i < 10; $i++) {
    //     for ($j = 1; $j < 10; $j++) {
    //         $result = "$i x $j =" . ($i * $j);
    //         $array2[$i . $j] = $result;
    //     }
    // }
    // // 用 foreach 印出所有項目
    // foreach ($array2 as $item => $value) {
    //     echo $item . "=>" . $value ."<br>";
    // }
    // echo $array2[55];
    // ?>

    <h4>🎲 威力彩電腦選號（不重覆號碼，使用 while 迴圈）</h4>
    <ul>
        <li>使用亂數函式 rand($a, $b) 來產生號碼</li>
        <li>將產生的號碼存入陣列中</li>
        <li>每次存入時會先檢查是否重覆</li>
        <li>完成選號後將陣列內容印出</li>
    </ul>
    <?php
    $wu = []; //宣告一個空陣列wu
    
    //當陣列數<6就做下面的事
    while (count($wu) < 6) {
        $num = rand(1, 38); //從1~38找一個數
    
        //檢查陣列中有沒有重複的號碼
        if (!in_array($num, $wu)) {
            $wu[] = $num; //把數字放入陣列
        }
    }
    // print_r ($wu);
    
    foreach ($wu as $item) {
        echo "&nbsp" . $item . "&nbsp";
    }
    //echo implode(", ", $wu); //implode() 是一個 將陣列元素合併成一個字串 的函數
    echo "<br>";

    $nums = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38];
    $lotto = [];

    while (count($lotto) < 6) {

        shuffle($nums); //打亂1~38
        $lotto[] = array_pop($nums); // 從尾端取出 1 個數字
    }
    sort($lotto); // 從小到大排序
    echo "中獎號碼：" . implode(", ", $lotto);
    echo "<br>";

    ?>

    <h1>找出五百年內的閏年</h1>
    <ul>
        <li>請依照閏年公式找出五百年內的閏年</li>
        <li>使用陣列來儲存閏年</li>
        <li>使用迴圈來印出閏年</li>
    </ul>

    <?php
    $year = [];
    for ($i = 2025; $i <= 2525; $i++) {
        if (($i % 4 == 0 && $i % 100 != 0) || ($i % 400 == 0)) {
            $year[$i] = true;
        } else {
            $year[$i] = false;
        }
    }
    echo "<br>";
    $ty = 2168;
    // if ($year[$ty]) {
    //     echo $ty . "是閏年";
    // } else {
    //     echo $ty . "不是閏年";
    // }
    echo $ty . ($year[$ty] ? "是閏年" : "不是閏年") . "<br>";
    ?>

    <h1>已知西元1024年為甲子年，請設計一支程式，可以接受任一西元年份，輸出對應的天干地支的年別。(利用迴圈)</h1>
    <ul>
        <li>天干：甲乙丙丁戊己庚辛壬癸</li>
        <li>地支：子丑寅卯辰巳午未申酉戌亥</li>
        <li>天干地支配對：甲子、乙丑、丙寅….甲戌、乙亥、丙子….</li>
    </ul>
    <?php
    $year = 2025;
    $d = []; //配對結果
    $s = ["甲", "乙", "丙", "丁", "戊", "己", "庚", "辛", "壬", "癸"];
    $e = ["子", "丑", "寅", "卯", "辰", "巳", "午", "未", "申", "酉", "戌", "亥"];

    $startYear = 1024; //甲子年第一年
    
    for ($j = 0; $j < 3000; $j++) {
        // 將 $startYear + $j 作為索引，將對應的天干地支組合存入 $d 陣列
        // $j % 10 代表計算天干的索引（循環 10 個天干）
        // $j % 12 代表計算地支的索引（循環 12 個地支）
        $d[$startYear + $j] = $s[$j % 10] . $e[$j % 12];
    }

    echo "西元" . $year . "年是" . $d[$year] . "<br>";

    //不把一堆資料放陣列的情況下去計算
    $d = [];
    for ($j = 0; $j < 60; $j++) {
        $d[] = $s[$j % 10] . $e[$j % 12];
    }
    // echo "<pre>";
    // print_r($d);
    // echo "</pre>";
    
    $yy = 2126;
    //$d[($yy - 4) % 60] 一甲子是60年 循環是差4 取餘數去配對0~59
    echo "西元" . $yy . "是" . $d[($yy - 4) % 60] . "年";
    ?>

    <h1>請設計一支程式，在不產生新陣列的狀況下，<br>將一個陣列的元素順序反轉(利用迴圈)</h1>
    <ul>
        <li>例：$a=[2,4,6,1,8] 反轉後 $a=[8,1,6,4,2]</li>
    </ul>
    <?php
    $a = [2,4,6,1,8];

    echo "<pre>";
    print_r($a);
    echo "</pre>";

    //利用迴圈反轉
    // count($a); //計算陣列個數
    // floor取陣列要交換的次數，取整數
    for ($i = 0; $i < floor(count($a)/2); $i++) {
        $temp=$a[$i];
        $a[$i]=$a[count($a)-1-$i];
        $a[count($a)-1-$i] = $temp;
    }

    echo "<pre>";
    print_r($a);
    echo "</pre>";

    echo "<pre>";
    echo "使用array_reverse反轉陣列";
    print_r(array_reverse($a)); //直接將陣列反轉    
    echo "</pre>";
    ?>



</body>

</html>