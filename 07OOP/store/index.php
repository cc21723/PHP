<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>恆食早午餐</title>
    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Zhi+Mang+Xing&family=Quicksand:wght@400;600&display=swap'); */

        body {
            font-family: '標楷體', sans-serif;
            background: linear-gradient(to bottom right, #fef6f9, #e3f4f3);
            margin: 0;
            padding: 2rem;
            color: #5c4b51;
        }

        h1 {
            text-align: center;
            font-family: 'Zhi Mang Xing', cursive;
            font-size: 2.5rem;
            color: #d88c9a;
            margin-bottom: 1rem;
        }

        .btns {
            width: 100%;
            text-align: center;
            margin: 1.5rem 0;
            display: flex;
            justify-content: space-evenly;
        }

        .btns button,
        td a {
            background-color: #fce4ec;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 20px;
            box-shadow: 2px 2px 8px rgba(216, 167, 177, 0.3);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .btns button:hover,
        td a:hover {
            background-color: #f8bbd0;
            transform: scale(1.05);
        }

        a {
            text-decoration: none;
            color: #5c4b51;
        }

        table {
            width: 60%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff9f5;
            box-shadow: 0 0 15px rgba(200, 150, 180, 0.1);
            border-radius: 15px;
            overflow: hidden;
        }

        th,
        td {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid #f0e5e5;
        }

        th {
            background-color: #f8d7e0;
            color: #5c4b51;
        }

        tr:hover td {
            background-color: #fbeaf1;
        }

        hr {
            border: none;
            border-top: 3px dashed #d8a7b1;
            margin: 2rem auto;
            width: 80%;
            opacity: 0.8;
        }
    </style>
</head>

<body>

    <h1>恆食早午餐</h1>

    <?php
    //原始
    // $dsn = "mysql:host=localhost;dbname=store;charset=utf8";
    // $pdo = new PDO($dsn, 'root', '');
    // $items = $pdo->query("SELECT `id`, `name`,`price` FROM items")->fetchAll(PDO::FETCH_ASSOC);
    
    //做成OOP後
    include_once "./api/db_oop.php";
    $items = $Item->all();
    ?>

    <div class="btns">
        <button><a href="add_item.php">➕ 新增品項</a></button>
        <button><a href="sales_report.php">📊 銷售報表</a></button>
    </div>

    <table>
        <tr>
            <th>品項</th>
            <th>價格</th>
            <th>操作</th>
        </tr>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $item['name']; ?></td>
                <td><?= $item['price']; ?></td>
                <td>
                    <a href='update_item.php?id=<?= $item['id']; ?>'>編輯</a>
                    <a href='./api/delete_item.php?id=<?= $item['id']; ?>'>刪除</a>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>


</body>

</html>