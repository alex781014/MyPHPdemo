<?php
require __DIR__ . '/parts/connect_db.php';
$output = [
    'success' => false,
    'postData' => $_POST,
    'error' => '',
];



// TODO 欄位檢查 後端的檢查
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
    $_POST['birthday'],
    $_POST['address'],
]);

//看有沒有成功
$output['success'] = $stmt->rowCount() == 1;
if ($stmt->rowCount() == 1) {
    $output['success'] = true;
} else {
    $output['error'] = "資料無法新增";
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
