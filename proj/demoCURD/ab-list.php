<?php require __DIR__ . '/parts/connect_db.php';
//  ↑↑連資料庫  MVC的 M跟C 寫在這裡 再html出現之前
$perPage = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; //頁碼

if ($page < 1) {
    header('Location: ?page=1');
    exit;
}

$t_sql = "SELECT COUNT(1)  FROM address_book"; //這拿出來只有一筆 欄位名稱叫COUNT(1)
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; //用索引式陣列抓出總筆數 因為t_sql的COUNT(1)只會有一欄 那欄裡面就是總比數用索引式陣列[0]抓出

$totalPages = ceil($totalRows / $perPage); //ceil無條件進位  總共有幾頁


$rows = []; //相當於預設值，如果沒有進到下面if就是空陣列
if (!empty($totalPages)) {  //如果有資料才往下走
    if ($page > $totalPages) {   //如果最大頁數大於總頁數，轉向在?page=$totalPages 記得雙引號才能塞變數 
        header("Location: ?page=$totalPages");
        exit;
    }
    $sql = sprintf("SELECT * FROM address_book LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll(); //query後會拿到PDOStatement($stmt)... 然後用->fetchAll() 的方法  記得!!這樣是陣列

}






?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<!-- ↑↑ html開始 -->


<?php include __DIR__ . '/parts/navbar.php' ?>

<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link " href="?page=<?= $page - 1 ?>">Previous</a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                        <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                            <a class="page-link " href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link " href="?page=<?= $page + 1 ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>







    <table class="table table-success table-striped">
        <thead>
            <tr>
                <!-- 看資料表內要呈現那些內容 -->
                <th scope="col">#</th>
                <th scope="col">姓名</th>
                <th scope="col">手機</th>
                <th scope="col">電郵</th>
                <th scope="col">生日</th>
                <th scope="col">地址</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r) : ?>
                <!--這個$r代表拿到某一筆  -->
                <!-- 然後欄位對上面資料 -->
                <tr>
                    <td><?= $r['sid'] ?></td>
                    <!--echo出來 這個代表某一筆的PK  以此類推-->
                    <td><?= $r['name'] ?></td>
                    <td><?= $r['mobile'] ?></td>
                    <td><?= $r['email'] ?></td>
                    <td><?= $r['birthday'] ?></td>
                    <td><?= $r['address'] ?></td>

                </tr>
            <?php endforeach; ?>

        </tbody>

    </table>
</div>









<?php include __DIR__ . '/parts/scripts.php' ?>
<?php include __DIR__ . '/parts/html-foot.php' ?>

<!-- 把原本html內容拆拼起來 因為可以直接在中間放標籤 -->