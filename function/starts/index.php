<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: 'Courier New', Courier, monospace;
            box-sizing: border-box;
        }

        body {
            background: #f0f0f5;
            color: #333;
            padding: 40px;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .shape-block {
            background: white;
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 20px 30px;
            margin: 20px 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: fit-content;
            min-width: 300px;
        }

        .shape-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: center;
            color: #555;
            border-bottom: 1px dashed #aaa;
            padding-bottom: 8px;
        }

        .stars {
            white-space: pre;
            font-size: 1.1rem;
            text-align: left;
        }
    </style>

    <?php include 'library.php'; ?>
</head>

<body>
    <div class="shape-block">
        <?php
        stars('直角三角形', 5);
        stars('正三角形', 5);
        stars('長方形', 5);
        stars('矩形', 5);

       
        ?>
    </div>

</body>

</html>