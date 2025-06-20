<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>物件導向基本程式</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <h1>物件導向基本程式</h1>



    <?php
    //類別
    class Person
    {
        /**
         * public: 公開的屬性，可以在任何地方訪問。
         * private: 私有的屬性，只能在類(物件)內部訪問。
         * protected: 受保護的屬性，只能在類(物入)內部或子類中訪問。
         * 
         */

        // 成員,屬性
        // public $name;
        // public $age;
        protected $name;
        protected $age;

        //方法,行為,建構函式 優先執行
        public function __construct($name, $age)
        {
            $this->name = $name;
            $this->age = $age;
        }

        //方法
        public function greet()
        {
            echo "Hello, my name is {$this->name} and I am {$this->age} year old.";
        }

        public function getName()
        {
            return $this->name;
        }
        public function getAge()
        {
            return $this->age;
        }
        public function setName($name)
        {
            $this->name = $name;
        }
        public function setAge($age)
        {
            $this->age = $age;
        }
    }
    $jason = new Person('jason', 18);
    echo "name: " . $jason->getName();
    echo "<br>";
    echo "age: " . $jason->getAge();
    echo "<br>";
    echo $jason->greet();
    echo "<hr>";

    // echo "不要直接改變數屬性 錯誤示範";
    // $jason->name = "Mary";
    // $jason->age = 20;
    // echo "name: " . $jason->name;
    // echo "<br>";
    // echo "age: " . $jason->age;
    // echo "<br>";
    // echo $jason->greet();
    // echo "<hr>";

    $jason->setName('Mary');
    $jason->setAge(20);
    echo "name: " . $jason->getName();
    echo "<br>";
    echo "age: " . $jason->getAge();
    echo "<br>";
    echo $jason->greet();
    echo "<hr>";
    ?>

    <h1>物件導向三大特性</h1>
    <h2>繼承</h2>
    <?php

    //繼承了上面類別class的Person
    class Man extends Person
    {
        private $gender = '男性';

        function getGender()
        {
            return $this->gender;
        }
    }
    class WoMan extends Person
    {
        private $gender = '女性';

        function getGender()
        {
            return $this->gender;
        }
    }
    $man = new Man('Jhon', 25);
    echo "name: " . $man->getName();
    echo "<br>";
    echo "gender: " . $man->getGender();
    echo "<br>";
    $man->greet();

    $woman = new Woman('Jane', 22);
    echo $woman->getName();
    echo "<br>";
    echo $woman->getGender();
    echo "<br>";
    $woman->greet();
    ?>
    <hr>
    <h2>封裝</h2>



    <hr>
    <h2>多型</h2>

</body>

</html>