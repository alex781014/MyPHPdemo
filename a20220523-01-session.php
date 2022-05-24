<?php  //這檔案做設定
session_start(); //規定要放在HTML 內容出現之前
// 為了設定cookie 

if (!isset($_SESSION['a'])) {  //如果沒有設定的話
    $_SESSION['a']  = 0;
}
$_SESSION['a']++;    //$_SESSION本身就是一個陣列  //設定 session 的變數值

echo $_SESSION['a'];
