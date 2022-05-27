<?php require __DIR__ . '/parts/connect_db.php';
/*
$sql = "INSERT INTO `address_book`(
     `name`, `email`, `mobile`, `birthday`, `address`, `created_at`)
 VALUES (
     '胡盟鑫','alex781014@gmail.com','0918123456',
     '1989-10-14','新北市',NOW()
     )";

$stmt = $pdo->query($sql);
*/
// INSERT INTO 是新增語法
$sql = "INSERT INTO `address_book`(  
     `name`, `email`, `mobile`, `birthday`, `address`, `created_at`)
 VALUES (
     ?,?,?,
     ?,?,NOW()
     )";

$stmt = $pdo->prepare($sql);
$stmt->execute([            //執行
    '胡盟鑫',
    'alex781014@gmail.com', 
    '0918123456',
    '1989-10-14', 
    '新北市',
]);





echo $stmt->rowCount();//會拿到新增的筆數是多少 有新增是1沒有是0 