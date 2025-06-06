<?php
if (isset($_COOKIE['visit_count'])) {
    $visit_count = intval($_COOKIE['visit_count']) + 1;
} else {
    $visit_count = 1;
}

setcookie('visit_count', $visit_count, time() + 60 * 60 * 24 * 30, '/'); 

echo "Вы посетили наш сайт $visit_count раз!";
?>
