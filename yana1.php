<?php

include "yana-functions.php";

$pairs = [[3,4], [5,6], [8,7], [10,10]];

foreach ($pairs as $pair)  {
    echo compare($pair),"\n";
}

for ($i=0; $i < count($pairs); $i++) {
    echo compare($pairs[$i]),"\n";
}

$w=0;
while ($w < count($pairs)) {
    echo compare($pairs[$w]),"\n";
    $w++;
}







