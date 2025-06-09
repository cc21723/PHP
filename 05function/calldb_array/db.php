<?php
$dsn = "mysql:host=localhost;dbname=store;charsetutf8";
$pdo = new PDO($dsn, 'root', "");

//列印陣列的function
//dd = direct dump  "dump and die" → 輸出資料後立刻結束執行
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

//執行一段 SQL 查詢語句，並回傳所有結果（關聯陣列的方式）
function qAll($sql)
{
    global $pdo; // 引用全域的 PDO 資料庫連線
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

// 執行 SQL 查詢並回傳單筆結果（關聯陣列格式）
function q($sql)
{
    global $pdo; // 引用全域的 PDO 資料庫連線
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

// all()
// function all($table, $where = null)
// {
//     // 參數
//     //$table表單 ,$where = null 預設空白
//     // global $pdo;

//     //      // SELECT * FROM $table $where (參數)
//     // $sql = "SELECT * FROM $table $where";

//     // echo $sql;
//     // $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

//     // //將rows指定給all
//     // return $rows;

//     // 在 function all() 中，可以直接呼叫 q($sql)，來取代
//     $sql = "SELECT * FROM $table $where";
//     echo $sql;
//     return qAll($sql);
// }

function all($table, $array=null,$str=null){

    $sql = "SELECT * FROM $table ";

        // 判斷有沒有存在第二個參數 如果是陣列就做 不是就當作字串
        if(is_array($array)){
            $tmp = array2sql($array);
            // $sql = $sql ." WHERE ".join(" AND ", $tmp);
            $sql .= "WHERE".join(" AND ",$tmp);
        }else{
            $sql .= $array;
        }
        $sql .= $str;
    return qAll($sql);

}

//將關聯式陣列$key 跟 $value 轉換成  `欄位`='值'
//查詢陣列的 $key 跟 $value
function array2sql($array){
    $tmp=[];
    foreach($array as $key=>$value){
        $tmp[]="`$key`='$value'";
    }

    return $tmp;
}

// find() 回傳資料表指定id的資料
function find($table, $id)
{

    //判斷接收到的值是否為陣列
    if (is_array($id)) {
        // $tmp = [];
        // foreach ($id as $key => $value) {
        //     $tmp[] = "`$key` = '$value'";
        // }
        $tmp = array2sql($id);
       
        // .join(" AND ",$id) 只有串值 沒有串到key
        $sql = "SELECT * FROM $table WHERE " . join(" AND ", $tmp);
    } else {
        $sql = "SELECT * FROM $table WHERE id= '$id'";
    }
    echo $sql;
    return q($sql);
}


// update()給定資料表的條件後，會去更新相應的資料

function update($table, $data)
{
    global $pdo;
    //格式
    // $data = ['id' =>5,
    //          'name' => 'xxx',
    //          'cost' => '123',
    //          'stock' => '123',
    //          'cost' => '123'];

    $id = $data['id'];
    unset($data['id']); // 從 $data 移除 id，因為不需要出現在 SET 裡

    // $tmp = [];
    // foreach ($data as $key => $value) {
    //     if ($key != 'id') {
    //         $tmp[] = "`$key`='$value'";
    //     }
    // }
    $tmp = array2sql($data);

    // $sql = "UPDATE $table SET " . join(" , ", $tmp) . " WHERE id = '{$data['id']}'";
    $sql = "UPDATE $table SET " . join(" , ", $tmp) . " WHERE id = '$id'";

    return $pdo->exec($sql);
}


//insert()給定資料內容後，會去新增資料到資料表

function insert($table, $data)
{
    global $pdo;
    $keys = array_keys($data);
    $sql = "INSERT INTO $table (`" . join("`,`", $keys) . "`) values('" . join("','", $data) . "');";

    echo $sql;
    return $pdo->exec($sql);
}

//save() 合併update + insert
//如果id存在就改資料 不存在就新增

function save($table, $data)
{
    if (isset($data['id'])) {
        update($table, $data);
    } else {
        insert($table, $data);
    }
}

 //del() 給定條件後，會去刪除指定的資料
 function del($table, $id){
    global $pdo; 
    $sql = "DELETE FROM $table WHERE ";
    if (is_array($id)) {
        $tmp = array2sql($id);
        $sql .=join(" AND ", $tmp);
    } else {
        $sql .= "id='$id'";
    }
    echo $sql;
    return $pdo->exec($sql);
}
