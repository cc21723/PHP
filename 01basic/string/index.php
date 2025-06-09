<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String 字串處理</title>
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
            align-items: flex-start;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            width: 90%;
            max-width: 960px;
            background-color: #fff;
            border-radius: 16px;
            padding: 40px 30px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border: 4px dashed #E16B8C;
            line-height: 1.8;
            color: #333;
        }

        h1 {
            color: #E16B8C;
            font-size: 2.8em;
            margin-bottom: 30px;
            text-align: center;
        }

        h2 {
            color: #C94A70;
            font-size: 1.8em;
            margin-top: 40px;
            border-left: 6px solid #E16B8C;
            padding-left: 10px;
        }

        p {
            margin: 10px 0;
            font-size: 1.1em;
        }

        ul,
        ol {
            padding-left: 1.5em;
            font-size: 1.05em;
        }

        a {
            color: #E16B8C;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        a:hover {
            text-decoration: underline;
            color: #c74369;
        }

        code {
            background-color: #fce4ec;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: monospace;
            font-size: 1em;
        }

        hr {
            border: none;
            border-top: 2px dashed #E16B8C;
            margin: 40px 0;
        }

        /* 加強 span 顯示的段落效果 */
        span[style*="color"] {
            display: inline-block;
            padding: 2px 4px;
            border-radius: 4px;
        }

        /* 讓內容不會擠在一起 */
        br {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>字串處理</h1>
        <h2>字串取代</h2>
        <p>將"aassww111"改成"*******"</p>
        <?php
        $str = "aassww111";

        // $str = str_replace("a", "*", $str);
        // $str = str_replace("s", "*", $str);
        // $str = str_replace("w", "*", $str);
        // $str = str_replace("1", "*", $str);
        // $str=str_replace(["a","s","w","1"],"*",$str);
        // $str=str_replace(str_split($str,1),"*",$str);        
        $str = str_repeat("*", strlen($str)); //strlen()計算$str長度 
        
        echo $str;
        ?>
        <br>
        <br>
        <h2>字串分割</h2>
        <p>將”this,is,a,book”依”,”切割後成為陣列</p>
        <?php
        $arr = [];
        $str = "this,is,a,book";
        $arr = explode(",", $str);
        print_r($arr);
        ?>
        <br>
        <br>
        <h2>字串組合</h2>
        <p>將上例陣列重新組合成“this is a book”</p>
        <?php
        $arr = [];
        $str = "this,is,a,book";
        $arr = explode(",", $str);
        echo "這是陣列";
        print_r($arr);
        $str2 = join("&nbsp", $arr); //implode() = jion() 以特定字串/字元/符號將陣列元素合併成字串
        echo "<br>字串用jion合併後：" . $str2;
        ?>
        <br>
        <br>

        <h2>子字串取用</h2>
        <p>將” The reason why a great man is great is that he resolves to be a great man”只取前十字成為” The reason…”</p>
        <?php
        $str = "The reason why a great man is great is that he resolves to be a great man";
        // $str = substr($str, 0, 10);
        $str = mb_substr($str, 0, 10, "utf-8"); //取出前 10 個字，並支援 UTF-8
        echo "只取前十字成為:" . $str . "...";
        ?>
        <br>
        <br>
        <h2>尋找字串與HTML、css整合應用</h2>
        <ul>
            <li>給定一個句子，將指定的關鍵字放大</li>
            <li>“學會PHP網頁程式設計，薪水會加倍，工作會好找”</li>
            <li>請將上句中的 “程式設計” 放大字型或變色.</li>
        </ul>
        <?php
        $str = "學會PHP網頁程式設計，薪水會加倍，工作會好找";
        $keyword = "程式設計";
        $style = "color: red;font-size: 1.5em;font-weight: bold;";
        // $highlighted ="<span style='color: red;font-size: 1.5em;font-weight: bold;'>$keyword</span>";
        
        $str = str_replace($keyword, "<span style='$style'>$keyword</span>", $str);
        echo "<p>$str</p>";
        ?>
        <br>
        <br>
        <?php
        $str = "《藥師少女的獨語》劇情背景是什麼？
充滿宮鬥元素的《藥師少女的獨語》故事圍繞在皇帝「華瑞陽」的後宮。雖有濃厚的中華元素但作者並沒有將劇情設定在中國歷史朝代。皇族成員、美麗的後宮妃子們背後各有自己的故事，而當聰明的藥師「貓貓」出現，讓宮廷暗地的勾心鬥角和複雜背景一一浮上檯面。
《藥師少女的獨語》主要角色介紹

女主角｜貓貓

煙花巷出身的天才藥師
女主角貓貓的名字取自母親常用來作指甲油的原料之一酢漿草（又稱「貓貓草」）。她在煙花巷的綠青館、藥坊工作，不只懂許多藥學知識也識字、善推理、研究心強又聰明過人，對於各式藥劑、草藥十分著迷，因常用左手腕來測試藥物，造成傷痕，平時都用繃帶捆住遮掩。

被賣到宮中成為試毒人
一日，貓貓出外尋找刺青用的藥草，卻意外遭到人口販子綁架，被拐賣到了後宮作下級侍女（宮女）。之後，她異於他人的才能被宦官壬氏發現，因此成了壬氏的棋子，先後擔任玉葉妃、壬氏的侍女和醫官的輔佐女官，更透過壬氏的特權，與見習醫官一起上課。由於長期試藥，貓貓不管是對藥物的抗性和酒量都比一般人高出許多，因此被任命擔任宮中的「試毒人」。（對她來說，這根本就是天上掉下來的夢幻工作～）

雀斑是保護色
貓貓臉上的雀斑其實是她自己畫出來的。因為從小身處花街，女性容易遭人非禮迫害，因此她故意把自己的容貌變醜作為防身手段。在感情觀上，也是因為受花街的文化影響，貓貓對男性抱持很現實的態度，甚至對戀愛完全免疫，連對壬氏那「宛若仙女下凡」的容貌都毫無感覺，壬氏頻頻釋出的好意（和愛意）她也往往都會忽略。


男主角｜壬氏
神秘的美男宦官
壬氏表面上是管理後宮大小事務的宦官，他容貌出眾，就連男性也被深深吸引。不過，美男系的迷人外表之下，他的性格卻執拗、傲嬌，習慣不擇手段來達到目標，甚至想把貓貓攬為自己的專屬侍女。壬氏一直以「藥師」來稱呼貓貓，其實是因為害羞直呼其名。雖然他在宮中的位置總讓他接觸到諸多人心醜惡之處，但他天性善良，尤其因為暗戀貓貓做出的彆扭舉動讓粉絲們覺得超可愛。


真實身分「華瑞月」是誰？
壬氏在故事開頭時對外宣稱24歲，但他其實才18歲而已。他偽裝成皇帝的弟弟，因自小體弱多病而不常現身，不得不出席大場面時，他會用黑布遮住臉。他也有許多如「月君」、「夜君」、「香泉」、「壬華」等化名，方便身邊人在宮外稱呼他使用。隨著劇情發展，他的真實身份也會慢慢揭曉。";
        // $keyword = "《藥師少女的獨語》";
        // $word="貓貓";
        // $word2="壬氏";
        // $style = "color: green;font-size: 2em;font-weight: bold;";
        // $style1 = "color: green;font-size: 1.5em;font-weight: bold;";
        // $style2 = "color: blue;font-size: 1.5em;font-weight: bold;";
        // // $highlighted ="<span style='color: red;font-size: 1.5em;font-weight: bold;'>$keyword</span>";
        
        // $str = str_replace($keyword, "<span style='$style'>$keyword</span>", $str);
        // $str = str_replace($word, "<span style='$style1'>$word</span>", $str);
        // $str = str_replace($word2, "<span style='$style2'>$word2</span>", $str);
        // $str = join("<br>",$str);
        // echo "<p>$str</p>";
        $keywords = ["《藥師少女的獨語》", "貓貓", "壬氏"];
        $style = [
            'color: green;font-size: 1.5em;font-weight: bold;',
            'color: green;font-size: 1.2em;font-weight: bold;',
            'color: blue;font-size: 1.2em;font-weight: bold;'
        ];
        //在指定的關鍵字中加上url
        $url = ['', 'https://www.pinterest.com/pin/36310340742394973/', 'https://www.pinterest.com/pin/127508233193491860/'];
        // foreach ($keywords as $index => $keyword) {
        // $str = str_replace($keyword, "<span style='$style[$index]'>$keyword</span>", $str);
        
        // 如果是 "貓貓"，加上超連結及CSS
        // if ($word === "貓貓") {
        //     $replacement = "<a href='$url' target='_blank'><span style='{$style[$index]}'>$word</span></a>";
        // } else {
        //     $replacement = "<span style='{$style[$index]}'>$word</span>";
        // }
        // $str = str_replace($word, $replacement, $str);
        // }
        
        foreach ($keywords as $index => $keyword) {
            // 如果有 URL 加上超連結
            if ($url[$index] != '') {
                $strwithurl = "<a href='$url[$index]' style='$style[$index]'>$keyword</a>";
            } else {
                $strwithurl = "<span style='$style[$index]'>$keyword</span>";
            }
            // 包上樣式
            $strwithstyle = "<span style='$style[$index]'>$strwithurl</span>";
            // 替換進原始字串
            $str = str_replace("$keyword", "$strwithstyle", $str);
        }
        // $str = str_replace($keyword[1],"<a href='$url'>$keyword[1]</a>",$str);
        echo nl2br($str); //把文字裡的換行（\n）自動變成 <br> nl2br讓 \n 保留斷行
        ?>


    </div>

</body>

</html>