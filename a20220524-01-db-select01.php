<?php
require __DIR__ . '/connect_db.php'; //相當於把/connect_db.php的內容包含進來
//要熟悉PDO 跟PDOStatement
//已經決定了連到哪個資料庫 所以下SQL語法   LIMIT 5 :取前面的5筆 如果兩個值 0,5 第一個值是索引 第二是值是最多取幾筆
$stmt = $pdo->query("SELECT * FROM address_book LIMIT 5"); //靠query執行SQL語法 當作取資料的代理物件
$row = $stmt->fetch(PDO::FETCH_NUM); //透過fetch去讀取資料 但只會讀到一筆 實際上是一個陣列 PDO::FETCH_NUM 以索引式陣列的格式取的資料

$rows = $stmt->fetchAll(); //取出RecordSet 所有資料 RecordSet是指你查詢出來的所有結果

echo json_encode($row); //轉成json字串 



/*require __DIR__ . '/connect_db.php'; //把某一個檔案包含近來 5/24 0920 require比較強烈 如果沒有就不往下做 較常用
//include __DIR__ . '/connect_db.php'; //功能一樣

$stmt = $pdo->query("SELECT * FROM address_book LIMIT 5"); //當作取資料的代理物件

//$row = $stmt->fetch(); //讀取資料 fetch就是一筆一筆拿
$row = $stmt->fetchAll(PDO::FETCH_NUM); //取出RecoedSet所有資料

//$row = $stmt->fetch(PDO::FETCH_NUM);// PDO::FETCH_NUM 以索引式陣列的格式取的資料

echo json_encode($row);//轉成json字串 
*/