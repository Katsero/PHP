<?php
$string = 'aaa * bbb ** eee * **';
$reg = '/(?<!\*)\*(?!\*)/';
$result = preg_replace($reg,'!',$string);
var_dump($result)
?>