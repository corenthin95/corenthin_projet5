<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\config\database;
use App\Controllers\DefaultController;

$pdo = getPdo();

$page = '';

if (!array_key_exists('page', $_GET)) {
    $page = 'home';
} else {
    $page = $_GET['page'];
}

$controller = new DefaultController();

switch ($page) {
    case 'home':
        //TODO
        echo $controller->home();
        break;
    case 'list':
        //TODO
        echo $controller->listArticles();
        break;
    default:
    $response = $controller->notFound();
    break;
}