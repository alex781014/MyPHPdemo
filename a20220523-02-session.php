<?php  //這檔案做讀取
if (!isset($_SESSION)) {  //判斷$_SESSION這個變數如果"沒有"設定 就start() 啟動
    session_start();
}




// if (!isset($_SESSION)) {  //如果沒有啟動的話 就啟動它
//     session_start();
// }
//在不同頁面是可以共享的


echo $_SESSION['a'];


//比較短時間存放資料的方式
//如果過期就會清掉
//這時間不一定通常都是你設定的時間來設定
//長時間就是你可以在php可以存成檔案或是存到資料庫裏面就是關機或是重新啟動都還在