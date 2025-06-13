<style>
    body {
        background: linear-gradient(to bottom right, #fdf2f8, #e0f7fa);
        font-family: 'Segoe UI', sans-serif;
        color: #4a4a4a;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 2rem;
    }

    h1.header {
        color: #b65e8b;
        text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
    }

    form {
        background-color: #fff;
        padding: 2rem 3rem;
        border-radius: 20px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        width: 100%;
        margin-bottom: 2rem;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }

    input[type="file"] {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 10px;
        margin-bottom: 1rem;
        background-color: #fafafa;
    }

    button[type="submit"] {
        background-color: #f48fb1;
        color: white;
        border: none;
        padding: 0.6rem 1.2rem;
        font-size: 1rem;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #ec407a;
    }

    .a-style {
        display: inline-block;
        margin-top: 1rem;
        text-decoration: none;
        color: #6a1b9a;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .a-style:hover {
        color: #ad1457;
    }

    img {
        max-width: 300px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(100, 100, 100, 0.1);
        margin-top: 1rem;
    }
</style>

<?php
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";

//自訂義檔名
$fileName=date("YmdHis")."_".rand(1000,9999).".".explode(".",$_FILES['myfile']['tmp_name'])[1];

// 取得原始檔案名稱（注意可能包含副檔名）
// $originalName = $_FILES['myfile']['name'];

// 使用者上傳的檔案會暫存在 $_FILES['myfile']['tmp_name'] 指定的路徑
// move_uploaded_file() 可以把這個暫存檔移動到指定資料夾

// 將檔案從暫存區移動到 ./files 資料夾，保留原始檔名
                    // 暫存檔路徑                   //目標    // 儲存目的地：files 資料夾 + 原始檔名
// move_uploaded_file($_FILES['myfile']['tmp_name'],'./files/'.$_FILES['myfile']['tmp_name']);
move_uploaded_file($_FILES['myfile']['tmp_name'],'./files/'.$fileName);


?>

<img src="./files/<?=$fileName?>" >