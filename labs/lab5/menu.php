<?php
function getMenu() {
    $current = $_GET['page'] ?? 'view';
    $sort = $_GET['sort'] ?? 'default';

    $menu = '<div style="margin-bottom: 1em;">';

    $menu .= '<a href="?page=view" style="color: '.($current == 'view' ? 'red' : 'blue').'; margin-right: 1em;">Просмотр</a>';
    $menu .= '<a href="?page=add" style="color: '.($current == 'add' ? 'red' : 'blue').'; margin-right: 1em;">Добавление записи</a>';
    $menu .= '<a href="?page=edit" style="color: '.($current == 'edit' ? 'red' : 'blue').'; margin-right: 1em;">Редактирование записи</a>';
    $menu .= '<a href="?page=delete" style="color: '.($current == 'delete' ? 'red' : 'blue').';">Удаление записи</a>';

    if ($current == 'view') {
        $menu .= '<div style="margin-top: 0.5em;">';
        $menu .= '<a href="?page=view&sort=default" style="font-size: 0.9em; color: '.($sort == 'default' ? 'red' : 'blue').'; margin-right: 0.5em;">По порядку</a>';
        $menu .= '<a href="?page=view&sort=surname" style="font-size: 0.9em; color: '.($sort == 'surname' ? 'red' : 'blue').'; margin-right: 0.5em;">По фамилии</a>';
        $menu .= '<a href="?page=view&sort=birthdate" style="font-size: 0.9em; color: '.($sort == 'birthdate' ? 'red' : 'blue').';">По дате рождения</a>';
        $menu .= '</div>';
    }

    $menu .= '</div>';
    return $menu;
}
?>