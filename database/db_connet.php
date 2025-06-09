<?php
$dsn= "mysql:host=localhost;dbname=school;charset=utf8";

$pdo=new PDO($dsn,'root','');

$sql="select * from students where id<=20";
$rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC); //fetchAll() 二維陣列

// echo "<pre>";
// print_r($rows);
// echo "<pre>";
?>
<style>
    /* 頁面整體背景與字型 */
    *{
        clear: both;
        box-sizing: border-box;
        margin: 0 auto;
    }
    body {
        background: linear-gradient(to bottom right, #fdfbfa, #f8e9f0);
        font-family: 'Segoe UI', sans-serif;
        padding: 2rem;
        color: #5f4b66;
        width: 960px;
    }
    /* 表格樣式 */
    table {
        width: 80%;
        border-collapse: collapse;
        margin: 30px auto;
        font-family: 'Segoe UI', sans-serif;
        background-color: #fef6fa;
        box-shadow: 0 0 15px rgba(200, 160, 180, 0.1);
        border-radius: 12px;
        overflow: hidden;
    }

    th, td {
        border: 1px solid #e8d9f1;
        padding: 10px 15px;
        text-align: center;
        color: #5f4b66;
    }

    th {
        background-color: #f8e9f0;
        color: #5f4b66;
    }
     tr:nth-child(even) {
        background-color: #fdfbfa;
    }

    tr:hover {
        background-color: #f3e2ef;
    }

</style>
<table>
    <tr>
        <th>id</th>
        <th>學號</th>
        <th>姓名</th>
        <th>生日</th>
        <th>電話</th>
    </tr>
    <?php
    foreach($rows as $row){
    ?>
    <tr>
        <td><?=$row['id'];?></td>
        <td><?=$row['school_num'];?></td>
        <td><?=$row['name'];?></td>
        <td><?=$row['birthday'];?></td>
        <td><?=$row['tel'];?></td>
    </tr>
    <?php
    }
    ?>
</table>

<style>
 /* 卡片樣式 */
    .card {
        width: 20%;
        margin: 15px;
        padding: 15px;
        border-radius: 15px;
        border: 1px solid #e8d9f1;
        background-color: #fdfbfa;
        box-shadow: 0 4px 10px rgba(200, 160, 180, 0.1);
        display: inline-block;
        vertical-align: top;
        font-family: 'Segoe UI', sans-serif;
        color: #5f4b66;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(200, 160, 180, 0.2);
    }

    h3.head {
        margin: 0 0 10px 0;
        padding-bottom: 5px;
        border-bottom: 2px dashed #d8c7d6;
        font-size: 1.2em;
        color: #7a5c86;
    }

    .card div {
        margin: 5px 0;
        padding: 5px 0;
        background-color: #fef6fa;
        border-radius: 8px;
    }

    .card div:hover {
        background-color: #f3e2ef;
    }

</style>
<?php 
foreach($rows as $row){
?>
    <div class="card">
        <h3 class="head"><?=$row['name'];?></h3>
        <div class="id"><?=$row['id'];?></div>
        <div class="birthday"><?=$row['birthday'];?></div>
        <div class="tel"><?=$row['tel'];?></div>
        <div class="num"><?=$row['school_num'];?></div>
    </div>
<?php
}
?>
