<?php
function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

$input = $_GET;

// $input = [
//     'name' => 'amy',
//     'mobile' => '0900',
// ];

$input['rank'] = 'A';
$input['msg'] = 'ok';

// dd($input);
echo json_encode($input);
