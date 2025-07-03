<?php
$data = json_decode(file_get_contents('todos.json'), true);
$title = $_POST['title'];
$data[] = [
  'id' => time(),
  'title' => $title,
  'completed' => false
];
file_put_contents('todos.json', json_encode($data, JSON_UNESCAPED_UNICODE));
?>
