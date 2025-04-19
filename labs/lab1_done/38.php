<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <?php
        $a = 7;
        $b = '8';

        echo(++$a > --$b ? $a : $b);
    ?>
  </body>
</html>
