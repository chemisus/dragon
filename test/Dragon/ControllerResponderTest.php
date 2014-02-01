<?php

namespace Test\Dragon;

use Dragon\ControllerResponder;
use Mockery;
use PHPUnit_Framework_TestCase;

class ControllerResponderTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        parent::tearDown();

        Mockery::close();
    }

    public function testResponse()
    {
        $expect = Mockery::mock();

        $class = 'a';
        $method = 'b';

        $controller = Mockery::mock();

        $container = Mockery::mock('Needle\DependencyContainer');
        $container->shouldReceive('instance')->once()->with($class)->andReturn($controller);
        $container->shouldReceive('invoke')->once()->with($controller, $method)->andReturn($expect);

        $command = new ControllerResponder($container, $class, $method);

        $actual = $command->response();

        $this->assertEquals($expect, $actual);
    }
}