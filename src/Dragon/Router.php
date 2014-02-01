<?php

namespace Dragon;

class Router
{
    private $routes;
    private $otherwise;

    /**
     * @param Route[] $routes
     * @param RouteResult $otherwise
     */
    public function __construct(array $routes, RouteResult $otherwise)
    {
        $this->routes = $routes;
        $this->otherwise = $otherwise;
    }

    /**
     * @param Request $request
     * @return ResponseFactory
     */
    public function route(Request $request)
    {
        foreach ($this->routes as $route) {
            $results = $route->validate($request);

            if ($results) {
                return $results;
            }
        }

        return $this->otherwise;
    }
}