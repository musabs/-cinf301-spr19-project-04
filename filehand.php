<?php
error_reporting(0);
$p = fopen('test.txt' , 'w');
fseek($p , 5 , SEEK_SET);
fputs($p , 2);fseek($p , 10 , SEEK_SET);fputs($p , 21);fseek($p , 0 , SEEK_SET);
fclose($p);
$p = fopen('test.txt' , 'r');
fseek($p , 5 , SEEK_SET);
$v = fgets($p);
$v = $v + 0;
echo "from dile = ".$v;
fseek($p , 10 , SEEK_SET);
$v = fgets($p);
$v = $v + 1;
echo "from dile aaa = ".$v;
fclose($p);


?>