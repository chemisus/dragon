<?php

namespace Dragon;

class Router
{
    /**
     * @var Route[]
     */
    private $routes;

    /**
     * @param Route[] $routes
     */
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * @param Request $request
     * @return Route
     */
    public function route(Request $request)
    {
        foreach ($this->routes as $route)
        {
            if ($route->matches($request)) {
                return $route;
            }
        }

        return null;
    }
}