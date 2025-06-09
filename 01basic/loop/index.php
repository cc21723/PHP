<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loop 迴圈</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap');

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
            font-size: 20px;
        }

        h2,
        h3,
        h5 {
            color: #E16B8C;
            /* font-size: 1.8em; */
            margin-top: 40px;
        }

        ul {
            list-style: none;
            padding-left: 1em;
        }

        li::before {
            content: "🍭 ";
            margin-right: 6px;
        }

        table {
            border-collapse: collapse;
            margin: 20px auto;
            font-size: 16px;
            width: 100%;
            max-width: 900px;
        }

        th,
        td {
            border: 1px solid #555;
            padding: 10px 15px;
            text-align: center;
        }

        /* th .ans::before {
            content: "✨ ";
        } */

        th {
            background-color: #f9dce3;
        }

        td {
            background-color: #fff;
        }

        h1 {
            text-align: center;
            color: #E16B8C;
            /* font-size: 2.5em; */
            margin-bottom: 30px;
        }

        
        @media (max-width: 600px) {
            h1 {
                /* font-size: 2em; */
            }
        }
    </style>
</head>

<body>
    <h1>🎀 Loop 迴圈學習</h1>

    <h2>📈 使用 for 迴圈產生以下數列</h2>
    <ul>
        <li>1,3,5,7,9……n</li>
        <li>10,20,30,40,50,60……n</li>
        <li>3,5,7,11,13,17……97</li>
    </ul>
    <?php
    // 1. 印出 1, 3, 5, ..., 19
    for ($i = 1; $i <= 20; $i += 2) {
        echo $i . ",";
    }

    echo "<br>";

    // 2. 印出 10, 20, ..., 90
    for ($i = 1; $i < 10; $i++) {
        echo $i * 10 . ",";
    }

    // 3. 印出 10, 20, ..., 100
    for ($x = 10; $x <= 100; $x += 10) {
        echo $x . ",";
    }
    echo "<br>";

    // 4. 找出 3 ~ 100 的奇數質數
    for ($j = 3; $j <= 100; $j += 2) {
        $test = true;
        for ($i = 2; $i < $j; $i++) {
            if ($j % $i == 0) {
                $test = false;
                break;
            }
        }
        if ($test) {
            echo $j . ",";
        }
    }
    ?>

    <h2>📊 九九乘法表</h2>
    <h3>🧮 表格排列</h3>
    <table>
        <?php
        for ($i = 1; $i <= 9; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= 9; $j++) {
                echo "<td>$j x $i = " . ($i * $j) . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>

    <h3>🌸 交叉結果呈現</h3>
    <table>
        <?php
        echo "<tr><th></th>";
        for ($i = 1; $i <= 9; $i++) {
            echo "<th>$i</th>";
        }
        echo "</tr>";
        for ($i = 1; $i <= 9; $i++) {
            echo "<tr>";
            echo "<th>$i</th>";
            for ($j = 1; $j <= 9; $j++) {
                echo "<td>" . ($i * $j) . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>

    <h3>📐 斜角九九乘法表</h3>
    <table>
        <?php
        echo "<tr><th></th>";
        for ($i = 1; $i <= 9; $i++) {
            echo "<th>$i</th>";
        }
        echo "</tr>";
        for ($i = 1; $i <= 9; $i++) {
            echo "<tr>";
            echo "<th>$i</th>";
            for ($j = 1; $j <= 9; $j++) {
                if ($i >= $j) { //$i >= $j顯示左下 $i<=$j 顯示右上
                    echo "<td>" . ($i * $j) . "</td>";
                } else {
                    echo "<td></td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>

    <h2>📈 使用 while 迴圈尋找字元</h2>
    <h3>找英文字</h3>
    <?php
        $string = "Today is sunny day.";
        $target = "e";  //要找的字
        $is_find=false; //找到沒
        $counter = 0;   //第幾個位置
        while ($is_find==false && $counter <strlen($string)) { //當還沒找到字且字串長度還沒到
            if($string[$counter] == $target){
                $is_find = true;
            }
            $counter++;
        }
        if($is_find){
            echo "目標字元".$target."在字串的第".$counter."個位置";
        }else{
            echo "字串：".$string."<br>";
            echo "字串中沒有你要找的".$target."字元";
        }
    ?>

    <h3>找中文單字</h3>
    <?php
        $string = "今天是個適合出遊的日子";
        $target = "個";  //要找的字
        $is_find=false; //找到沒
        $counter = 0;   //第幾個位置
        while ($is_find==false && $counter <mb_strlen($string)) { //當還沒找到字且字串長度還沒到
            if(mb_substr($string,$counter,1) == $target){
                $is_find = true;
            }
            $counter++;
        }
        if($is_find){
            echo $string."<br>";
            echo "目標字元".$target."在字串的第".$counter."個位置";
        }else{
            echo "字串：".$string."<br>";
            echo "字串中沒有你要找的".$target."字元";
        }
    ?>

    <h3>找中文詞</h3>
    <?php
        $string = "今天是個適合出遊的日子";
        $target = "出遊";  //要找的字
        $is_find=false; //找到沒
        $counter = 0;   //第幾個位置
        while ($is_find==false && $counter <mb_strlen($string)) { //當還沒找到字且字串長度還沒到
            if(mb_substr($string,$counter,2) == $target){
                //mb_substr($string,$counter,2)  從第 $counter 個字（index=4）開始，取 2 個字 → 出遊
                $is_find = true;
            }
            $counter++;
        }
        if($is_find){
            echo $string."<br>";
            echo mb_substr($string, $counter-1, 2)."在字串的第".$counter."個位置";
            
        }else{
            echo "字串：".$string."<br>";
            echo "字串中沒有你要找的".$target."字元";
        }
    ?>
</body>

</html>