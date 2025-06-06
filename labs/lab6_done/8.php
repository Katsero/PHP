<?php
if (isset($_COOKIE['test'])) {
    setcookie('test', '', time() - 3600, '/');
    echo "Кука 'test' удалена.";
} else {
    echo "Кука 'test' не найдена.";
}
?>