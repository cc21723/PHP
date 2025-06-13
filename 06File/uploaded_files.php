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