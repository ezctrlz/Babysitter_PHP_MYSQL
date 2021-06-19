<?php
error_reporting(0);

if (!function_exists('base_url')) {
    function base_url(){
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
            
            $base_url = "$http://$hostname$dir";
        }
        else $base_url = 'http://localhost/';

        $base_url = parse_url($base_url);
        if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';

        return $base_url['path'];
    }
}

define('BASE', base_url());
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