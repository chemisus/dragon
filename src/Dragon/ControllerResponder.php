<?php

namespace Dragon;

use Needle\DependencyContainer;

class ControllerResponder implements Responder
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
     * @param string $class
     * @param string $method
     */
    public function __construct($class, $method)
    {
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
     * @param \Needle\DependencyContainer $container
     * @return Response
     */
    public function response(DependencyContainer $container)
    {
        $object = $container->instance($this->class);

        return $container->invoke($object, $this->method);
    }
}