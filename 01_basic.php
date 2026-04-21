<?php

$a=10;
$b=50;
echo 'a='.$a.'<br>';
echo 'b='.$b.'<br>';

$c=$a;
$a=$b;
$b=$c;

echo "經交換後：<br>";
echo 'a='.$a.'<br>';
echo 'b='.$b.'<br>';

?>