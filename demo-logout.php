<?php
session_start();
//unset通常是用來清除陣列裡的某一個元素 通常是關聯式陣列 
unset($_SESSION['user']); //移除'user'對應的值


//直接設定檔頭讓他轉向
header('Location: demo-login02.php');//'Location: '轉向 redirect