<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $array_count_values = ['a', 'b', 'c', 'b', 'a'];
        foreach ($array_count_values as $letter) {
            $new_array = array_count_values($array_count_values);
        }
        var_dump($new_array);
    ?>
</body>
</html>