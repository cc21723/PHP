<?php include './data/calculator_logic.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>計算機</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        hr {
            border: none;
            border-top: 3px dashed #d8a7b1;
            /* 柔和粉紅色虛線 */
            margin: 2rem auto;
            width: 80%;
            opacity: 0.8;
        }

        #num1,
        #num2,
        select {
            padding: 0.6rem 1rem;
            border: 2px solid #d8c2e0;
            border-radius: 10px;
            background-color: #ffffffdd;
            font-size: 1rem;
            width: 100px;
            text-align: center;
            box-shadow: 2px 2px 6px rgba(200, 180, 210, 0.3);
        }

        #num1,
        #num2 {
            width: 200px;
            /* ✅ 加大寬度 */

        }

        .tac {
            text-align: center;
        }

        #myBtn {
            width: 80%;
            background-color: #d8a7b1;
            color: #fff;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 25px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 2px 2px 6px rgba(216, 167, 177, 0.4);
            /* 確保不會被 flex 影響 */
            display: inline-block;
            text-align: center;
        }

        #myBtn:hover {
            background-color: #c6899a;
            transform: scale(1.05);
        }

        #result {
            margin-top: 2rem;
            font-size: 1.2rem;
            background-color: #ffffffcc;
            padding: 1rem;
            border-radius: 15px;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 0 10px rgba(174, 134, 152, 0.1);
        }

        a {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            text-align: center;
            background-color: #fce4ec;
            color: #5c4b51;
            text-decoration: none;
            font-size: 1.1rem;
            border-radius: 20px;
            box-shadow: 2px 2px 8px rgba(216, 167, 177, 0.3);
            transition: all 0.3s ease;
            min-width: 120px;
            /* ✅ 統一寬度較好看，可依需要調整 */
        }

        li a:hover {
            background-color: #eec9d2;
            transform: scale(1.03);
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="get">
            <input type="number" name="num1" id="num1" value="<?= ($num1) ?>" />
            <select name="opt" id="opt">
                <option value="+" <?= $opt == '+' ? 'selected' : '' ?>>+</option>
                <option value="-" <?= $opt == '-' ? 'selected' : '' ?>>-</option>
                <option value="*" <?= $opt == '*' ? 'selected' : '' ?>>*</option>
                <option value="/" <?= $opt == '/' ? 'selected' : '' ?>>/</option>
            </select>
            <input type="number" name="num2" id="num2" value="<?= ($num2) ?>" />
            <p class="tac">
                <button type="submit" id="myBtn">送出</button>
            </p>
            <hr>
            <?php if ($result !== ''): ?>
                <div id="result">
                    <?= ($num1) . " {$opt} " . ($num2) . " = " . ($result) ?>
                </div>
            <?php endif; ?>
            <hr>
            <div class="tac">
                <a href="../../index.html">返回首頁</a>
            </div>
        </form>

    </div>
</body>

</html>