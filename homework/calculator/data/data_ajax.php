<?php
function dd($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

$input = $_GET;

// $input = [
//     'num1' => '111',
//     'opt' => '+',
//     'num2' => '111',
// ];

// dd($input);
echo json_encode($input);


?>