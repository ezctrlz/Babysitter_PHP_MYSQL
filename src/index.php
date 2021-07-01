<?php
// error_reporting(E_ALL);

$config = require_once('./config.php');

require_once './core/Session.php';
require_once './core/Request.php';
require_once './core/Response.php';
require_once './core/TemplateResponse.php';
require_once './core/JSONResponse.php';
require_once './core/ErrorResponse.php';
require_once './core/DB.php';
require_once './middlewares/MiddlewareRunner.php';
require_once './controllers/BaseController.php';
require_once './models/BaseModel.php';

// $response = new Response(200);
// var_dump($response);
// die();
$request = new Request();

list(, $base, $controllerBaseRoute) = $request->getUriParts();

if (!$controllerBaseRoute) {
    $controllerBaseRoute = $base;
}

$controllerClass = $config['controllers'][$controllerBaseRoute]?:$config['controllers']['default'];

require_once("./controllers/$controllerClass.php");

$controller = new $controllerClass($request);

// echo '<pre>';
// var_dump([$request->uri, $base, $controllerBaseRoute, $controllerClass]);
// echo '</pre>';

$controller->run();
