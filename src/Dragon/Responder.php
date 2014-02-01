<?php

namespace Dragon;

use Needle\DependencyContainer;

interface Responder
{
    /**
     * @param \Needle\DependencyContainer $container
     * @return Response
     */
    public function response(DependencyContainer $container);
}