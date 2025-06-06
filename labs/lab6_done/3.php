<?php
session_start();

if (!isset($_SESSION['page_views'])) {
    $_SESSION['page_views'] = 0;
    echo "Вы еще не обновляли страницу.";
} else {
    $_SESSION['page_views']++;
    echo "Количество обновлений страницы: " . $_SESSION['page_views'];
}
?>