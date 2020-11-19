<!-- Write your routes code here. -->
<?php
require 'PersonController.php';

$controller = new PersonController;

$action = $_GET['action'];

switch ($action) {
    case 'create':
        $controller->create($_POST);
        break;
    case 'update':
        $controller->update($_POST);
        break;
    case 'delete':
        $controller->delete($_POST);
        break;

    default:
        header('Location: views/index.php');
        exit();
}