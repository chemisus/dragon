<?php

namespace Test\Dragon;

use Dragon\CommandFactory;
use Mockery;
use PHPUnit_Framework_TestCase;

class CommandFactoryTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        parent::tearDown();

        Mockery::close();
    }

    public function testMakeControllerCommand()
    {
        $container = Mockery::mock('Dragon\DependencyContainer');

        $factory = new CommandFactory();

        $class = 'a';
        $method = 'b';

        $actual = $factory->makeControllerCommand($container, $class, $method);

        $this->assertInstanceOf('Dragon\ControllerResponder', $actual);
        $this->assertEquals($class, $actual->targetClass());
        $this->assertEquals($method, $actual->targetMethod());
    }
}