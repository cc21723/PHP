<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>編輯資料</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            background: linear-gradient(to bottom right, #fef6fa, #e3f2fd);
            color: #4a4a4a;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem;
            margin: 0;
        }

        .header {
            font-size: 2rem;
            color: #6a4e77;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 3px rgba(150, 120, 170, 0.1);
        }

        form {
            background-color: #ffffffcc;
            padding: 2rem 2.5rem;
            border-radius: 18px;
            box-shadow: 0 5px 15px rgba(140, 100, 160, 0.15);
            width: 100%;
            max-width: 600px;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group {
            background-color: #fdf7fc;
            padding: 1rem;
            border: 1px solid #e4cce2;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
            margin-bottom: 1rem;
        }

        label {
            font-weight: bold;
            color: #5a4a6a;
        }

        input[type="file"],
        select,
        textarea {
            padding: 0.6rem;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f8f8f8;
            font-size: 1rem;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        .btns {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            margin-top: 1rem;
        }

        button {
            background-color: #ba8eb2;
            color: white;
            border: none;
            padding: 0.8rem 1.4rem;
            font-size: 1rem;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            flex: 1;
        }

        button:hover {
            background-color: #9f6fa0;
        }

        img{
            max-width: 64px;
            max-height: 64px;
        }
        .a-style {
            display: inline-block;
            margin-top: 2rem;
            padding: 0.6rem 1.2rem;
            background-color: #e1bee7;
            color: #4a3d4f;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .a-style:hover {
            background-color: #d1a5dd;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1 class="header">編輯資料</h1>
    <!----建立你的表單及設定編碼----->

    <?php
    include_once "db.php";
    $row = find("uploads", $_GET['id']);
    ?>
    <form action="save_upload.php" method="post" enctype="multipart/form-data">
        
        <?php
        switch ($row['type']) {
            case 'image':
                echo "<img src='./files/{$row['name']}' alt='檔案預覽'>";
                break;
            case 'document':
                echo "<img src='./icon/document.png' alt='文件預覽'>";
                break;
            case 'video':
                echo "<img src='./icon/video.png' alt='影片預覽'>";
                break;
            case 'music':
                echo "<img src='./icon/music.png' alt='音樂預覽'>";
                break;
            default:
                echo "<img src='./icon/others.png' alt='未知檔案類型'>";
        }
        ?>
        <label>檔案格式：</label>
        <select name="type" id="type">
            <option value="image" <?= ($row['type'] == 'image') ? 'selected' : ''; ?>>影像</option>
            <option value="document" <?= ($row['type'] == 'document') ? 'selected' : ''; ?>>文件</option>
            <option value="video" <?= ($row['type'] == 'video') ? 'selected' : ''; ?>>影片</option>
            <option value="music" <?= ($row['type'] == 'music') ? 'selected' : ''; ?>>音樂</option>
        </select>
        <label for="name">選擇檔案上傳：</label>
        <input type="file" name="name" id="name" required>
        <label>備註：</label>
        <textarea name="description" id="description"><?= $row['description']; ?></textarea>
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
        <div class="btns">
            <button type="submit">上傳檔案</button>
        </div>
    </form>

    <!-- end -->
    <a class="a-style" href="../../index.html">⬅ 返回首頁</a>
</body>

</html>