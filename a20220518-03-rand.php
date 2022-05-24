<?php

echo getrandmax() . "<br>"; // 2147483647
echo rand() . "<br>";
echo rand(1, 6) . "<br>";
echo rand(0, 16777215) . "<br>";
$c = rand(0, 16777215); // true colors

printf("#%'06X<br>", $c); // #00ABCD

?>
<!-- 這也是註解; -->

<?php
$c = rand(0, 999999);
printf("%'06d", $c);
//    外面要雙括號 %0是要補0  6是要補幾位 X是因為要16進位 
?>