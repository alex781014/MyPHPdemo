<?php require __DIR__ . '/parts/connect_db.php';
$pageName = 'ab-list';
$title = '通訊錄列表- 小鑫的網站 ';
$perPage = 20; // 每一頁有幾筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; //intval 取整數 //11:33同樣問題 ['page'] 是自己設定 因為querystring 取得都是字串
if ($page < 1) {
    header('Location: ?page=1'); //如果$page<1 就轉向 
    exit;
}

//先算總共有幾筆再算總共有幾頁
$t_sql = "SELECT COUNT(1) FROM address_book";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; //索引式陣列 //總筆數

//echo $totalRows;exit;
$totalPages = ceil($totalRows / $perPage); //總共有幾頁 總筆數/有幾筆 ceil()無條件進位 


$rows = []; //先給預設值 不然如果沒有資料下面都會出錯?? 05/24 12:00

// 有資料才做下面的事情
if ($totalRows > 0) {
    if ($page > $totalPages) {    //如果查看頁數大於總頁數
        header("Location: ?page=$totalPages");  //我就轉向到最大頁數
        exit;
    }

    $sql = sprintf("SELECT * FROM address_book ORDER BY sid DESC LIMIT %s,%s", ($page - 1) * $perPage, $perPage); //0524 11:13
    //這裡是後端程式邏輯
    //把VIEW分開
    $rows = $pdo->query($sql)->fetchAll();
}
$output = [
    'perPage' => $perPage,
    'page' => $page,
    'totalRows' => $totalRows,
    'totalPages' => $totalPages,
    'rows' => $rows
];

echo json_encode($output, JSON_UNESCAPED_UNICODE);
