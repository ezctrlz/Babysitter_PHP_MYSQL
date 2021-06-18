<?php
error_reporting(0);
define('TEMPLATES_DIR', __DIR__ . "/templates/");
define('MODELS_DIR', __DIR__ . "/models/");
define('SERVICES_DIR', __DIR__ . "/services/");
define('ERRORS_DIR', __DIR__ . "/errors/");
define('UTILS_PATH', __DIR__ . "/utils.php");
define('DB_NAME', getenv('DB_NAME')?:'baby_sitter');
define('DB_HOST', getenv('DB_HOST')?:'localhost');
define('DB_USER', getenv('DB_USER')?:'root');
define('DB_PASSWORD', getenv('DB_PASSWORD')?:'root');

return [
    'controllers' => [
        '' => 'HelloWorldController',
        'api' => 'HelloWorldController',
        'default' => 'HelloWorldController',
        'docs' => 'DocsController',
        'users' => 'UserController',
        'auth' => 'AuthenticationController'
    ]
];