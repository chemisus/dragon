<?php

namespace Dragon;

use Needle\DependencyContainer;

class CommandFactory
{
    public function makeControllerCommand(DependencyContainer $container, $class, $method)
    {
        return new ControllerResponder($container, $class, $method);
    }
}