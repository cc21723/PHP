<?php
$data = json_decode(file_get_contents('todos.json'), true);
$id = $_POST['id'];
foreach ($data as &$item) {
  if ($item['id'] == $id) {
    if (isset($_POST['title'])) $item['title'] = $_POST['title'];
    if (isset($_POST['completed'])) $item['completed'] = $_POST['completed'] == '1' ? true : false;
  }
}
file_put_contents('todos.json', json_encode($data, JSON_UNESCAPED_UNICODE));
?>
