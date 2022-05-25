<?php
require __DIR__ . '/parts/connect_db.php';
header('Content-Type: application/json');
$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 200,
    'error' => '',
];




// TODO 欄位檢查 後端的檢查
if (empty($_POST['name'])) {
    $output['error'] = "沒有姓名資料";
    $output['code'] = 404;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$name = $_POST['name'];
$email = $_POST['email'] ?? '';   //  ?? ''>>>要前面是undefind才丟後面的空字串 
$mobile = $_POST['mobile'] ?? '';
$birthday = empty($_POST['birthday']) ? NULL : $_POST['birthday'];
$address = $_POST['address'] ?? '';
//如果email不是空字串要檢查格式 跟 不符合格式的話 跳錯誤
// 要檢查email 下這個 固定的常數>>>FILTER_VALIDATE_EMAIL   如果不是會回傳false 如果是會回傳篩選後的值
if (!empty($email) and filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $output['error'] = "email 格式錯誤";
    $output['code'] = 40;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
//TODO:其他欄位檢查




//SQL語法   
$sql = "INSERT INTO `address_book`(
     `name`, `email`, `mobile`,
     `birthday`, `address`, `created_at`
    ) VALUES (
        ?,?,?,
        ?,?,NOW()
    )";

$stmt = $pdo->prepare($sql); //建立一個代理物件執行SQL語法
$stmt->execute([    //每次用execute括號內記得先給中括號
    $_POST['name'],
    $_POST['email'],
    $_POST['mobile'],
    empty($_POST['birthday']) ? NULL : $_POST['birthday'],
    $_POST['address'],
]);

//看有沒有成功
$output['success'] = $stmt->rowCount() == 1;
if ($stmt->rowCount() == 1) {
    $output['success'] = true;
    //最近新增資料的 primery key
    $output['lastInsertId'] = $pdo->lastInsertId();
} else {
    $output['error'] = "資料無法新增";
}
//isset() 有沒有設定 有用=號設定的都算
//empty() 我不管你有沒有設定 是空的就是拿到true

//0525 0935看一下這段
echo json_encode($output, JSON_UNESCAPED_UNICODE);
