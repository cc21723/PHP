<?php

// 自訂 SQL 查詢
function q($sql)
{
    $dsn = "mysql:host=localhost;dbname=store;charset=utf8";
    $pdo = new PDO($dsn, 'root', '');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

// 除錯用：美化輸出
function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

class DB
{
    protected $pdo;
    protected $table;
    protected $dsn = "mysql:host=localhost;dbname=store;charset=utf8";

    // 建構子：初始化 PDO 連線並設定資料表名稱
    public function __construct($table)
    {
        $this->pdo = new PDO($this->dsn, 'root', '');
        $this->table = $table;
    }

    // 查詢全部資料，支援條件與額外 SQL 子句
    public function all($array = null, $str = null)
    {
        $sql = "SELECT * FROM {$this->table}";
        if (is_array($array)) {
            $sql .= " WHERE " . join(" AND ", $this->array2sql($array));
        } elseif (!is_null($array)) {
            $sql .= " " . $array;
        }

        if (!is_null($str)) {
            $sql .= " " . $str;
        }

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // 查詢單筆資料（依條件或 ID）
    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE ";
        if (is_array($id)) {
            $sql .= join(" AND ", $this->array2sql($id));
        } else {
            $sql .= "id = '$id'";
        }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    // 新增資料
    public function insert($data)
    {
        $cols = implode("`,`", array_keys($data));
        $vals = implode("','", $data);
        $sql = "INSERT INTO {$this->table} (`$cols`) VALUES ('$vals')";
        return $this->pdo->exec($sql);
    }

    // 更新資料（需含 id）
    public function update($data)
    {
        $id = $data['id'];
        unset($data['id']);
        $set = join(", ", $this->array2sql($data));
        $sql = "UPDATE {$this->table} SET $set WHERE id = '$id'";
        return $this->pdo->exec($sql);
    }

    // 儲存：有 id 則更新，否則新增
    public function save($data)
    {
        return isset($data['id']) ? $this->update($data) : $this->insert($data);
    }

    // 刪除資料
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE ";
        if (is_array($id)) {
            $sql .= join(" AND ", $this->array2sql($id));
        } else {
            $sql .= "id = '$id'";
        }

        return $this->pdo->exec($sql);
    }

    //只有內部可以使用
    // 輔助：將陣列轉為 SQL 欄位格式
    private function array2sql($array)
    {
        $tmp = [];
        foreach ($array as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        return $tmp;
    }
}



$Item = new DB('items');
$Sales = new DB('sales');

// 全域呼叫（錯誤，因為沒有定義全域函式 dd()）
// 錯誤：試圖呼叫不存在的全域函式 dd()
dd($Item->all());

// 使用類別內的方法（透過物件呼叫成員方法）
// 正確：透過物件呼叫 DB 類別中的 dd 方法
// $Item->dd($Item->all());

// ✅ 若 dd() 為靜態方法（static），可這樣呼叫：
// DB::dd($Item->all());

dd($Item->find(4));
// dd($Sales->save(['item_id'=>3,'quantity'=>2,'no'=>1015]));
dd($Item->save(['name'=>'大腸麵線','cost'=>25,'stock'=>50,'price'=>55]));
