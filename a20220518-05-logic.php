<?php

echo (5 && 7) ? 'yes<br>' : 'no<br>';  //&& PHP的邏輯運算子結果一定是布林值

$a = 5 || 7;  //5是看成TURE 7也是 

// echo $a ? '$a=true<br>' : '$a=false<br>';

$b = 5 or 7; // and, or 優先權比 = 還低  所以 $b = 5 $b已經被設定成五了 7就沒作用 所以b=5

// echo "\$b=$b<br>";
$c = (5 or 7);  //包起來變成邏輯運算子 會回傳布林值 所以便1

echo "\$c=$c<br>";

var_dump($a);
var_dump($b);
var_dump($c);
