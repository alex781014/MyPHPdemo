<?php

$a = isset($_GET['a']) ? $_GET['a'] : 0;  //isset去判斷時候不會跳任何notice
$b = isset($_GET['b']) ? $_GET['b'] : 0;  //isset會很常用 因為它變數不需要宣告
var_dump($a);
var_dump($b);
