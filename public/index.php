<?php

require_once __DIR__ . '/../vendor/autoload.php';

// Routing
$page = 'home';
$page = 'articles';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

// Return content from database
function articles() {
    $pdo = new PDO('mysql:dbname=corenthin_projet5;host=localhost', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $articles = $pdo->query('SELECT * FROM article ORDER BY id DESC');
    return $articles;
}

// Rendering template
$loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
$twig = new Twig\Environment($loader, [
    'cache' => false, __DIR__ . '/tmp'
]);

switch ($page) {
    case 'home':
        echo $twig->render('home.html.twig');
        break;
    case 'articles':
        echo $twig->render('articles/articles.html.twig', ['articles' => articles()]);
        break;
    default:
        header('HTTP/1.0 404 Not found');
        echo $twig->render('404.html.twig');
        break;
}