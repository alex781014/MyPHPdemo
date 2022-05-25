<?php require __DIR__ . '/parts/connect_db.php';
//  ↑↑連資料庫  MVC的 M跟C 寫在這裡 再html出現之前
$rows = $pdo->query("SELECT * FROM address_book LIMIT 5 ")->fetchAll(); //query後會拿到PDOStatement($stmt)... 然後用->fetchAll() 的方法  記得!!這樣是陣列




?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<!-- ↑↑ html開始 -->


<?php include __DIR__ . '/parts/navbar.php' ?>

<div class="container">
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