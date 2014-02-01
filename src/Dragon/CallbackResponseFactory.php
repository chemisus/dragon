<?php

namespace Dragon;

use Needle\DependencyContainer;

class CallbackResponseFactory implements ResponseFactory
{
    private $callback;

    /**
     * The callback must be capable of returning an object that implements \Dragon\Response.
     *
     * @param callable $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @param DependencyContainer $container
     * @return Response
     */
    public function response(DependencyContainer $container)
    {
        return $container->call($this->callback);
    }
}