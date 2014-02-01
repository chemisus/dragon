<?php

namespace Dragon;

use Needle\DependencyContainer;

class RouteResult implements ResponseFactory
{
    private $route;
    private $matched;
    private $parameters;
    private $response_factory;

    /**
     * @param Route $route
     * @param boolean $matched
     * @param string[] $parameters
     * @param ResponseFactory $response_factory
     */
    public function __construct(Route $route, $matched, array $parameters, ResponseFactory $response_factory)
    {
        $this->route = $route;
        $this->matched = $matched;
        $this->parameters = $parameters;
        $this->response_factory = $response_factory;
    }

    /**
     * @return bool
     */
    public function matched()
    {
        return $this->matched;
    }

    /**
     * @return string[]
     */
    public function parameters()
    {
        return $this->parameters;
    }

    /**
     * @param DependencyContainer $container
     * @return Response
     */
    public function response(DependencyContainer $container)
    {
        return $this->response_factory->response($container);
    }
}