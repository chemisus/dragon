<?php

namespace Test\Dragon;

use Dragon\CallbackCommand;
use Mockery;
use PHPUnit_Framework_TestCase;

class CallbackCommandTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        parent::tearDown();

        Mockery::close();
    }

    public function testResponse()
    {
        $expect = Mockery::mock('Dragon\Response');

        $callback = function () {
        };

        $container = Mockery::mock('Dragon\DependencyContainer');
        $container->shouldReceive('call')->once()->with($callback)->andReturn($expect);

        $command = new CallbackCommand($container, $callback);

        $actual = $command->response();

        $this->assertEquals($expect, $actual);
    }
}