<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <?php
        $not_take_risks = 'Кто не рискует'; 
        $not_drink = 'не пьет'; 
        $ellipsis = '...';

        $proverb = $not_take_risks . ' ' . $ellipsis . ' ' . $not_drink;
        echo($proverb);
    ?>
  </body>
</html>
