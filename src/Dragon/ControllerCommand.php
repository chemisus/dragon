<?php

namespace Dragon;

class ControllerCommand implements Command
{
    /**
     * @var DependencyContainer
     */
    private $container;

    /**
     * @var string
     */
    private $class;

    /**
     * @var method
     */
    private $method;

    /**
     * @param DependencyContainer $container
     * @param string $class
     * @param string $method
     */
    public function __construct(DependencyContainer $container, $class, $method)
    {
        $this->container = $container;
        $this->class     = $class;
        $this->method    = $method;
    }

    public function targetClass()
    {
        return $this->class;
    }

    public function targetMethod()
    {
        return $this->method;
    }


    /**
     * Creates an instance of the controller, then invokes the controller's method.
     *
     * @return Response
     */
    public function response()
    {
        $object = $this->container->instance($this->class);

        return $this->container->invoke($object, $this->method);
    }
}