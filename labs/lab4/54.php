<?php
$string = 'aaboaboabodbfa abababababdosafhasfujhfwi';
$reg = '/a[a-fj-zA-FJ-Z]+a/';
preg_match_all($reg,$string,$matches);
var_dump($matches)
?>