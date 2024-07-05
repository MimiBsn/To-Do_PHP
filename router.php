<?php

require 'config.php';
require './src/controller/TodoController.php';

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$controller = new TodoController();


switch($requestUri) {
    case '/':
        $controller->showTodos();
        break;
    case '/create':
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->createTodo($_POST);
        } else {
            $controller->showCreateForm();
        }
        break;
    case '/delete':
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            $controller->deleteTodo($_GET['id']);
        } else {
            echo "<alert class=\"alert\">The file doesn't exist</alert>";
        }
        break;
    case '/update':
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->updateTodo($_POST);
        } else {
            $controller->showUpdateForm($_GET['id']);
        }
        break;
    default:
        http_response_code(404);
        echo 'Page not found';
        break;
}
