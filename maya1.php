<?php
function print_names($f_names, $l_names)
{
	$s = "";
	foreach ($f_names as $key => $first_name) {
	 	$s .= $f_names[$key] . " " . $l_names[$key] . "\n";
	}
 	return $s;
}





$first_names = ["Asen", "Nikola", "Stoyan"];
$last_names = ["Ivanov", "Nikolov", "Stoyanov"];
echo print_names($first_names, $last_names);