<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Application;
use App\Application\Http\Request;
use App\Helpers\CsrfTokenGenerator;

session_start();

CsrfTokenGenerator::generateToken();

$request = Request::fromGlobals();
$application = new Application();

echo $application->run($request);