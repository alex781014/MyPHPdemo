<?php
session_start();
//帳密直接寫在程式碼裡面的狀況
$users = [
    'ming' => [
        'password' => '1234',
        'nickname' => '孔明',
    ],
    'sara' => [
        'password' => '5678',
        'nickname' => '一隻一隻棒棒',
    ],
];

$output = [
    'postData' => $_POST,
];


//有沒有account這個欄位 如果有往下做
if (isset($_POST['account'])) {
    //把表單資料show在頁面上
    // echo json_encode($_POST);
    // exit;

    // 看帳號是不是空的 and 密碼不是空的 才要往下比對帳號密碼
    if (!empty($_POST['account']) and !empty($_POST['password'])) {
        //把帳號當作key丟進來 如果不是空值 往下走 
        if (!empty($users[$_POST['account']])) {
            //比對密碼                         JS概念:$user.ming.password 的概念
            if (!empty($_POST['password'] === $users[$_POST['account']]['password'])) {
                //SESSION本身是關聯式陣列 用關聯式的方式給一個key 當作是SESSION的變數 ['user']是自己定義的
                //登入成功的話把資料設定到SESSION裡面
                $_SESSION['user'] = [
                    'account' => $_POST['account'],
                    'nickname' => $users[$_POST['account']]['nickname'],
                ];
            }
        }
    }
    // 這段程式碼代表沒有登入成功 就給錯誤訊息
    if (!isset($_SESSION['user'])) {
        $error_msg = '帳號或密碼錯誤';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isset($_SESSION['user'])) : ?>
        <!-- 有登入就顯示問候語 -->
        <h2><?= $_SESSION['user']['nickname'] ?>您好</h2>
        <p><a href="./demo-logout.php">登出</a></p>
    <?php else : ?>
        <!-- else 如果沒有登入顯示錯誤訊息並顯示表單 -->
        <?php if (isset($error_msg)) : ?>
            <div style="color:red"><?= $error_msg ?></div>
        <?php endif; ?>

        <form method="POST">

            <!-- ?? 的意思 如果左邊是undefind 給右邊空字串     htmlentities($_POST['account'])>>可以將輸出的值做跳脫-->
            <input type="text" name="account" placeholder="帳號" value="<?= isset($_POST['account']) ? htmlentities($_POST['account']) : '' ?>">
            <br>
            <input type="password" name="password" placeholder="密碼">
            <br>
            <button>登入</button>

        </form>
    <?php endif; ?>











</body>

</html>