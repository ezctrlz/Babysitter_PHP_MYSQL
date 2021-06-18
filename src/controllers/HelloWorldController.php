<?php
class HelloWorldController extends BaseController
{
    public function __construct(Request $request) {
        parent::__construct($request, [
            [
                'pattern' => '/^\/api\/$|^\/$/',
                'methods' => ['GET'],
                'action' => 'hello'
            ]
        ]);
    }

    public function hello($matches)
    {
        return new Response('<h1>Hello world</h1>');
    }
}
