<?php

namespace Test\Dragon;

use Dragon\ControllerCommand;
use Mockery;
use PHPUnit_Framework_TestCase;

class ControllerCommandTest extends PHPUnit_Framework_TestCase
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

        $container = Mockery::mock('Dragon\DependencyContainer');
        $container->shouldReceive('instance')->once()->with($class)->andReturn($controller);
        $container->shouldReceive('invoke')->once()->with($controller, $method)->andReturn($expect);

        $command = new ControllerCommand($container, $class, $method);

        $actual = $command->response();

        $this->assertEquals($expect, $actual);
    }
}