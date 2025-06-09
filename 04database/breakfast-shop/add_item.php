<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增品項</title>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">

    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap'); */

        body {
            font-family: '標楷體', sans-serif;
            background: linear-gradient(to bottom right, #fef6f9, #e3f4f3);
            background-repeat: no-repeat;
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
    <h1>新增品項</h1>
    <form action="./api/add_item.php" method="post">
        <label for="">品項名稱：</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="">價格：</label>
        <input type="text" name="price" id="price" required>
        <br>
        <label for="">成本：</label>
        <input type="text" name="cost" id="cost" required>
        <br>
        <label for="">庫存：</label>
        <input type="text" name="stock" id="stock" required>
        <br>
        <button type="submit">新增</button>
    </form>

</body>

</html>