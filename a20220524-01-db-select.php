<?php

require __DIR__ . '/connect_db.php'; //把某一個檔案包含近來 5/24 0920 require比較強烈 如果沒有就不往下做 較常用
//include __DIR__ . '/connect_db.php'; //功能一樣

$stmt = $pdo->query("SELECT * FROM address_book LIMIT 5"); //當作取資料的代理物件

//$row = $stmt->fetch(); //讀取資料 fetch就是一筆一筆拿
$row = $stmt->fetchAll(PDO::FETCH_NUM); //取出RecoedSet所有資料

//$row = $stmt->fetch(PDO::FETCH_NUM);// PDO::FETCH_NUM 以索引式陣列的格式取的資料

echo json_encode($row);//轉成json字串
