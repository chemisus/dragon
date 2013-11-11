<?php

namespace Test;

use Dragon\DependencyContainer;
use PHPUnit_Framework_TestCase;

class FirstTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $container = new DependencyContainer();

        $this->assertTrue(true);
    }
}