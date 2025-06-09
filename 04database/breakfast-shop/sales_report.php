<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>銷售報表</title>
    <style>
        body {
            font-family: 'Patrick Hand', cursive;
            background: linear-gradient(135deg, #fef6f9, #e3f4f3);
            color: #5c4b51;
            margin: 0;
            padding: 2rem;
        }

        h2 {
            text-align: center;
            color: #b97c8c;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .btns {
            width: 100%;
            text-align: center;
            margin: 1.5rem 0;
            display: flex;
            justify-content: center;
        }

        .btns button {
            background-color: #fce4ec;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 20px;
            box-shadow: 2px 2px 8px rgba(216, 167, 177, 0.3);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        a {
            text-decoration: none;
            color: #5c4b51;
        }

        .btns button:hover {
            background-color: #f8bbd0;
            transform: scale(1.05);
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff9f5;
            box-shadow: 0 0 15px rgba(200, 150, 180, 0.15);
            border-radius: 15px;
            overflow: hidden;
        }

        th,
        td {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px dashed #e8c1cc;
        }

        th {
            background-color: #fce4ec;
            color: #5c4b51;
            font-size: 1.2rem;
        }

        tr:nth-child(even) {
            background-color: #fef2f6;
        }

        tr:hover {
            background-color: #fdecef;
        }

        td {
            font-size: 1.1rem;
        }

        @media (max-width: 768px) {
            table {
                width: 95%;
            }

            th,
            td {
                font-size: 1rem;
                padding: 0.6rem;
            }
        }
    </style>
</head>

<body>
    <?php
    $dsn = "mysql:host=localhost;dbname=store;charset=utf8";
    $pdo = new PDO($dsn, 'root', '');

    //查詢銷售數量
    $sql = "SELECT `items`.`name`, 
	               `items`.`price`,
                sum(`sales`.`quantity`) as `sales_count`,
                sum(`items`.`price`*`sales`.`quantity`) as `total_sales` 
                FROM `items`
            LEFT JOIN `sales` 
                ON `items`.`id`=`sales`.`item_id`
            GROUP BY `items`.`id`
            ORDER BY `sales_count` ASC";

    $report = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <h2>銷售報表</h2>
    <div class="btns">

        <button><a href="index.php">回首頁</a></button>
    </div>
    <table>
        <tr>
            <th>品項</th>
            <th>銷售數量</th>
            <th>單價</th>
            <th>總金額</th>
        </tr>
        <?php foreach ($report as $report):
        ?>

            <tr>
                <td><?= $report['name']; ?></td>
                <td><?= $report['sales_count']; ?></td>
                <td><?= $report['price']; ?></td>
                <td><?= $report['total_sales']; ?></td>
            </tr>

        <?php
        endforeach;
        ?>
    </table>

</body>

</html>