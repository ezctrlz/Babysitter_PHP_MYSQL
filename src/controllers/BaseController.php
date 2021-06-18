<?php
class BaseController
{
    private $routes = [];
    protected $request;
    public function __construct(Request $request, $routes = []) {
        $this->routes = $routes;
        $this->request = $request;
    }

    public function validateRoute() {
        $finalRoute = null;
        foreach ($this->routes as $route) {
            preg_match($route['pattern'], $this->request->uri, $matches);
            if ($matches) {
                $finalRoute = [
                    'route' => $route,
                    'matches' => $matches
                ];
                break;
            }
        }
        if (!$finalRoute) {
            $errorCode = 404;
            $error = "404 - Route not found";
        }

        if ($this->request->method === 'OPTIONS') {
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
                header("Access-Control-Allow-Methods: " . implode(', ', $finalRoute['route']['methods']));
            }
            exit();
        }
        
        if (!$error && !in_array($this->request->method, $finalRoute['route']['methods'])){
            $errorCode = 405;
            $error = "405 - Method Not Allowed";
        }
        
        if ($error && $errorCode) {
            $errorResponse = $this->createTemplateResponse("ERROR", ['error' => $error], $errorCode);
            $errorResponse->send();
        }

        return $finalRoute;
        
    }
    
    public function run()
    {
        $finalRoute = $this->validateRoute();
        $response = call_user_func([$this, $finalRoute['route']['action']], $finalRoute['matches']);
        $response->send();
    }
    
    public function createTemplateResponse($template, $context = [], $code = 200)
    {
        return new TemplateResponse($template, $context, $code);
    }
}
