<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>迴圈畫星星</title>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #fff0f5;
            font-family: 'Patrick Hand', 'Courier New', monospace;
            color: #333;
            padding: 40px 20px;
            max-width: 1000px;
            margin: auto;
            border: 4px dashed #E16B8C;
            border-radius: 16px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        h2,
        h3 {
            color: #E16B8C;
            margin-top: 30px;
        }

        ul {
            list-style: none;
            padding-left: 1em;
        }

        li::before {
            content: "⭐ ";
            margin-right: 6px;
        }

        .pattern {
            font-family: 'Courier New', monospace;
            line-height: 1.6;
            background-color: #fff;
            padding: 10px 15px;
            border-radius: 8px;
            border: 1px solid #E16B8C;
            display: inline-block;
            min-width: 120px;
            text-align: left;
        }

        .pattern-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 40px;
        }

        .label {
            text-align: center;
            font-size: 14px;
            color: #E16B8C;
            margin-top: 8px;
        }
    </style>
</head>

<body>
    <h2>以 * 符號為基礎在網頁上排列出下列圖形:</h2>
    <ul>
        <li>直角三角型</li>
        <li>倒直角三角型</li>
        <li>正三角型</li>
        <li>正倒三角型</li>
        <li>菱形</li>
        <li>中空矩形</li>
        <li>對角線矩形</li>
        <li>箏型</li>
    </ul>

    <h3>圖形展示（橫向排列）</h3>
    <div class="pattern-row">
        <!-- 直角三角形 -->
        <div>
        <div class="label">直角三角形</div>
            <div class="pattern">
                <?php
                for ($i = 1; $i <= 5; $i++) {
                    for ($j = 1; $j <= $i; $j++) {
                        echo "*";
                    }
                    echo "<br>";
                }
                ?>
            </div>
        </div>

        <!-- 倒直角三角形 -->
        <div>
        <div class="label">倒直角三角形</div>
            <div class="pattern">
                <?php
                for ($i = 5; $i >= 1; $i--) {
                    for ($j = 1; $j <= $i; $j++) {
                        echo "*";
                    }
                    echo "<br>";
                }
                ?>
            </div>
        </div>

        <!-- 正三角形 -->
        <div>
        <div class="label">正三角形</div>
            <div class="pattern">
                <?php
                $stars = 5;
                for ($i = 0; $i < $stars; $i++) {
                    for ($k = 0; $k < $stars - 1 - $i; $k++) {  //*前方增加空白
                        echo "&nbsp;";
                    }
                    for ($j = 0; $j < $i * 2 + 1; $j++) {
                        echo "*";
                    }
                    echo "<br>";
                }
                ?>
            </div>
        </div>

        <!-- 倒正三角形 -->
        <div>
        <div class="label">倒正三角形</div>
            <div class="pattern">
                <?php
                $stars = 5;
                for ($i = $stars - 1; $i >= 0; $i--) {
                    for ($k = 0; $k < $stars - 1 - $i; $k++) {  // 輸出空白：會隨著列數增加
                        echo "&nbsp;";
                    }
                    for ($j = 0; $j < $i * 2 + 1; $j++) { // 輸出空白：會隨著列數增加
                        echo "*";
                    }
                    echo "<br>";
                }
                ?>
            </div>
        </div>

        <!-- 菱形 -->
        <div>
            <div class="label">菱形</div>
            <div class="pattern">
                <?php
                $stars = 5;
                if ($stars % 2 == 0) {
                    echo "您輸入的數為'$stars'需為奇數，因此自動+1<br>";
                    $stars = $stars + 1;
                }
                for ($i = 0; $i < $stars; $i++) { // 外層迴圈：控制列數（0 到 $stars，共 $stars + 1 列）
                    // 取得當前列的對應高度（由上而下遞增，到中間後遞減）
                    if ($i <= floor($stars / 2)) {
                        // 上半部（含中間那一行）：$i 直接當作層數
                        $y = $i;
                    } else {
                        // 下半部：用 $stars-1-$i 得到遞減的層數
                        $y = $stars - 1 - $i;
                    }
                    //印出空白（每層前方要補空格，讓星星置中）
                    for ($j = 0; $j < floor($stars / 2) - $y; $j++) {
                        echo "&nbsp;";
                    }
                    // 印出星號（奇數個星號，隨層數增加，從 1 → 3 → 5…）
                    for ($k = 0; $k < $y * 2 + 1; $k++) {
                        echo "*";
                    }
                    echo "<br>";
                }
                ?>
            </div>
            
        </div>

        <!-- 中空矩形 -->
        <div>
        <div class="label">中空矩形</div>
            <div class="pattern">
                <?php
                $stars = 5;
                for ($i = 0; $i <= $stars; $i++) {
                    for ($j = 0; $j <= $stars; $j++) {
                        if (
                            $i == 0 || $i == $stars || //上下中間
                            $j == 0 || $j == $stars    //頭尾
                        ) {
                            echo "*";
                        } else {
                            echo "&nbsp;";            //其他印空白
                        }
                    }
                    echo "<br>";
                }
                ?>
            </div>
            
        </div>

        <!-- 對角線矩形 -->
        <div>
        <div class="label">對角線矩形</div>
            <div class="pattern">
                <?php
                $stars = 7;
                if ($stars % 2 == 0) {
                    $stars += 1;
                }
                for ($i = 0; $i < $stars; $i++) {
                    for ($j = 0; $j < $stars; $j++) {
                        if (
                            $i == 0 || $i == $stars - 1 ||  //上下
                            $j == 0 || $j == $stars - 1 ||  //左右
                            $i == $j ||                     //左上到右下對角線 
                            $j == $stars - 1 - $i           //右上到左下對角線
                        ) {
                            echo "*";
                        } else {
                            echo "&nbsp;";                  //其他印空白
                        }
                    }
                    echo "<br>";
                }
                ?>
            </div>
            
        </div>

        <!-- 箏型 -->
        <!-- 如果欄位/2 == i 否則印空白-->
        <div>
        <div class="label">箏型</div>
            <div class="pattern">
            <?php
                $stars = 7;
                if ($stars % 2 == 0) {
                    echo "您輸入的數為'$stars'需為奇數，因此自動+1<br>";
                    $stars = $stars + 1;
                }
                for ($i = 0; $i < $stars; $i++) { // 外層迴圈：控制列數（0 到 $stars，共 $stars + 1 列）
                    // 取得當前列的對應高度（由上而下遞增，到中間後遞減）

                    //floor 將數字無條件向下取整數
                    if ($i <= floor($stars / 2)) { // 上半部（含中間那一行）：$i 直接當作層數
                        $y = $i; //$y 就是 $i（逐行加大）
                    } else {// 下半部：用 $stars-1-$i 得到遞減的層數
                        $y = $stars - 1 - $i; //$y 要反過來數，讓它縮小回去
                    }
                    //印出空白（每層前方要補空格，讓星星置中）
                    for ($j = 0; $j < floor($stars / 2) - $y; $j++) {
                        echo "&nbsp;";
                    }
                    for ($k = 0; $k < $y * 2 + 1; $k++) {
                        if(
                            ( $j+ $y + $k ) == floor($stars / 2) ||            // 左邊的線
                            abs($y - ( $k + $j) ) == floor($stars / 2) || // 右邊的線
                            ($k + $j) == floor($stars/2) ||                    // 中間的直線
                            $i == floor($stars/2)                              // 中間的橫線
                            ){
                            echo "*";
                        }else{
                            echo "&nbsp;";
                        }
                    }
                    echo "<br>";
                }
                ?>
            </div>
            
        </div>

    </div>

</body>

</html>