<?php

require __DIR__ . '/connect_db.php'; //把某一個檔案包含近來 5/24 0920 require比較強烈 如果沒有就不往下做 較常用
//include __DIR__ . '/connect_db.php'; //功能一樣

$stmt = $pdo->query("SELECT * FROM address_book LIMIT 5");

//5/24 10:02
while ($r = $stmt->fetch()) {   //$stmt->fetch()會把這結果設定給$r拿到就是陣列 陣列再轉換成布林值就會看成true  //先執行這邊  判斷這個條件式 先執行一次在echo出來 以此類推 
    echo "{$r['name']} <br>";   //只輸出名子['name']
}
