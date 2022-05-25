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
                //登入成功
                $output['msg'] = '登入成功';
                echo json_encode($output);
                exit;
            } else {
                //帳號對，密碼錯
                $output['msg'] = '帳號對，密碼錯';
                echo json_encode($output);
                exit;
            }
        } else {
            //如果都有值，但是對不到 帳號錯誤
            $output['msg'] = '帳號錯誤';
            echo json_encode($output);
            exit;
        }
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
    <form method="POST">
        <input type="text" name="account" placeholder="帳號">
        <br>
        <input type="password" name="password" placeholder="密碼">
        <br>
        <button>登入</button>

    </form>










</body>

</html>