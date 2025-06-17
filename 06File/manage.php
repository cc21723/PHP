<?php

/**
 * 1.建立資料庫及資料表來儲存檔案資訊
 * 2.建立上傳表單頁面
 * 3.取得檔案資訊並寫入資料表
 * 4.製作檔案管理功能頁面
 */

//  引入 db.php 檔案中的程式碼一次
include_once "db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案管理功能</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            background: linear-gradient(to bottom right, #fef6fa, #e3f2fd);
            margin: 0;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #4a4a4a;
        }

        .header {
            font-size: 2.2rem;
            color: #6a4e77;
            margin-bottom: 1.5rem;
            text-shadow: 1px 1px 3px rgba(150, 120, 170, 0.1);
        }

        .add-file {
            background-color: #ba8eb2;
            color: white;
            text-decoration: none;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s;
            margin-bottom: 1.5rem;
        }

        .add-file:hover {
            background-color: #9f6fa0;
        }

        h2 {
            color: #e06aa4;
            font-weight: bold;
            text-align: center;
            margin: 1rem 0;
        }

        .table {
            width: 90%;
            max-width: 1000px;
            border-collapse: collapse;
            margin-top: 1rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(140, 100, 160, 0.1);
            overflow: hidden;
        }

        .table th,
        .table td {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        .table th {
            background-color: #f3d1ec;
            color: #4a3d4f;
            font-weight: bold;
        }

        .table tr:nth-child(even) {
            background-color: #f9f2fa;
        }

        .table img {
            border-radius: 6px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        button {
            background-color: #ba8eb2;
            color: white;
            border: none;
            padding: 0.4rem 0.8rem;
            margin: 0.2rem;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #9f6fa0;
        }

        .pages {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 2rem;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .pages a {
            padding: 0.4rem 0.8rem;
            background-color: #e1bee7;
            color: #4a3d4f;
            text-decoration: none;
            border-radius: 6px;
            margin: 0 0.2rem;
            transition: background-color 0.3s;
        }

        .pages a:hover {
            background-color: #d1a5dd;
        }

        .pages div {
            display: flex;
            gap: 0.5rem;
        }
    </style>

</head>

<body>
    <h1 class="header">檔案管理練習</h1>
    <!----建立上傳檔案表單及相關的檔案資訊存入資料表機制----->
    <a class='add-file' href="upload.php">新增檔案</a>
    <?php
    // 取得資料表 uploads 的所有資料
    $rows = all("uploads");

    //如果網址上有 msg 參數，就顯示訊息
    //$_GET['msg'] 代表網址的參數
    if (isset($_GET['msg'])) {
        echo "<h2>" . $_GET['msg'] . "</h2>";
    }

    $total_rows = $pdo->query("select count(*) from uploads")->fetchColumn();

    $div = 5; //每頁顯示的資料筆數
    $pages = ceil($total_rows / $div); //總頁數
    $now = $_GET['p'] ?? 1; //目前頁數
    $start = ($now - 1) * $div; //起始位置

    $rows = all("uploads", " limit $start,$div");

    ?>
    <!-- <div class="pages">
        <a href="?p=1">第一頁</a>
        <div>
            <?php

            // if ($now - 1 > 0) {
            //     echo "<a href='?p=" . ($now - 1) . "'> << </a>";
            // } else {
            //     echo "<a href='#'> << </a>";
            // }

            // for ($i = 1; $i <= $pages; $i++) {
            //     echo "<a href='?p=$i'>$i</a>";
            // }


            // if ($now + 1 <= $pages) {
            //     echo "<a href='?p=" . ($now + 1) . "'> >> </a>";
            // } else {
            //     echo "<a href='#'> >> </a>";
            // }
            ?>
        </div>
        <a href="?p=<?= $pages; ?>">最後頁</a>
    </div> -->

    <!-- table.table>(tr>th*5)+(tr>td*5) -->
    <table class="table">
        <tr>
            <th>序號</th>
            <th>縮圖</th>
            <th>檔名</th>
            <th>類型</th>
            <th>操作</th>
        </tr>
        <?php foreach ($rows as $key => $row): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td>
                    <?php
                    if ($row['type'] == 'image') {
                        //如果是圖片就顯示縮圖
                        echo "<img src='./files/" . $row['name'] . "' style='width:100px;'>";
                    } else {

                        switch ($row['type']) {
                            case 'document':
                                echo "<img src='icon/document.png' style='width:50px;'>";
                                break;
                            case 'video':
                                echo "<img src='icon/video.png' style='width:50px;'>";
                                break;
                            case 'music':
                                echo "<img src='icon/music.png' style='width:50px;'>";
                                break;
                            default:
                                echo "<img src='icon/others.png' style='width:50px;'>";
                        }
                    }

                    ?>


                </td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['type']; ?></td>
                <td>
                    <button onclick="location.href='edit_upload.php?id=<?= $row['id']; ?>'">編輯</button>
                    <button class="del" data-id="<?= $row['id']; ?>">刪除</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="pages">
        <a href="?p=1">第一頁</a>
        <div>
            <?php

            if ($now - 1 > 0) {
                echo "<a href='?p=" . ($now - 1) . "'> << </a>";
            } else {
                echo "<a href='#'> << </a>";
            }

            for ($i = 1; $i <= $pages; $i++) {
                echo "<a href='?p=$i'>$i</a>";
            }


            if ($now + 1 <= $pages) {
                echo "<a href='?p=" . ($now + 1) . "'> >> </a>";
            } else {
                echo "<a href='#'> >> </a>";
            }
            ?>
        </div>
        <a href="?p=<?= $pages; ?>">最後頁</a>
    </div>
    <!----透過資料表來顯示檔案的資訊，並可對檔案執行更新或刪除的工作----->

    <script>
        $(".del").on("click", function() {
            if (confirm("確定要刪除這個檔案嗎？")) {
                location.href = "del_upload.php?id=" + $(this).data("id");
            }
        })
    </script>




<!-- end -->
    <a class="a-style" href="../../index.html">⬅ 返回首頁</a>
</body>

</html>