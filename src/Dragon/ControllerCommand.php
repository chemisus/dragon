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
     * @var string
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

    /**
     * @return string
     */
    public function targetClass()
    {
        return $this->class;
    }

    /**
     * @return string
     */
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