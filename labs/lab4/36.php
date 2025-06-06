<?php
$string = '23 2+3 2++3 2+++3 345 567';
$reg = '/2\++3/';
preg_match_all($reg,$string,$matches);
var_dump($matches)
?>