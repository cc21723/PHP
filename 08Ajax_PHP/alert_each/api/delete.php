<?php
$data = json_decode(file_get_contents('todos.json'), true);
$id = $_POST['id'];
$data = array_filter($data, function ($item) use ($id) {
  return $item['id'] != $id;
});
file_put_contents('todos.json', json_encode(array_values($data), JSON_UNESCAPED_UNICODE));
?>
