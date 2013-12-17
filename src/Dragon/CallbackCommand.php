<?php

namespace Dragon;

class CallbackCommand implements Command
{
    /**
     * @var DependencyContainer
     */
    private $container;

    /**
     * @var callable
     */
    private $callback;

    public function __construct(DependencyContainer $container, callable $callback)
    {
        $this->container = $container;
        $this->callback  = $callback;
    }

    /**
     * @return Response
     */
    public function response()
    {
        return $this->container->callback($this->callback);
    }
}