<?php
class MiddlewareRunner
{
    private $middleware;

    public function __construct(array $middleware) {
        $this->middleware = array_values($middleware);
    }

    public function __invoke()
    {
        return $this->run(0);
    }

    private function run($position)
    {
        if (!isset($this->middleware[$position + 1])) {
            $handler = $this->middleware[$position];
            return $handler();
        }

        $that = $this;
        $next = function () use ($that, $position) {
            return $that->run($position + 1);
        };

        $handler = $this->middleware[$position];
        return $handler($next);
    }
}
