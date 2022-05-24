<div>
    <?php require __DIR__ . '/parts/connect_db.php';
    //exit; //關閉功能
    //亂數資料 05/24 02:04
    echo microtime(true) . "<br>";

    $lname = ['陳', '林', '李', '吳', '王'];
    $fname = ['小明', '小華', '雅玲', '怡君', '大頭'];



    //放資料都是這個樣子
    $sql = "INSERT INTO `address_book`(
     `name`, `email`, `mobile`, `birthday`, `address`, `created_at`
    ) VALUES (
        ?,?,?,?,?,NOW()   
    )";



    $stmt = $pdo->prepare($sql); //像是placeholder 佔位  //外來資料一律用perpare +execute


    for ($i = 0; $i < 1000; $i++) {
        shuffle($lname);
        shuffle($fname);
        $ts = rand(strtotime('1980-01-01'), strtotime('1995-12-31'));
        $stmt->execute([   //每次execute執行就是新增一筆
            $lname[0] . $fname[0],
            "ming{$i}@test.com",
            '0918' . rand(10000, 999999),
            date('Y-m-d', $ts),
            '南投市'
        ]);
    }

    echo microtime(true) . "<br>";
    ?>
</div>