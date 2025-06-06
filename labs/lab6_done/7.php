<?php
if (!isset($_COOKIE['test'])) {
    setcookie('test', '123', time() + 3600, '/');
    echo "Кука 'test' установлена.";
} else {
    echo "Содержимое куки 'test': " . $_COOKIE['test'];
}
?>