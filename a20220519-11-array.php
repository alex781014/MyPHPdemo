<?php
// header('Content-Type: text/plain'); // 設定檔頭, 告訴用戶端內容為純文字

$ar = [];

for ($i = 1; $i < 10; $i++) {
    $ar[] = rand(1, 99);
}

foreach ($ar as $v) { //要一個一個抓出來用 用foreach( as )
    echo "$v<br>";
}

// foreach ($ar as $v) {
//     echo " $v<br>";
// }
