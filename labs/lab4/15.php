<?php
$string = 'a\a abc';
$reg = '/a\\\a/';
$result = preg_replace($reg,'!',$string);
var_dump($result)
?>