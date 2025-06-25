<?php
header('Content-Type: application/json'); //告訴前端這是 JSON 格式
$result = '';
$num1 = $_GET['num1'] ?? '';
$num2 = $_GET['num2'] ?? '';
$opt = $_GET['opt'] ?? '';

if (is_numeric($num1) && is_numeric($num2) && $opt) {
    switch ($opt) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
        case '/':
            $result = ($num2 != 0) ? $num1 / $num2 : '不能除以 0';
            break;
        default:
            $result = '無效的運算符號';
    }
}

//回傳 JSON 給前端
echo json_encode([
    'num1' => $num1,
    'num2' => $num2,
    'opt' => $opt,
    'result' => $result
]);
?>