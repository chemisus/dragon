<?php

namespace Dragon;

use Needle\DependencyContainer;

class ControllerResponseFactory implements ResponseFactory
{
    private $class;
    private $method;

    public function __construct($class, $method)
    {
        $this->class = $class;
        $this->method = $method;
    }

    /**
     * @param DependencyContainer $container
     * @return Response
     */
    public function response(DependencyContainer $container)
    {
        $controller = $container->instance($this->class);

        return $container->invoke($controller, $this->method);
    }
}