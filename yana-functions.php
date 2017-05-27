<?php

function compare ($a)
{
    if ($a[0] > $a[1]) {
        return 1;
    }
    if ($a[0] < $a[1]) {
        return -1;
    }
    if ($a[0] == $a[1]) {
        return 0;
    }
}