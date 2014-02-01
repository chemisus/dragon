<?php

namespace Dragon;

use Needle\DependencyContainer;

interface ResponseFactory
{
    /**
     * @param DependencyContainer $container
     * @return Response
     */
    public function response(DependencyContainer $container);
}
