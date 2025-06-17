<?php
// 連線至files的資料庫
$dsn = "mysql:host=localhost;dbname=files;charset=utf8";
$pdo = new PDO($dsn, 'root', '');

/*
all($table, $array = null, $str = null)
$table: 資料表名稱 (string)
$array: 條件陣列 (array|null)，可選，若為陣列則產生 WHERE 條件
$str: 其他SQL語法 (string|null)，可選，附加在SQL語句後
回傳: 查詢結果的關聯式陣列
*/

// 定義函式 all，用來查詢指定資料表的資料
// 參數：$table 為資料表名稱，$array 為條件（陣列），$str 為額外 SQL 字串（如 ORDER BY、LIMIT）
function all($table, $array = null, $str = null)
{
    // 使用 global 把全域變數 $pdo 帶進來（PDO 是資料庫連線物件）
    global $pdo;

    // 基本 SQL 查詢語法
    $sql = "SELECT * FROM $table";

    // 如果傳入的 $array 是陣列（表示要加上 WHERE 條件）
    if (is_array($array)) {
        // 將條件陣列轉換為 SQL 格式（這邊用到自訂函式 array2sql）
        $tmp = array2sql($sql);

        // 把條件用 AND 連接起來，接在 SQL 語法後面
        $sql = $sql . " WHERE " . join(" AND ", $tmp);
    } else {
        // 如果 $array 不是陣列（可能是 WHERE...、ORDER BY... 等文字），就直接接到 SQL 語法後面
        $sql .= $array;
    }

    // 如果有傳入 $str，就再接上去（例如 LIMIT、ORDER BY 等）
    $sql .= $str;

    // 執行 SQL 查詢，回傳所有結果（以關聯陣列方式取得）
    $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    // 回傳查詢結果
    return $rows;
}

/*
dd($array)
$array: 要輸出的陣列 (array)
功能: 以pre格式印出陣列內容，方便除錯
*/
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

/*查詢
find($table, $id) : 定義函式 find，用來從指定資料表中取得一筆資料
$table: 資料表名稱 (string)
$id: 主鍵值或條件陣列 (int|string|array)
    - 若為陣列，則產生多條件查詢
    - 若為單一值，則以id欄位查詢
回傳: 查詢到的單筆資料 (關聯式陣列)
*/
function find($table, $id){
    global $pdo; // 使用全域的 PDO 資料庫連線物件

    // 如果 $id 是陣列（表示使用多個欄位條件查詢）
    if(is_array($id)){
        // 將陣列轉為 SQL 條件格式，例如：['name' => 'John', 'age' => 18] → ["`name`='John'", "`age`=18"]
        $tmp = array2sql($id);

        // 組合成 SELECT 查詢語法，條件用 AND 串接
        $sql = "SELECT * FROM $table WHERE " . join(" AND ", $tmp);
    } else {
        // 否則假設是主鍵 id 值，直接查詢該筆
        $sql = "SELECT * FROM $table WHERE id='$id'";
    }

    // 可開啟下行來除錯 SQL：
    // echo $sql;

    // 執行 SQL 查詢，取出一筆資料（以關聯陣列回傳）
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

/* 更新
update($table, $data)
$table: 資料表名稱 (string)
$data: 欲更新的資料陣列，必須包含id欄位 (array)
回傳: 執行結果 (成功筆數)
*/
function update($table,$data){
    global $pdo;
    $tmp=array2sql($data);

    $sql="UPDATE $table SET ".join(" , ",$tmp)."
                      WHERE id='{$data['id']}'";
    
     echo $sql;
    return $pdo->exec($sql);

}

/*新增
insert($table, $data)
$table: 資料表名稱 (string)
$data: 欲新增的資料陣列 (array)
回傳: 執行結果 (成功筆數)
*/
function insert($table,$data){
    global $pdo;
    $keys=array_keys($data);

    $sql="INSERT INTO $table (`".join("`,`",$keys)."`) values('".join("','",$data)."');";
    echo $sql;
    return $pdo->exec($sql);
}

/*儲存
save($table, $data)
$table: 資料表名稱 (string)
$data: 欲儲存的資料陣列 (array)
功能: 若$data有id欄位則執行update，否則執行insert
*/
function save($table,$data){
    if(isset($data['id'])){
        update($table,$data);
    }else{
        insert($table,$data);
    }
}

/* 刪除
del($table, $id)
$table: 資料表名稱 (string)
$id: 主鍵值或條件陣列 (int|string|array)
    - 若為陣列，則產生多條件刪除
    - 若為單一值，則以id欄位刪除
回傳: 執行結果 (成功筆數)
*/
function del($table,$id){
    global $pdo;
    $sql="DELETE FROM $table WHERE ";
    if(is_array($id)){
        $tmp=array2sql($id);
        $sql .= join(" AND ",$tmp);
    }else{
        $sql .= "id='$id'";
    }

    //echo  $sql;

    return $pdo->exec($sql);
}

/*
array2sql($array)
$array: 欲轉換的條件或資料陣列 (array)
回傳: 轉換成SQL語法片段的陣列 (array)
*/
function array2sql($array){
    $tmp=[];
    foreach($array as $key=>$value){
        $tmp[]="`$key`='$value'";
    }

    return $tmp;
}


/*
q($sql)
$sql: 欲執行的SQL語法 (string)
回傳: 查詢結果的關聯式陣列
*/
function q($sql){
    global $pdo;

    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    
}