<?php include_once "db.php";

$Stu->save($_POST);

header('Content-Type:application/json;');
echo json_encode(['success' => true]);

// if ($result) {
//     echo json_encode(['success' => true]);
// } else {
//     echo json_encode(['success' => false, 'message' => '資料儲存失敗']);
// }
?>