<?php require __DIR__ . '/parts/connect_db.php';
$pageName = 'ab-list';
$title = '通訊錄列表- 小鑫的網站 ';
$perPage = 20; //每一頁有幾筆
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




?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>

<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!-- 如果當前頁數等於第一頁 加上disabled -->
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <!-- 直接到第一頁 -->
                        <a class="page-link " href="?page=1"><i class="fa-solid fa-angles-left"></i></a>
                    </li>
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link " href="?page=<?= $page - 1  ?>"><i class="fa-solid fa-angle-left"></i></a>
                    </li>


                    <!-- 迴圈從$page-5開始 -->
                    <?php for ($i = $page - 5; $i <= $page + 5; $i++) :
                        // 如果$i 大於等於 跟 $i<=最大頁數才執行
                        if ($i >= 1 and $i <= $totalPages) : ?>
                            <!-- 05/24 11:50  如果$page(看到的頁數 等於 $i 加上active  -->
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                    <?php endif;
                    endfor; ?>


                    <!-- 如果當前頁數等於最大頁數 加上disabled -->
                    <li class="page-item <?= $page == $totalPages  ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page + 1  ?>"><i class="fa-solid fa-angle-right"></i></a>
                    </li>
                    <li class="page-item <?= $page == $totalPages  ? 'disabled' : '' ?>">
                        <!-- 直接跳到最後一頁 -->
                        <a class="page-link" href="?page=<?= $totalPages ?>">
                            <i class="fa-solid fa-angles-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col"><i class="fa-solid fa-trash-can"></i></th>
                <th scope="col">#</th>
                <th scope="col">姓名</th>
                <th scope="col">手機</th>
                <th scope="col">電郵</th>
                <th scope="col">生日</th>
                <th scope="col">地址</th>
                <th scope="col"><i class="fa-solid fa-pen-to-square"></i></th>

            </tr>
        </thead>
        <tbody>
            <!-- 05/24 10:55 -->
            <?php foreach ($rows as $r) : ?>
                <tr class="tr">
                    <td>
                        <a href="javascript:" onclick="trashCanClicked(event);return false;">
                            <i class="fa-solid fa-trash-can trash"></i>
                        </a>
                    </td>
                    <td><?= $r['sid']  ?></td>
                    <td><?= $r['name']  ?></td>
                    <td><?= $r['mobile']  ?></td>
                    <td><?= $r['email']  ?></td>
                    <td><?= $r['birthday']  ?></td>
                    <td><?= $r['address']  ?></td>
                    <td>
                        <a href="#"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>

    </table>
</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
    //5/25  10:29   //想辦法用addEventListener;
    function trashCanClicked(event) {
        // console.log(event.currentTarget);
        // console.log(event.target)
        const a_tag = event.currentTarget;
        const tr = a_tag.closest("tr");
        // const tr = event.target.closest("tr");  //自己改的兩個合併 且用event.target就可以達成
        console.log(tr)
        tr.remove() //remove 刪除tr 
    }
</script>
<?php include __DIR__ . '/parts/html-foot.php' ?>