<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Application;
use App\Application\Http;

session_start();

$request = Request::fromGlobals();
$application = new Application();

echo $application->run($request);






// use DI\ContainerBuilder;
// use GuzzleHttp\Psr7\ServerRequest;

// $modules = [
//   App\Blog\BlogModule::class
// ];

// $builder = new ContainerBuilder();
// $builder->addDefinitions(dirname(__DIR__) . '/config/config.php');
// foreach ($modules as $module) {
//   if ($module::DEFINITIONS) {
//     $builder->addDefinitions($module::DEFINITIONS);
//   }
// }
// $builder->addDefinitions(dirname(__DIR__) . '/config.php');
// $container = $builder->build();

// $app = new App\Router\App($container, $modules);

// $response = $app->run(ServerRequest::fromGlobals());
// echo $response->getBody();



// Return content from database
// function articles() {
//     $pdo = new PDO('mysql:dbname=corenthin_projet5;host=localhost', 'root', '');
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
//     $articles = $pdo->query('SELECT * FROM article ORDER BY id DESC');
//     return $articles;  
// }

// Rendering template
/*
$loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
$twig = new Twig\Environment($loader, [
    'cache' => false, __DIR__ . '/tmp'
]);

$twig->addExtension(new StringExtension());
*/


// Routing
//$page = 'home';
//$page = 'articles';
//$page = 'login';
//$page = 'register';
//$page = 'addArticles';
//if (isset($_GET['page'])) {
   // $page = $_GET['page'];
//} 


//switch ($page) {
 //   case 'home':
   //     echo $twig->render('home.html.twig');
    //    break;
    //case 'articles':
      //  echo $twig->render('articles/listArticles.html.twig', ['articles' => articles()]);
        //break;
    //case 'login':
      //  echo $twig->render('login.html.twig');
        //break;
    //case 'register':
      //  echo $twig->render('register.html.twig');
       // break;
    //case 'addArticles':
      //  echo $twig->render('articles/addArticles.html.twig');
        //break;
    //default:
      //  header('HTTP/1.0 404 Not found');
       // echo $twig->render('404.html.twig');
        //break;
//}