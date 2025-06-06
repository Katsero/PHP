<?php
$string = 'aAXa aeffa aGha aza ax23a a3sSa';
$reg = '/a[a-z]+a/';
preg_match_all($reg,$string,$matches);
var_dump($matches)
?>