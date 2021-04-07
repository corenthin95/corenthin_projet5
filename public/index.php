<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Twig\Extra\String\StringExtension;


$app = new App\Controllers\App();

/* $response = $app->run(\GuzzleHttp\Psr7\ServerRequest::fromGlobals());

$responseHttp = new App\Controllers\Application\Http\ResponseHttpObject();

echo $responseHttp->send(); */


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

$twig->addExtension(new StringExtension());


// Routing
$page = 'home';
$page = 'articles';
$page = 'login';
$page = 'register';
$page = 'addArticles';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

switch ($page) {
    case 'home':
        echo $twig->render('home.html.twig');
        break;
    case 'articles':
        echo $twig->render('articles/listArticles.html.twig', ['articles' => articles()]);
        break;
    case 'login':
        echo $twig->render('login.html.twig');
        break;
    case 'register':
        echo $twig->render('register.html.twig');
        break;
    case 'addArticles':
        echo $twig->render('articles/addArticles.html.twig');
        break;
    default:
        header('HTTP/1.0 404 Not found');
        echo $twig->render('404.html.twig');
        break;
}