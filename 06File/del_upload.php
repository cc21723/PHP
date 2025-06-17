<?php
// $_GET['id']：嘗試從網址的查詢參數取得 id 值，例如 page.php?id=3 就會拿到 3。
// ?? null：如果 $_GET['id'] 沒有設定（也就是 isset($_GET['id']) 為 false），就會使用 null 作為預設值。
$id = $_GET['id'] ?? null;
//找表單uploads的參數id
$row = find("uploads", $id);

//刪除
del("upload",$id);

//顯示訊息
header("location:manage.php?msg=檔案".$row['name']."刪除成功");



?>