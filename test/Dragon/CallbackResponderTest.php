<?php

namespace Test\Dragon;

use Dragon\CallbackResponder;
use Mockery;
use PHPUnit_Framework_TestCase;

class CallbackResponderTest extends PHPUnit_Framework_TestCase
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

        $container = Mockery::mock('Needle\DependencyContainer');
        $container->shouldReceive('call')->once()->with($callback)->andReturn($expect);

        $command = new CallbackResponder($container, $callback);

        $actual = $command->response();

        $this->assertEquals($expect, $actual);
    }
}