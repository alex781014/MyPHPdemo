<?php

// 
setcookie('mycookie', 'abcd', time() + 3);

// 讀取
echo $_COOKIE['mycookie'];
