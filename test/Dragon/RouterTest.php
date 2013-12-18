<?php

namespace Test\Dragon;

use Dragon\ControllerCommand;
use Dragon\Router;
use Mockery;
use PHPUnit_Framework_TestCase;

class RouterTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        parent::tearDown();

        Mockery::close();
    }

    public function testRouteNoMatch()
    {
        $request = Mockery::mock('Dragon\Request');
        $routes = [];
        $router = new Router($routes);

        $this->assertNull($router->route($request));
    }

    public function testRoute()
    {
        $request = Mockery::mock('Dragon\Request');
        $a = Mockery::mock('Dragon\Route');
        $b = Mockery::mock('Dragon\Route');
        $c = Mockery::mock('Dragon\Route');
        $a->shouldReceive('matches')->with($request)->andReturn(false);
        $b->shouldReceive('matches')->with($request)->andReturn(true);
        $c->shouldReceive('matches')->never();
        $routes = [$a, $b, $c];
        $router = new Router($routes);

        $this->assertSame($b, $router->route($request));
    }
}