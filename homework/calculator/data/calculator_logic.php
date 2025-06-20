<?php
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
?>