<?php
$string = 'hello.my-site.com';
$reg = '/^(([^\W_]|-)+)\.(?1)\.(?1)$/';
preg_match($reg, $string,$matches);
var_dump($matches)
?>