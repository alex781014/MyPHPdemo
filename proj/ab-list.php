<?php require __DIR__ . '/parts/connect_db.php';
$perPage = 5; //每一頁有幾筆
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

$sql = sprintf("SELECT * FROM address_book LIMIT %s,%s", ($page - 1) * $perPage, $perPage); //0524 11:13
//這裡是後端程式邏輯
//把VIEW分開
$rows = $pdo->query($sql)->fetchAll();


?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>

<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link " href="?page=<?= $page - 1  ?>">Previous</a>
                    </li>
                    <!-- 跑迴圈 資料有幾筆跑幾次 等於li跑6次 -->
                    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                        <!-- 05/24 11:50  如果$page(看到的頁數 等於 $i 加上active  -->
                        <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?= $page == $totalPages  ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page + 1  ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">姓名</th>
                <th scope="col">手機</th>
                <th scope="col">電郵</th>
                <th scope="col">生日</th>
                <th scope="col">地址</th>
            </tr>
        </thead>
        <tbody>
            <!-- 05/24 10:55 -->
            <?php foreach ($rows as $r) : ?>
                <tr>
                    <td><?= $r['sid']  ?></td>
                    <td><?= $r['name']  ?></td>
                    <td><?= $r['mobile']  ?></td>
                    <td><?= $r['email']  ?></td>
                    <td><?= $r['birthday']  ?></td>
                    <td><?= $r['address']  ?></td>
                </tr>
            <?php endforeach; ?>

        </tbody>

    </table>
</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<?php include __DIR__ . '/parts/html-foot.php' ?>