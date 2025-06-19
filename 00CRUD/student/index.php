<?php 
    include_once "./data/data.php" 
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Table</title>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #fdf0f7, #f3e5f5);
      font-family: 'Quicksand', sans-serif;
      color: #5c4a5d;
      padding: 2rem 0;
    }

    table {
      width: 80%;
      margin: 2rem auto;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 4px 12px rgba(221, 170, 221, 0.3);
      border-radius: 12px;
      overflow: hidden;
    }

    th, td {
      padding: 12px 16px;
      border: 1px solid #e0cfe6;
    }

    th {
      background-color: #eec9f4;
      color: #5d3c58;
      font-weight: 600;
    }

    tr:nth-child(even) {
      background-color: #faf5fb;
    }

    tr:hover {
      background-color: #f8e3f3;
    }

    .a-style {
      display: block;
      width: fit-content;
      margin: 2rem auto;
      padding: 0.6rem 1.4rem;
      background-color: #e1bee7;
      color: #4a3d4f;
      text-decoration: none;
      border-radius: 10px;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .a-style:hover {
      background-color: #ce93d8;
    }
  </style>
</head>
<body>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
    </tr>
    <?php foreach ($data as $value): ?>
      <tr>
        <td><?= $value['id'] ?></td>
        <td><?= $value['name'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

  <a class="a-style" href="../../index.html">⬅ 返回首頁</a>
</body>
</html>
