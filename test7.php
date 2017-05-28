<?php

function my_sort($a)
{
    for ($i = 0; $i <= count($a) - 2; $i++ ) {
       $min = $a[$i];
       $key = $i;
       for ($j = $i+1; $j <= count($a)-1; $j++) {
            if ($a[$j] < $min) {
                $min = $a[$j];
                $key = $j;
            }
       }
       $t = $a[$i];
       $a[$i] = $a[$key];
       $a[$key] = $t;
    }   

    return $a;
}


function my_sort1($a)
{
    $b = [];
    while (count($a) > 0) {
        $min = 0;
        $key = -1;
        foreach ($a as $k => $i) {
            if (($i < $min) || ($key == -1)) {
                $min = $i;
                $key = $k;
            }
        }
        $b[] = $min;
        unset($a[$key]);
    }
    return $b;    
}

$a = [12,13,5,7,21,10,2,5,30,12,34,100,4,2];

$a = my_sort1($a);

$s = "";
foreach ($a as $i) {
    $s .= $i . ",";
}
$s = substr($s,0,strlen($s) - 1) . "\n";
echo $s;


