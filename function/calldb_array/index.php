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

    <?php include 'db.php'; ?>
</head>

<body>
    <div class="shape-block">
        <?php



        // print_r(all('items'));
        // $rows = all('items');
        // dd($rows);

        // $rows = all('sales');
        // dd($rows);

        // // 滿足特定條件的多筆資料放到後台
        // $sales = all('sales', " where quantity >=2");
        // dd($sales);

        // $all = q("SELECT name, price FROM items ORDER BY price");
        // dd($all);

        //find() 回傳資料表指定id的資料
        dd(find('items', 3));
        dd(find('items', ['name' => '蛋餅', 'stock' => 50]));

        


        // update() 給定資料表的條件後，會去更新相應的資料。
        $row = find('items', 5);
        dd($row);
        $row['cost'] = 20;
        $row['price'] = 45;
        dd($row);
        update("items", $row);
        ?>
    </div>

</body>

</html>