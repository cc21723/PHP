<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>程式基礎</title>
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
            padding: 30px 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border: 4px dashed #E16B8C;
            text-align: center;
        }

        h1 {
            color: #E16B8C;
            font-size: 2.5em;
            margin-bottom: 30px;
        }

        ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        li a {
            display: inline-block;
            padding: 15px 25px;
            background-color: #E16B8C;
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-size: 1.2em;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease, background-color 0.3s ease;
        }

        li a:hover {
            background-color: #c05574;
            transform: scale(1.05);
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 2em;
            }

            li a {
                font-size: 1em;
                padding: 12px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <ul>
            <li><a href="./var/index.php">變數</a></li>
            <li><a href="./select/index.php">判斷式</a></li>
            <li><a href="./loop/index.php">迴圈-重複結構</a></li>
            <li><a href="./loop/starts.php">迴圈-畫星星</a></li>
            <li><a href="./array/index.php">陣列</a></li>
            <li><a href="./string/index.php">字串</a></li>
            <li><a href="./datetime/index.php">時間及日期處理</a></li>
            <li><a href="./datetime/calendar.php">線上月曆</a></li>
            <li><a href="./datetime/calendar2.php">線上月曆2</a></li>
            <li><a href="./datetime/calendar3.php">萬年曆</a></li>
        </ul>
    </div>
</body>

</html>