<?php
// header('Content-Type: text/plain'); // 設定檔頭, 告訴用戶端內容為純文字

$ar = [
    'name' => '小新',
    'age' => 27,
    'data' => [1, 3, 5],
    'skill' => 'JaveScript',
    'skill2' => 'PHP',
    'skill3' => 'React',
    'skill4' => 'Node.js',
    'skill5' => 'RestforAPI',
    'skill6' => 'TypeScript',
    'skill7' => 'English'
];

// is_array() 判斷是不是陣列
// implode(), 陣列接成字串 = JS的join();因為要有,號所以就不加雙引號
foreach ($ar as $k => &$v) { // 加上&$v 也可以變成設定參照 
    if (is_array($v)) {
        $v = implode(',', $v);
    }
    echo "$k :  $v<br>";
}
