<?php
error_reporting(0);

if (!function_exists('base_url')) {
    function base_url($atRoot=FALSE, $atCore=FALSE, $parse=FALSE){
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];

            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            $base_url = sprintf( $tmplt, $http, $hostname, $end );
        }
        else $base_url = 'http://localhost/';

        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
        }

        return $base_url;
    }
}

define('BASE', base_url(NULL, NULL, TRUE)["path"]);
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