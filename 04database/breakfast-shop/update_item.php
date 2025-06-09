<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編輯品項</title>
    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Zhi+Mang+Xing&family=Quicksand:wght@400;600&display=swap'); */

        body {
            font-family: '標楷體', sans-serif;
            background: linear-gradient(to bottom right, #fef6f9, #e3f4f3);
            color: #5c4b51;
            margin: 0;
            padding: 2rem;
        }

        h1 {
            text-align: center;
            font-family: 'Zhi Mang Xing', cursive;
            font-size: 2.5rem;
            color: #d88c9a;
            margin-bottom: 2rem;
        }

        form {
            background-color: #fff9f5;
            max-width: 500px;
            margin: 0 auto;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(216, 167, 177, 0.2);
        }

        label {
            display: block;
            margin-top: 1rem;
            font-weight: bold;
            color: #8e6e79;
        }

        input[type="text"] {
            width: 100%;
            padding: 0.6rem;
            margin-top: 0.3rem;
            border: 1px solid #e8ccd7;
            border-radius: 10px;
            background-color: #fef1f6;
            font-size: 1rem;
            color: #5c4b51;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #d88c9a;
            outline: none;
        }

        button[type="submit"] {
            margin-top: 1.5rem;
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 20px;
            background-color: #f8bbd0;
            color: #5c4b51;
            font-size: 1.1rem;
            box-shadow: 2px 2px 10px rgba(216, 167, 177, 0.2);
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        button[type="submit"]:hover {
            background-color: #f48fb1;
            transform: scale(1.03);
        }

        h2 {
            text-align: center;
            color: #d88c9a;
        }
    </style>
</head>

<body>
    <h1>編輯品項</h1>
    <?php
    $dsn = "mysql:host=localhost;dbname=store;charset=utf8";
    $pdo = new PDO($dsn, 'root', '');
    $id = $_GET['id'] ?? 0;
    $item = $pdo->query("SELECT * FROM items WHERE id='$id'")->fetch(PDO::FETCH_ASSOC);
    if (!$item) {
        echo "<h2>品項不存在</h2>";
        exit;
    }
    ?>
    <form action="./api/update_item.php" method="post">
        <label for="name">品項名稱：</label>
        <input type="text" name="name" id="name" value="<?= $item['name']; ?>" required>

        <label for="price">價格：</label>
        <input type="text" name="price" id="price" value="<?= $item['price']; ?>" required>

        <label for="cost">成本：</label>
        <input type="text" name="cost" id="cost" value="<?= $item['cost']; ?>" required>

        <label for="stock">庫存：</label>
        <input type="text" name="stock" id="stock" value="<?= $item['stock']; ?>" required>

        <input type="hidden" name="id" value="<?= $item['id']; ?>">
        <button type="submit">更新品項</button>
    </form>

</body>

</html>
