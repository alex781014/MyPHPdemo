<?php
session_start(); //啟用 session 請使用 session_start() 函數，而且必須放在程式的最開頭，還沒輸出任何東西之前，否則會出錯唷！
$_SESSION["UserName"] = 'Jordan';   //設定 session 的變數值很簡單，直接給値就可以了，用法就像 $_SESSION[' 變數 '] = 値。
//簡單來說就是設定了一個變數 UserName 的値是 Jordan，你可以解讀為會員名稱是 Jordan。
echo $_SESSION['UserName'];
