<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $array = ['a', '-', 'b', '-', 'c', '-', 'd'];
        $index = array_search('-',$array);
        array_splice($array, $index, $index);
        var_dump($array);
    ?>
</body>
</html>