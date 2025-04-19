<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $array = [[[1, 2], [3, 4]], [[5, 6], [7, 8]]];
        $sum = 0;
        foreach ($array as $subarray) {
            foreach ($subarray as $line) {
                foreach ($line as $number) {
                    $sum += $number;
                }
            }
        }
        echo($sum);
    ?>
</body>
</html>