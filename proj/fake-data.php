<?php require __DIR__ . '/parts/connect_db.php';
// 05/24 0135 新增資料
//sql語法 放在PHP裡面執行  但平常不是用這種方式 資料會外來就不要這樣用
/*
$sql = "INSERT INTO `address_book`(
     `name`, `email`, `mobile`, `birthday`, `address`, `created_at`
    ) VALUES (
        '李小明','ming@test.com','0918123456','1987-11-23','南投市',NOW()   
    )"; //sql通常用雙引號飆起來 因為裡面的值是單引號  NOW()是sql的函式


$stmt = $pdo->query($sql);  //取資料的代理物件  query是直接執行sql語法

*/
//避免 SQL injection (SQL隱碼攻擊)
$sql = "INSERT INTO `address_book`(
     `name`, `email`, `mobile`, `birthday`, `address`, `created_at`
    ) VALUES (
        ?,?,?,?,?,NOW()   
    )";



$stmt = $pdo->prepare($sql); //像是placeholder 佔位  //外來資料一律用perpare +execute
$stmt->execute([   //這裡才是真的執行
    "李小明's pen",
    'ming@test.com',
    '0918123456',
    '1987-11-23',
    '南投市'
]);
echo $stmt->rowCount(); //我現在新增的筆數是多少
