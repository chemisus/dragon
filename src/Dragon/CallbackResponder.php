<?php

namespace Dragon;

use Needle\DependencyContainer;

class CallbackResponder implements Responder
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
        return $this->container->call($this->callback);
    }
}