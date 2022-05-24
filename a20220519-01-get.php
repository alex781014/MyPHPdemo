<?php

$a = isset($_GET['a']) ? $_GET['a'] : 0;
$b = isset($_GET['b']) ? $_GET['b'] : 0;
// sleep(10);//暫停10秒
echo $a + $b;
