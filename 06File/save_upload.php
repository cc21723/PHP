<?php
include_once "db.php";
echo "<pre>";
print_r($_POST); //輸出所有表單欄位。
print_r($_FILES); //輸出檔案上傳資訊。
echo "</pre>";

if(!empty($_FILES['name']['tmp_name'])){ // 如果有上傳檔案（檔案暫存路徑不為空）
    $name = $_FILES['name']['name']; // 取得使用者上傳檔案的原始檔名
    move_uploaded_file($_FILES['name']['tmp_name'],'./files/'.$name); // 將檔案從暫存位置搬移到指定目錄 ./files/
    $_POST['name']=$name; // 把上傳的檔名加入 $_POST 陣列，方便後續一起儲存
}

$type = $_POST['type']; // 從 POST 中取得上傳類型欄位的值
$description = $_POST['description']; // 從 POST 中取得檔案描述欄位的值
save('uploads',$_POST); // 呼叫自訂的 save 函式，將整個 POST 陣列儲存到 uploads 資料表

header("location:manage.php?msg=檔案編輯成功，檔名為：".$name);

?>