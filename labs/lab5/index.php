<?php
require 'config.php';
require 'menu.php';
require 'viewer.php';
require 'add.php';
require 'edit.php';
require 'delete.php';

$page = $_GET['page'] ?? 'view';
$sort = $_GET['sort'] ?? 'default';
$pagenum = isset($_GET['pagenum']) ? max(1, intval($_GET['pagenum'])) : 1;

echo getMenu();

switch ($page) {
    case 'add':
        echo showAddForm();
        break;
    case 'edit':
        echo showEditForm();
        break;
    case 'delete':
        echo showDeletePage();
        break;
    default:
        echo showContacts($sort, $pagenum);
}
?>