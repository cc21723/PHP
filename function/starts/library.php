 <?php
    function stars($shape, $size)
    {
        // echo '<div class="shape-block">';
        echo "<div class='shape-title'>$shape ($size)</div>";
        echo "<div class='stars'>";

        switch ($shape) {
            case '直角三角形':
                right_triangle($size);
                break;
            case '正三角形':
                triangle($size);
                break;
            case '長方形':
                rectangle($size);
                break;
            default:
                echo "沒有這種東西";
                break;
        }
    }

    //直角三角形
    function right_triangle($size)
    {
        for ($i = 1; $i <= 5; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                echo "*";
            }
            echo "<br>";
        }
    }

    //正三角形
    function triangle($size)
    {
        for ($i = 0; $i < $size; $i++) {
            for ($k = 0; $k < $size - 1 - $i; $k++) {  //*前方增加空白
                echo "&nbsp;";
            }
            for ($j = 0; $j < $i * 2 + 1; $j++) {
                echo "*";
            }
            echo "<br>";
        }
    }

    //長方形
    function rectangle($r)
    {
        for ($i = 0; $i <= $r; $i++) {
            for ($j = 0; $j <= $r; $j++) {
                if (
                    $i == 0 || $i == $r || //上下中間
                    $j == 0 || $j == $r    //頭尾
                ) {
                    echo "*";
                } else {
                    echo "&nbsp;";            //其他印空白
                }
            }
            echo "<br>";
        }
    }

    ?>