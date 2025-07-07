<?php include_once "db.php";
//處理刪除資料的請求

$Stu->del($_POST['id']);

header('Content-Type:application/json;');
echo json_encode(['success' => true]);


?>