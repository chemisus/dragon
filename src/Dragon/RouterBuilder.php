<?php

namespace Dragon;

class RouterBuilder
{
    private $routes = [];
    private $otherwise;

    /**
     * @param Route $route
     * @return $this
     */
    public function when(Route $route)
    {
        $this->routes[] = $route;

        return $this;
    }

    /**
     * @param RouteResult $value
     * @return $this
     */
    public function otherwise(RouteResult $value)
    {
        $this->otherwise = $value;

        return $this;
    }

    /**
     * @return Router
     */
    public function build()
    {
        return new Router($this->routes, $this->otherwise);
    }
}