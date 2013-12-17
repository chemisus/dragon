<?php

namespace Dragon;

class CommandFactory
{
    public function makeControllerCommand(DependencyContainer $container, $class, $method)
    {
        return new ControllerCommand($container, $class, $method);
    }
}