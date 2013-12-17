<?php

namespace Dragon;

interface DependencyContainer
{
    /**
     * @param string $class
     * @return object
     */
    public function instance($class);

    /**
     * @param object $object
     * @param string $method
     * @return mixed
     */
    public function invoke($object, $method);

    /**
     * @param callable $callback
     * @return mixed
     */
    public function callback(callable $callback);
}
